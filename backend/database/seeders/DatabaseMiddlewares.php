<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseMiddlewares extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // DB::connection('application')->table('middlewares')->truncate();
        // DB::connection('application')->table('middleware_role')->truncate();

        \App\Models\Auth\Middleware::create([
            "name" => "broadcasting-send-for-all",
            "description" => "Envio de mensagem a todos",
            "classification" => "Broadcast",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "broadcasting-send-private",
            "description" => "Envio de mensagem a um usuário",
            "classification" => "Broadcast",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "broadcasting-get-all",
            "description" => "Recebe as mensagens broadcast",
            "classification" => "Broadcast",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "broadcasting-message-readed",
            "description" => "Marca uma mensagem como lida",
            "classification" => "Broadcast",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "broadcasting-message-all",
            "description" => "Marca todas as mensagens broadcast como lidas",
            "classification" => "Broadcast",
            "active" => true
        ]);


        \App\Models\Auth\Middleware::create([
            "name" => "settings-permissions-role-change-status-middleware",
            "description" => "Alterar os papeis do grupo",
            "classification" => "Permissões",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "settings-permissions-role-change-status-menu",
            "description" => "Altera os menus do grupo",
            "classification" => "Permissões",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "settings-permissions-role-change-status-action",
            "description" => "Altera as ações do grupo",
            "classification" => "Permissões",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "credilus-search-cpf",
            "description" => "Acesso a busca por cpf: credilus/search/cpf/{cpf}",
            "classification" => "Credilus",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "credilus-search-phone",
            "description" => "Acesso a busca por telefone: credilus/search/phone/{phone}",
            "classification" => "Credilus",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "credilus-search-name",
            "description" => "Acesso a busca por nome: credilus/search/nome",
            "classification" => "Credilus",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "credilus-search-address",
            "description" => "Acesso a busca por endereço: credilus/search/address",
            "classification" => "Credilus",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "credilus-search-relative",
            "description" => "Acesso a busca por parente: credilus/search/relative",
            "classification" => "Credilus",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "credilus-search-email",
            "description" => "Acesso a busca por e-mail: credilus/search/email",
            "classification" => "Credilus",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-vacancies-list",
            "description" => "Acesso a busca a listar as vagas: curriculus/vacancies/list",
            "classification" => "Curriculus vagas",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-vacancies-getVacancy",
            "description" => "Acesso a busca de uma vaga: curriculus/vacancies/get-vacancy",
            "classification" => "Curriculus vagas",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-vacancies-storeVacancy",
            "description" => "Permite salvar os dados de uma vaga: curriculus/vacancies/store-vacancy",
            "classification" => "Curriculus vagas",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-vacancies-editVacancy",
            "description" => "Permite editar os dados de uma vaga: curriculus/vacancies/edit-vacancy",
            "classification" => "Curriculus vagas",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-vacancies-deactivateVacancy",
            "description" => "Permite desativar uma vaga: curriculus/vacancies/deactivate-vacancy",
            "classification" => "Curriculus vagas",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-vacancies-deleteVacancy",
            "description" => "Permite desativar uma vaga: curriculus/vacancies/delete-vacancy",
            "classification" => "Curriculus vagas",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-vacancies-listLocals",
            "description" => "Permite listar os locais para cadastro de uma vaga: curriculus/vacancies/list-locals-locals",
            "classification" => "Curriculus vagas",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-vacancies-listWorkModes",
            "description" => "Permite listar as modalidades de trabalho: curriculus/vacancies/list-work-modes",
            "classification" => "Curriculus vagas",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-candidates-list",
            "description" => "Permite listar os candidatos cadastrados: curriculus/candidates/list",
            "classification" => "Curriculus candidatos",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-candidates-get-previous-vacancies",
            "description" => "Permite listar as vagas em que o candidato ja se cadastrou: curriculus/candidates/get-previous-vacanies",
            "classification" => "Curriculus candidatos",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-candidates-get-resume-stage-history",
            "description" => "Permite listar o histórico de fases que o currículo passou: curriculus/candidates/get-resume-stage-history",
            "classification" => "Curriculus candidatos",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-candidates-storeCandidate",
            "description" => "Permite salvar os dados de um candidato: curriculus/candidates/store-candidate",
            "classification" => "Curriculus candidatos",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-candidates-downloadResume",
            "description" => "Permite realizar o download do currículo enviado pelo candidato: curriculus/candidates/download-resume",
            "classification" => "Curriculus candidatos",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-resume-search",
            "description" => "Permite acessar a rota de busca de curriculos: curriculus/resume/search",
            "classification" => "Curriculus curriculos",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-resume-search-by-uuid",
            "description" => "Permite acessar a rota de busca de curriculos: curriculus/resume/search-uuid",
            "classification" => "Curriculus curriculos",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-recruitment-stages-list",
            "description" => "Curriculus estágios de recrutamento - Permite listar os estágios de uma contratação: curriculus/recruitment-stages/list",
            "classification" => "Curriculus estágios de recrutamento",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-recruitment-stages-listCandidateByStage",
            "description" => "Permite listar os candidatos de um estágio de seleção: curriculus/recruitment-stages/list-candidate-by-stage",
            "classification" => "Curriculus estágios de recrutamento",
            "active" => true
        ]);

        \App\Models\Auth\Middleware::create([
            "name" => "curriculus-resume-stage-histories-save",
            "description" => "Permite salvar novo status de fase: /curriculus/resume-stage-histories/save",
            "classification" => "Curriculus estágios de recrutamento",
            "active" => true
        ]);
    }
}
