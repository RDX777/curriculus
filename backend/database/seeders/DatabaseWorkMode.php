<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recruitment\WorkMode;

use Illuminate\Support\Facades\DB;

class DatabaseWorkMode extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('recruitments')->table('work_modes')->truncate();

        WorkMode::create([
            "id" => 1,
            "name" => "Híbrido",
        ]);

        WorkMode::create([
            "id" => 2,
            "name" => "Presencial",
        ]);

        WorkMode::create([
            "id" => 3,
            "name" => "Remoto",
        ]);
    }
}
