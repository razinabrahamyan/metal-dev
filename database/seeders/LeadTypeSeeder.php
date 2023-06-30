<?php

namespace Database\Seeders;

use App\Models\LeadType;
use Illuminate\Database\Seeder;

class LeadTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeadType::insert([
            'title'      => "Обратный звонок",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
