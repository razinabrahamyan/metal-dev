<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            "title"       => "Москва",
            "sub_regions" => ["Московская область"],
            "geolocation" => [
                "lat" => "55.65",
                "lon" => "37.64",
            ],
            "created_at"  => now(),
            "updated_at"  => now(),
        ]);
        City::create([
            "title"       => "Санкт-Петербург",
            "sub_regions" => [],
            "geolocation" => [
                "lat" => "59.93",
                "lon" => "30.31",
            ],
            "created_at"  => now(),
            "updated_at"  => now(),
        ]);
    }
}
