<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Service;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            'storage/user/images/post/1616405025_13812312.jpg',
            'storage/user/images/post/1616238413_gde-sdat-metallolom-v-chekhove.jpg',
            'storage/user/images/post/1616405025_13812312.jpg',
            'storage/user/images/post/1616238413_sdat-metallolom-s-vyvozom.jpg',
            'storage/user/images/post/1616078107_unnamed.jpg',
            'storage/user/images/service/5830186d18ea2cfe2aa3ef82bc523f9f.webp',
            'storage/user/images/service/7447ca31796736350ca5e2e093c3f108.webp',
            'storage/user/images/service/295ff789143766d3e1c9e0c00a80e9de.webp',
            'storage/user/images/service/fef0b578b4c3cbf8f560db2578a2f92e.webp',
            'storage/user/images/service/f61fc46d3bc6f3d17734af9ec1e5540d.webp'
        ];
        for($i = 0; $i < 100; $i++){
            $service = new Service();
            $service -> user_id = rand(1,9);
            $service -> service_id = rand(1,5);
            $service -> price = rand(4,40) * 50;
            $service -> description = Str::random(20);
            $service -> save();
            $images_count = rand(2,15);
            for($j = 0; $j < $images_count; $j++){
                $image = new Image();
                $image -> imagable_type = 'App\Models\Service';
                $image -> imagable_id = $i+1;
                $image -> name = $images[rand(0,9)];
                $image -> save();
            }

        }
    }
}
