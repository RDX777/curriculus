<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseRoutes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('application')->table('routes')->truncate();
        \App\Models\Auth\Route::create([
            "id" => 1,
            "menu_id" => 2,
            "link" => "/settings/permissions",
            "active" => true
        ]);


        \App\Models\Auth\Route::create([
            "id" => 2,
            "menu_id" => 4,
            "link" => "/recruitment/vacancies",
            "active" => true
        ]);

        \App\Models\Auth\Route::create([
            "id" => 3,
            "menu_id" => 6,
            "link" => "/recruitment/candidates/screening",
            "active" => true
        ]);

    }
}
