<?php

namespace Database\Seeders;

use App\Constants\CatSystemUserRoleConstants;
use App\Model\CatSystemUserRoleModel;
use Illuminate\Database\Seeder;

class CatSystemUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $admin = CatSystemUserRoleModel::where('code', CatSystemUserRoleConstants::ADMIN)->first();

        if (is_null($admin)) {
            CatSystemUserRoleModel::create([
                'name' => 'Administrador del sistema',
                'code' => CatSystemUserRoleConstants::ADMIN,
                'description' => 'Usuario con todos los permisos del sistema',
            ]);
        }

        $user = CatSystemUserRoleModel::where('code', CatSystemUserRoleConstants::USER)->first();

        if (is_null($user)) {
            CatSystemUserRoleModel::create([
                'name' => 'Cuenta de usuario',
                'code' => CatSystemUserRoleConstants::USER,
                'description' => 'Usuario con permisos estándar ',
            ]);
        }
    }
}
