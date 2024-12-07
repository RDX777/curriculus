<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseActions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::connection('application')->table('actions')->truncate();
        // DB::connection('application')->table('action_role')->truncate();

        \App\Models\Auth\Action::create([
            "name" => "can-credilus-search-cpf",
            "classification" => "Credilus",
            "description" => "Executa a busca por cpf",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-credilus-search-phone",
            "classification" => "Credilus",
            "description" => "Executa a busca por telefone",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-credilus-search-name",
            "classification" => "Credilus",
            "description" => "Executa a busca por nome",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-credilus-search-address",
            "classification" => "Credilus",
            "description" => "Executa a busca por endereço",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-credilus-search-relative",
            "classification" => "Credilus",
            "description" => "Executa a busca por parente",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-credilus-search-email",
            "classification" => "Credilus",
            "description" => "Executa a busca por email",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-vacancies-list",
            "classification" => "Curriculus Vagas",
            "description" => "Realiza a busca de todas as vagas",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-vacancies-getVacancy",
            "classification" => "Curriculus Vagas",
            "description" => "Realiza a busca de uma as vagas pelo id",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-vacancies-storeVacancy",
            "classification" => "Curriculus Vagas",
            "description" => "Salva os dados de uma vaga",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-vacancies-editVacancy",
            "classification" => "Curriculus Vagas",
            "description" => "Edita os dados de uma vaga",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-vacancies-deactivateVacancy",
            "classification" => "Curriculus Vagas",
            "description" => "Desativa os dados de uma vaga",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-vacancies-deleteVacancy",
            "classification" => "Curriculus Vagas",
            "description" => "Deleta os dados de uma vaga",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-vacancies-listLocals",
            "classification" => "Curriculus Vagas",
            "description" => "Lista as localidades para cadastro de uma vaga",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-vacancies-listWorkModes",
            "classification" => "Curriculus Vagas",
            "description" => "Lista as modalidades de trabalho disponiveis",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-candidates-list",
            "classification" => "Curriculus Candidatos",
            "description" => "Lista os candidatos",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-candidates-getPreviousVacancies",
            "classification" => "Curriculus Candidatos",
            "description" => "Lista as vagas anteriores que o candidato ja participou",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-candidates-getResumeStageHistory",
            "classification" => "Curriculus Candidatos",
            "description" => "Lista o histórico do currículo",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-candidates-storeCandidate",
            "classification" => "Curriculus Candidatos",
            "description" => "Salva os dados de um candidato",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-candidates-downloadResume",
            "classification" => "Curriculus Candidatos",
            "description" => "Realiza o download do currículo enviado pelo candidato",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-resume-search",
            "classification" => "Curriculus Curriculos",
            "description" => "Realiza a busca de um canditado",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-resume-searchByUuid",
            "classification" => "Curriculus Curriculos",
            "description" => "Realiza a busca de um canditado pelo seu uuid",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-recruitment-stages-list",
            "classification" => "Curriculus estágios de recrutamento",
            "description" => "Lista os estágios de uma candidatura",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-recruitment-stages-listCandidateByStage",
            "classification" => "Curriculus estágios de recrutamento",
            "description" => "Lista candidatos pelo estagio atual do processo seletivo",
            "active" => true
        ]);

        \App\Models\Auth\Action::create([
            "name" => "can-curriculus-resume-stage-histories-save",
            "classification" => "Curriculus estágios de recrutamento",
            "description" => "Salva um novo estágio para o  currículo selecionado",
            "active" => true
        ]);

    }
}
