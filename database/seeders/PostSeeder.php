<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\PostsPriority;
use App\Models\Status;
use App\Models\PostsSubcategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $status = Status::query()->find(2);

        function mt_random_float($min, $max) {
            $float_part = mt_rand(0, mt_getrandmax())/mt_getrandmax();
            $integer_part = mt_rand($min, $max - 1);
            return $integer_part + $float_part;
        }

        $images = [
            'storage/user/images/post/1616078107_unnamed.jpg',
            'storage/user/images/post/1616238413_demontazh-metallolom-4.jpg',
            'storage/user/images/post/1616238413_gde-sdat-metallolom-v-chekhove.jpg',
            'storage/user/images/post/1616238413_sdat-chernyj-metallolom-v-podolske.jpg',
            'storage/user/images/post/1616238413_sdat-metallolom-s-vyvozom.jpg',
            'storage/user/images/post/1616238413_vivoz-metallolom-1.jpg',
            'storage/user/images/post/1616405025_13812312.jpg'
        ];
        $coordinates = [
            [
                'address' => 'Гагаринский тоннель',
                'lat' => '55.708597',
                'lng' => '37.584293'
            ],
            [
                'address' => 'район Замоскворечье',
                'lat' => '55.723691',
                'lng' => '37.624639'
            ],
            [
                'address' => 'Пресненский район',
                'lat' => '55.765161',
                'lng' => '37.545031'
            ],
            [
                'address' => 'улица Красина',
                'lat' => '55.767472',
                'lng' => '37.588096'
            ],
            [
                'address' => 'Москворецкая набережная',
                'lat' => '55.749844',
                'lng' => '37.625136'
            ],
            [
                'address' => '',
                'lat' => '55.738799',
                'lng' => '37.628608'
            ],
            [
                'address' => 'Пятницкая улица, 37',
                'lat' => '55.738799',
                'lng' => '37.628608'
            ],
            [
                'address' => 'улица Коровий Вал, к1А',
                'lat' => '55.729179',
                'lng' => '37.622593'
            ],
            [
                'address' => 'Каланчёвская улица',
                'lat' => '55.771542',
                'lng' => '37.652282'
            ],
            [
                'address' => 'район Текстильщики',
                'lat' => '55.709936',
                'lng' => '37.731164'
            ],
        ];
        $work_hours = [];
        $work_days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        foreach ($work_days as $day){
            $work_hours[$day] =  [
                'start' => [
                    'hour' => '00',
                    'minute' => '00'
                ],
                'end' => [
                    'hour' => '00',
                    'minute' => '00'
                ]

            ];

        }
        for($i = 0; $i < 10; $i++){
            $post = new Post();
            $post->title = 'Объявление '.($i+1);
            $post->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequuntur dolores iste minus possimus saepe temporibus velit! Delectus explicabo illo illum maxime modi nam necessitatibus quos, sed sint unde voluptate?';
            $post->user_id = rand(1,3);
            $post->address = [
                'address' => 'район Текстильщики',
                'lat' => mt_random_float(55, 56),
                'lng' => mt_random_float(37, 38)
            ];
            $post->market_id = rand(1,3);
            $post->city_id = 1;
            $post->phone = '+7(964)517-20-00';
            $cat = rand(1,7);
            $prices = [];
            for($j = 0;$j < $cat; $j++){
                $subcat = rand(1,7);
                for($k = 0;$k < $subcat; $k++){

                }
            }
            $post->prices;
            $post->work_hours = $work_hours;
            $status->posts()->save($post);

            PostsPriority::create([
                "post_id" => $post->id,
                "user_id" => rand(1,3),
                "post_rate_id" => rand(1,4)
            ]);

            $new_image = new Image();
            $new_image->imagable_id = $post->id;
            $new_image->imagable_type = 'App\Models\Post';
            $new_image->name = $images[rand(0,6)];
            $new_image->save();

            $new_image = new Image();
            $new_image->imagable_id = $post->id;
            $new_image->imagable_type = 'App\Models\Post';
            $new_image->name = $images[rand(0,6)];
            $new_image->type = 'cover';
            $new_image->save();

                PostsSubcategories::insert([
                   [
                       'post_id'        => $post->id,
                       'category_id'    => 1,
                       'subcategory_id' => 1,
                       'price'          => '300',
                   ],
                    [
                        'post_id'        => $post->id,
                        'category_id'    => 1,
                        'subcategory_id' => 2,
                        'price'          => '300',
                    ],
                    [
                        'post_id'        => $post->id,
                        'category_id'    => 1,
                        'subcategory_id' => 3,
                        'price'          => '300',
                    ],
                    [
                        'post_id'        => $post->id,
                        'category_id'    => 2,
                        'subcategory_id' => 26,
                        'price'          => '300',
                    ],
                    [
                        'post_id'        => $post->id,
                        'category_id'    => 2,
                        'subcategory_id' => 27,
                        'price'          => '300',
                    ],
                    [
                        'post_id'        => $post->id,
                        'category_id'    => 3,
                        'subcategory_id' => 41,
                        'price'          => '300',
                    ]
                ]);
        }
    }
}
