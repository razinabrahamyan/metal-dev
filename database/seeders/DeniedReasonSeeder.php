<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeniedReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('denied_reasons')->insert([
           ['title' => 'Несоответствующее описание', 'description' => 'test1'],
           ['title' => 'Несоответствующий заголовок', 'description' => 'test2'],
           ['title' => 'Повторяющиеся фотографии', 'description' => 'test3'],
           ['title' => 'Нецензурные слова или выражения', 'description' => 'test4']
        ]);
    }
}
