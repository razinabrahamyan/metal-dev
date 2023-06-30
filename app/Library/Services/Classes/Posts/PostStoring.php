<?php

namespace App\Library\Services\Classes\Posts;

use App\Classes\Convertors\ConvertFile;
use App\Classes\Convertors\Drivers\InterventionImageDriver;
use App\Classes\Helpers\PhoneHelper;
use App\Classes\Helpers\StringHelper;
use App\Library\Services\Classes\Constants\PostRatesConstants;
use App\Library\Services\Classes\Posts\Interfaces\StoringInterface;
use App\Library\Services\Rules\PostRules;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostsPriority;
use App\Models\PostsSocial;
use App\Models\PostsSubcategories;

class PostStoring implements StoringInterface
{
    const IMAGES_DESTINATION = "user/images/post/";

    private $post;
    private $request;
    private $isValidationFailed;
    private $invalidRules = [];

    /**
     * PostStoring constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return $this
     */
    public function validate() : PostStoring
    {
        $validator = PostRules::postCreateRules($this->request->all());
        $this->isValidationFailed = $validator->fails();

        if ($this->isValidationFailed) {
            $invalidRules = [];
            foreach ($validator->getMessageBag()->toArray() as $selector => $message) {
                if (preg_match('/images/', $selector)) {
                    $invalidRules[".images-upload"] = $message;
                } elseif (preg_match('/covers/', $selector)) {
                    $invalidRules[".cover-upload"] = $message;
                } else {
                    $invalidRules["[name=".$selector."]"] = $message;
                }
            }
            $this->invalidRules = $invalidRules;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function prepareStoringParams() : array
    {
        $request = $this->request;
        $work_hours = [];


        foreach ($request->work_times as $day => $time) {
            $work_hours[$day] = [
                'start' => [
                    'hour'   => $time[0][0],
                    'minute' => $time[0][1]
                ],
                'end'   => [
                    'hour'   => $time[1][0],
                    'minute' => $time[1][1]
                ]
            ];
        }

        return [
            'user_id'     => auth()->id(),
            'title'       => $request->title,
            'description' => $request->description,
            'address'     => ['address' => $request->address, 'lat' => $request->lat, 'lng' => $request->lng],
            'work_hours'  => $work_hours,
            'market_id'   => 1, //
            'city_id'     => auth()->user()->city_id,
        ];
    }

    /**
     * @return $this
     */
    public function storeSubcategories() : PostStoring
    {
        $request = $this->request;
        $subCategories = [];

        foreach ($request->prices as $price) {
            $subCategories[] = [
                'category' => $price['category'],
                'prices'   => $price['subcategory']
            ];
        }

        $preparedPostsSubcategories = [];
        if (!empty($subCategories)) {
            foreach ($subCategories as $category) {
                foreach ($category['prices'] as $subcategory) {
                    $preparedPostsSubcategories[] = [
                        'post_id'        => $this->post->id,
                        'category_id'    => $category['category'],
                        'subcategory_id' => $subcategory['subcategory'],
                        'price'          => $subcategory['price'],
                        'created_at'     => now(),
                        'updated_at'     => now(),
                    ];
                }
            }

            if (!empty($preparedPostsSubcategories)) {
                PostsSubcategories::insert($preparedPostsSubcategories);
            }

            PostsPriority::create([
                "post_id"      => $this->post->id,
                "user_id"      => auth()->id(),
                "post_rate_id" => PostRatesConstants::X_ONE,
            ]);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function saveImages() : PostStoring
    {
        $imageNames = $coversNames = [];
        $request = $this->request;

        if ($request->images[0]) {
            foreach ($request->images as $image) {
                $convertedImage = (new ConvertFile(new InterventionImageDriver()))->setFile($image)
                                                                                  ->convertFile()
                                                                                  ->storage(self::IMAGES_DESTINATION);
                array_push($imageNames, [
                    'name'          => $convertedImage,
                    'imagable_id'   => $this->post->id,
                    'imagable_type' => 'App\Models\Post',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }
            Image::insert($imageNames);
        }

        if (!empty($request->covers[0])) {
            foreach ($request->covers as $cover) {
                $convertedCover = (new ConvertFile(new InterventionImageDriver()))->setFile($cover)
                                                                                  ->convertFile()
                                                                                  ->storage(self::IMAGES_DESTINATION);

                array_push($coversNames, [
                    'name'          => $convertedCover,
                    'imagable_id'   => $this->post->id,
                    'imagable_type' => 'App\Models\Post',
                    'type'          => 'cover',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }

            Image::insert($coversNames);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function storeSocials()
    {
        return PostsSocial::create([
            "post_id"  => $this->post->id,
            "whatsapp" => PhoneHelper::clearPhoneNumber($this->request->whatsapp),
            "telegram" => StringHelper::clearStringSign($this->request->telegram),
            "viber"    => PhoneHelper::clearPhoneNumber($this->request->viber),
        ]);
    }

    /**
     * @return bool
     */
    public function store() : bool
    {
        $success = false;
        if (!$this->isValidationFailed) {
            $this->post = Post::create($this->prepareStoringParams());

            if ($this->post) {
                $this->storeSubcategories()->saveImages();
                $success = true;
            }
        }
        return $success;
    }

    /**
     * @return array
     */
    public function getInvalidRules() : array
    {
        return $this->invalidRules;
    }
}
