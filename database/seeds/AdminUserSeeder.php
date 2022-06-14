<?php

namespace Database\Seeders;

use App\Constants\CatSystemUserRoleConstants;
use App\Model\CatSystemUserRoleModel;
use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $root = User::where('email', env('ROOT_EMAIL'))->first();
        $systemRole = CatSystemUserRoleModel::where("code", CatSystemUserRoleConstants::ADMIN)->first();

        if (is_null($root)) {
            User::insert([
                'id' => 1,
                'name' => env('ROOT_USERNAME', 'root'),
                'last_name' => 'Administrador',
                'email' => env('ROOT_EMAIL', 'root@mail.com'),
                'password' => Hash::make(env('ROOT_PASS', 'root')),
                "systemRole_id" => $systemRole->id,
                "role_id" => 1,
                "points" => 0
            ]);
        }
    }
}
