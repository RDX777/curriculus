<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::connection('application')->table('roles')->truncate();

        \App\Models\Auth\Role::create([
            "id" => 1,
            "name" => "G_MDG_CURRICULUS_ADMIN",
            "description" => "Grupo de administradores",
            "active" => true
        ]);

        \App\Models\Auth\Role::create([
            "id" => 2,
            "name" => "G_MDG_CURRICULUS_COORD",
            "description" => "Grupo de coordenadores",
            "active" => true
        ]);

        \App\Models\Auth\Role::create([
            "id" => 3,
            "name" => "G_MDG_CURRICULUS_RPA",
            "description" => "Grupo de automações",
            "active" => true
        ]);

        \App\Models\Auth\Role::create([
            "id" => 4,
            "name" => "G_MDG_CURRICULUS_USER",
            "description" => "Grupo de usuarios",
            "active" => true
        ]);

        \App\Models\Auth\Role::create([
            "id" => 5,
            "name" => "G_MDG_CURRICULUS_EXTERNALS",
            "description" => "Grupo de usuarios externos sem AD",
            "active" => true
        ]);
    }
}
