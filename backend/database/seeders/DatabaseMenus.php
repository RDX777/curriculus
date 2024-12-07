<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseMenus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('application')->table('menus')->truncate();

        \App\Models\Auth\Menu::create([
            "id" => 1,
            "belong_menu_id" => null,
            "position" => 9,
            "level" => 0,
            "name" => "Configurações",
            "icon" => "AiOutlineSetting",
            "classification" => "Configurações - Menu de nível 1",
            "description" => "Configurações",
            "active" => true
        ]);

        \App\Models\Auth\Menu::create([
            "id" => 2,
            "belong_menu_id" => 1,
            "position" => null,
            "level" => 1,
            "name" => "Permissões",
            "classification" => "Configurações - Menu de nível 2",
            "description" => "Configurações > Permissões",
            "active" => true
        ]);

        \App\Models\Auth\Menu::create([
            "id" => 3,
            "belong_menu_id" => null,
            "position" => 0,
            "level" => 0,
            "name" => "Recrutamento",
            "icon" => "FaUserTie",
            "classification" => "Recrutamento - Menu de nível 1",
            "description" => "Menu de nível 1 - Recrutamento",
            "active" => true
        ]);

        \App\Models\Auth\Menu::create([
            "id" => 4,
            "belong_menu_id" => 3,
            "position" => null,
            "level" => 1,
            "name" => "Vagas",
            "classification" => "Recrutamento - Menu de nível 2",
            "description" => "Menu de nível 2 - Recrutamento > Vagas",
            "active" => true
        ]);

        \App\Models\Auth\Menu::create([
            "id" => 5,
            "belong_menu_id" => 3,
            "position" => null,
            "level" => 1,
            "name" => "Candidatos",
            "classification" => "Recrutamento - Menu de nível 2",
            "description" => "Recrutamento > Candidatos",
            "active" => true
        ]);

        \App\Models\Auth\Menu::create([
            "id" => 6,
            "belong_menu_id" => 5,
            "position" => null,
            "level" => 2,
            "name" => "Triagem",
            "classification" => "Recrutamento - Menu de nível 3",
            "description" => "Recrutamento > Candidatos > Triagem",
            "active" => true
        ]);

    }
}
