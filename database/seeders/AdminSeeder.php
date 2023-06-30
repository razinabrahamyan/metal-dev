<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'email' => 'test@gmail.com',
                'first_name' => 'super',
                'last_name' => 'admin',
                'role_id' => 1,
                'password' => bcrypt(123456)
            ],
            [
                'email' => 'test1@gmail.com',
                'first_name' => 'admin',
                'last_name' => 'admin',
                'role_id' => 2,
                'password' => bcrypt(123456)
            ],
            [
                'email' => 'test2@gmail.com',
                'first_name' => 'moderator',
                'last_name' => 'admin',
                'role_id' => 3,
                'password' => bcrypt(123456)
            ]
        ]);
    }
}
