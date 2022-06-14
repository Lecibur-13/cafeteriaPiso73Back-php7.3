<?php

use Database\Seeders\AdminUserSeeder;
use Database\Seeders\CatSystemUserRoleSeeder;
use Database\Seeders\CatUserRoleSeeder;
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
        $this->call(CatSystemUserRoleSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(CatUserRoleSeeder::class);
    }
}
