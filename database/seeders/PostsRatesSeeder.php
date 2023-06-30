<?php

namespace Database\Seeders;

use App\Models\PostsRate;
use Illuminate\Database\Seeder;

class PostsRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostsRate::insert([
            [
                "title"      => "1x",
                "priority"   => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title"      => "2x",
                "priority"   => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title"      => "5x",
                "priority"   => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title"      => "10x",
                "priority"   => 10,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
