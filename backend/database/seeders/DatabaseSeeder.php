<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::connection('application')->statement('SET FOREIGN_KEY_CHECKS=0');
        $this->call(DatabaseRoles::class);
        $this->call(DatabaseActions::class);
        $this->call(DatabaseMenus::class);
        $this->call(DatabaseMiddlewares::class);
        $this->call(DatabaseRoutes::class);
        //$this->call(DatabaseUsers::class);
        DB::connection('application')->statement('SET FOREIGN_KEY_CHECKS=1');
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::connection('recruitments')->statement('SET FOREIGN_KEY_CHECKS=0');
        $this->call(DatabaseCompanies::class);
        $this->call(DatabaseWorkMode::class);
        $this->call(DatabaseTypesRecruitmentStages::class);
        $this->call(DatabaseRecruitmentStages::class);
        DB::connection('recruitments')->statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
