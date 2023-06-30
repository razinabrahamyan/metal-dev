<?php

namespace Database\Seeders;

use App\Models\Packs;
use Illuminate\Database\Seeder;

class PacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Packs::insert([
            [
                "title"      => "Базовый",
                "title_en"   => "Base",
                "price"      => "1000",
                "priority"   => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title"      => "Продвинутый",
                "title_en"   => "Pro",
                "price"      => "5000",
                "priority"   => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title"      => "Бизнес",
                "title_en"   => "Business",
                "price"      => "10000",
                "priority"   => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
