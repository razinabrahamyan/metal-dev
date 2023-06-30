<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserIntegration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            'storage/user/images/avatar/0dc9aa4073486d507ddad2a078ebe862.webp',
            'storage/user/images/avatar/2b2f7addeff1575e2f34e77fa56eba24.webp',
            'storage/user/images/avatar/3e96194e4540d2c833d380f6ede0a265.webp',
            'storage/user/images/avatar/5e83c9f5b9c79b16abe8a0d8167a90b5.webp',
            'storage/user/images/avatar/26549e25c0273f1566a5f9d70f2fc136.webp',
            'storage/user/images/avatar/81376cfa01948df64b63be775eafe9c4.webp',
            'storage/user/images/avatar/771380db641c49b20d1d5b45c1e3b2cf.webp',
            'storage/user/images/avatar/afb8ed6058354591f38fefcd0e8ffb6d.webp',
            'storage/user/images/avatar/fbecc2ae98a5fc2615cb51fee95efdd8.webp',
        ];
        for($i = 0; $i < 9; $i++){
            $user = new User();
            $user->full_name = [
                'first_name' => 'User'.$i,
                'last_name'  =>  'Doe',
            ];
            $user->email = 'user'.$i.'@gmail.com';
            $user->dob = now();
            $user->phone = '7964517200'.$i;
//            $user->avatar = $images[$i];
            $user->website = 'www.site.com';
            $user->pack_id = rand(1,3);
            $user->password = Hash::make('user123456');
            $user->city_id = 1;
            $user->save();
        }
    }
}
