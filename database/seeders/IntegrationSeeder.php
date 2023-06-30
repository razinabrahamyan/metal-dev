<?php

namespace Database\Seeders;

use App\Models\Integration;
use Illuminate\Database\Seeder;

class IntegrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Integration::insert([
            [
                "title"       => "E-mail",
                "template"    => "email",
                "description" => "Отправка лидов на почту",
                "status"      => 1,
                "created_at"  => now(),
                "updated_at"  => now(),
            ],
            [
                "title"       => "Bitrix-24",
                "template"    => "",
                "description" => "Интеграция лидов с Bitrix-24",
                "status"      => 0,
                "created_at"  => now(),
                "updated_at"  => now(),
            ],
            [
                "title"       => "AmoCRM",
                "template"    => "",
                "description" => "Интеграция лидов с AmoCRM",
                "status"      => 0,
                "created_at"  => now(),
                "updated_at"  => now(),
            ],
        ]);
    }
}
