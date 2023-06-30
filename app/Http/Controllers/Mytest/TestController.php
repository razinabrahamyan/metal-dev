<?php

namespace App\Http\Controllers\Mytest;

use App\Classes\Errors\SqlErrors\SqlErrorsMessages;
use App\Classes\Errors\SqlErrors\Types\UserErrorsHandler;
use App\Classes\Geolocation\IpWhois\IpHandler;
use App\Classes\Geolocation\Sputnik\Api as SputnikApi;
use App\Classes\Integrations\CheckIntegration;
use App\Classes\Mail\PHPMailerHandler;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\File;

use App\Mail\CallbackOrder;
use App\Models\Lead;
use App\Models\Post;
use App\Models\PostsPriority;
use App\Models\PostsSubcategories;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function geocoding()
    {
        $geo = new SputnikApi();
        dd($geo->getCoordinatesFromAddress('Московский международный деловой центр Москва-Сити, Пресненский район, Центральный административный округ, Москва, Россия'));
    }

    public function ipInfo()
    {
        dd((new IpHandler())->setIp('217.147.31.126')
                            ->getCity());
    }

    public function errorTest()
    {
        dd((new SqlErrorsMessages(new UserErrorsHandler()))->setErrorCode(1062)
                                                           ->getAlertMessage());
    }

    function generateRandomPoint($centre, $radius)
    {
        $radius_earth = 3959; //miles

        //Pick random distance within $distance;
        $distance = lcg_value() * $radius;

        //Convert degrees to radians.
        $centre_rads = array_map('deg2rad', $centre);

        //First suppose our point is the north pole.
        //Find a random point $distance miles away
        $lat_rads = (pi() / 2) - $distance / $radius_earth;
        $lng_rads = lcg_value() * 2 * pi();


        //($lat_rads,$lng_rads) is a point on the circle which is
        //$distance miles from the north pole. Convert to Cartesian
        $x1 = cos($lat_rads) * sin($lng_rads);
        $y1 = cos($lat_rads) * cos($lng_rads);
        $z1 = sin($lat_rads);


        //Rotate that sphere so that the north pole is now at $centre.

        //Rotate in x axis by $rot = (pi()/2) - $centre_rads[0];
        $rot = (pi() / 2) - $centre_rads[0];
        $x2 = $x1;
        $y2 = $y1 * cos($rot) + $z1 * sin($rot);
        $z2 = -$y1 * sin($rot) + $z1 * cos($rot);

        //Rotate in z axis by $rot = $centre_rads[1]
        $rot = $centre_rads[1];
        $x3 = $x2 * cos($rot) + $y2 * sin($rot);
        $y3 = -$x2 * sin($rot) + $y2 * cos($rot);
        $z3 = $z2;


        //Finally convert this point to polar co-ords
        $lng_rads = atan2($x3, $y3);
        $lat_rads = asin($z3);

        return array_map('rad2deg', array($lat_rads, $lng_rads));
    }

    public function query()
    {
        dd((new CheckIntegration(User::find(2)))->isEmailIntegrationOn());
    }

    public function sendMail()
    {
        Mail::to('smnnartur1@gmail.com')->send(new CallbackOrder(Lead::find(1)));
        echo view('emails.orders.callbackOrder')->with([
            "lead"      => Lead::find(1),
            "post_link" => "://".$_SERVER['HTTP_HOST']."/posts/".Lead::find(1)->id,

        ])->render();
    }

    public function sortPosts()
    {
//        $resultSort = [];
//        $selectColumns = [
//            'posts_priorities.*',
//            'packs.priority as packsPriority',
//            'posts_rates.priority as postRatePriority'
//        ];

        $postsPriorityAll = PostsPriority::all();
        $range = range(1, $postsPriorityAll->count());
        foreach ($postsPriorityAll as $value) {
            $sortKey = $range[array_rand($range)];
            $range = array_diff($range, [$sortKey]);
            $value->post_sort = $sortKey;
            $value->save();
        }
//        $postsPriority = PostsPriority::select($selectColumns)
//                                      ->leftJoin('users', 'posts_priorities.user_id', 'users.id')
//                                      ->leftJoin('packs', 'packs.id', 'users.pack_id') //соритировка по прайсингу
//                                      ->leftJoin('posts_rates', 'posts_priorities.post_rate_id', 'posts_rates.id') //Сортировка по "X"
//                                      ->orderBy('packsPriority', 'DESC')
//                                      ->orderBy('postRatePriority', 'DESC')
//                                      ->orderBy('post_sort', 'DESC')
//                                      ->get();
//
//        dd(implode(',',$postsPriority->pluck('id')->toArray()));
//        $postsPriorityByPacks = $postsPriority->groupBy('packsPriority');
//        $postsPriorityCount = $postsPriority->count();
//
//        foreach ($postsPriorityByPacks as $packsPriority) {
//            $packPriorityCount = $packsPriority->count();
//            $postRatePriorities = $packsPriority->groupBy('postRatePriority');
//            $bottomRange = $postsPriorityCount - $packPriorityCount;
//            $topRange = $postsPriorityCount;
//            $postsPriorityCount = $bottomRange;
//
//
//            $freeSortKeys = range($bottomRange, $topRange);
////            dd($postRatePriorities, $packPriorityCount, $bottomRange, $topRange, $postsPriorityCount, $freeSortKeys);
//            foreach ($postRatePriorities as $postRatePriority) {
//                foreach ($postRatePriority as $post) {
//                    $sortKey = $freeSortKeys[array_rand($freeSortKeys)];
//                    $freeSortKeys = array_diff($freeSortKeys, [$sortKey]);
//
////                    dump($freeSortKeys,[$sortKey]);
//                    $resultSort[] = [
//                        "post_id"   => $post->id,
//                        "post_sort" => $sortKey,
//                    ];
//                }
//            }
//        }

//        foreach ($resultSort as $updatePost) {
//            $newPostPriority = PostsPriority::find($updatePost["post_id"]);
//            $newPostPriority->post_sort = $updatePost['post_sort'];
//            $newPostPriority->update();
//        }
    }

    public function file(){
        dd(phpinfo());
        $service = Service::where('id',1)->update([
            'description' => 'sdfdsfsdfsdfsdfsd'
        ]);

        dd($service);
    }
}
