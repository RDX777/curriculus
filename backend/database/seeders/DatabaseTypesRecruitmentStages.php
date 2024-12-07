<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recruitment\TypeRecruitmentStage;

use Illuminate\Support\Facades\DB;

class DatabaseTypesRecruitmentStages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('recruitments')->table('types_recruitment_stages')->truncate();

        TypeRecruitmentStage::create([
            "description" => "Triagem",
        ]);

        TypeRecruitmentStage::create([
            "description" => "Em Andamento",
        ]);

        TypeRecruitmentStage::create([
            "description" => "Aprovado",
        ]);

        TypeRecruitmentStage::create([
            "description" => "Reprovado",
        ]);

        TypeRecruitmentStage::create([
            "description" => "Recusou-se",
        ]); 
        

    }
}
