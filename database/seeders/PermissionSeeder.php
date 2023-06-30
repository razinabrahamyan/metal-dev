<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO add this methods future permissions
        $defined_methods = ['view', 'create', 'update', 'delete'];
        $defined_names = ['permission'];
        $insert_data = [];
        foreach ($defined_names as $name) {
            foreach ($defined_methods as $method) {
                   array_push($insert_data, [
                       'name' => $name,
                       'method' => $method,
                       'created_at' => date("Y-m-d H:i:s"),
                       'updated_at' => date("Y-m-d H:i:s")
                ]);
            }
        }

        DB::table('permissions')->insert($insert_data);
    }
}
