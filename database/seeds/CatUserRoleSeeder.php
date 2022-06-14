<?php

namespace Database\Seeders;

use App\Constants\RoleConstants;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $rol = DB::table("cat_userRole")->where('code', RoleConstants::ENCARGADO)->first();

        if (is_null($rol)) {
            DB::table('cat_userRole')->insert([
                'name' => 'Encargado',
                'code' => RoleConstants::ENCARGADO,
                'description' => 'Encargado de la cafeteria',
            ]);
        }

        $rol = DB::table("cat_userRole")->where('code', RoleConstants::OPERADOR)->first();

        if (is_null($rol)) {
            DB::table('cat_userRole')->insert([
                'name' => 'Operador',
                'code' => RoleConstants::OPERADOR,
                'description' => 'Operador de la cafeteria',
            ]);
        }

        $rol = DB::table("cat_userRole")->where('code', RoleConstants::CLIENTE)->first();

        if (is_null($rol)) {
            DB::table('cat_userRole')->insert([
                'name' => 'Cliente',
                'code' => RoleConstants::CLIENTE,
                'description' => 'Cliente de la cafeteria',
            ]);
        }
    }
}
