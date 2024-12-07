<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recruitment\RecruitmentStage;

use Illuminate\Support\Facades\DB;

class DatabaseRecruitmentStages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('recruitments')->table('recruitment_stages')->truncate();

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 1,
            "description" => "Triagem",
            "allow_date" => 0
        ]);

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 2,
            "description" => "Análise e Seleção",
            "allow_date" => 0
        ]);

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 2,
            "description" => "Contato Inicial (Pré-entrevista)",
            "allow_date" => 0
        ]);

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 2,
            "description" => "Entrevista Inicial",
            "allow_date" => 1
        ]);

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 2,
            "description" => "Treinamento",
            "allow_date" => 1
        ]);

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 2,
            "description" => "Entrevista com Gestor",
            "allow_date" => 1
        ]);

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 2,
            "description" => "Avaliação Final",
            "allow_date" => 0
        ]);

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 2,
            "description" => "Oferta de Trabalho",
            "allow_date" => 0
        ]);

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 3,
            "description" => "Processo de Contratação",
            "allow_date" => 0
        ]);

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 4,
            "description" => "Não Aprovado",
            "allow_jump" => 1,
            "allow_date" => 0
        ]);

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 5,
            "description" => "Candidato Recusou",
            "allow_jump" => 1,
            "allow_date" => 0
        ]);

        RecruitmentStage::create([
            "type_recruitment_stage_id" => 4,
            "description" => "Duplicado",
            "allow_jump" => 1,
            "allow_date" => 0
        ]);

    }
}
