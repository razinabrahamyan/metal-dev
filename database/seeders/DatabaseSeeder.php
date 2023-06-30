<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(LeadTypeSeeder::class);
        $this->call(IntegrationSeeder::class);
        $this->call(PacksSeeder::class);
        $this->call(PostsRatesSeeder::class);
        $this->call(DeniedReasonSeeder::class);
    }
}
