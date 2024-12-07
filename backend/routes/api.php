<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Broadcasts\MessageController;
use App\Http\Controllers\Credilus\CredilusController;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\Recruitment\VacancieController;
use App\Http\Controllers\Recruitment\CandidateController;
use App\Http\Controllers\Recruitment\RecruitmentStagesController;
use App\Http\Controllers\Recruitment\ResumeController;
use App\Http\Controllers\Recruitment\ResumeStageHistoriesController;

use Illuminate\Support\Facades\Broadcast;

use App\Http\Middleware\Auth\EnsureUserHasRole;

Route::prefix("v1")->group(function () {

    Route::prefix("auth")->group(function () {
        Route::post(
            "/login",
            [AuthController::class, "login"]
        )->name("post.auth.login");
    });

    Route::middleware("auth:sanctum")->group(function () {

        Route::get('/user', function (Request $request) {
            return $request->user();
        })->name("get.user");

        Route::prefix("auth")->group(function () {
            Route::post(
                "/logout",
                [AuthController::class, "logout"]
            )->name("post.auth.logout");
        });

        Route::prefix("settings")->group(function () {

            Route::prefix("permissions")->group(function () {
                Route::prefix("search")->group(function () {
                    Route::middleware([EnsureUserHasRole::class . ":settings-permissions-search-role"])
                        ->get("/role/{itemSearch}", [SettingsController::class, "searchRoleById"])->name("get.settings.permissions.search.role");
                });
                Route::prefix("list")->group(function () {
                    Route::middleware([EnsureUserHasRole::class . ":settings-permissions-list-roles"])
                        ->get("/roles", [SettingsController::class, "listRoles"])->name("get.settings.permissions.list.roles");
                });

                Route::prefix("role")->group(function () {
                    Route::middleware([EnsureUserHasRole::class . ":settings-permissions-role-change-status-middleware"])
                        ->patch("/middleware/{idRole}", [SettingsController::class, "changeRoleMiddlewareStatus"])->name("patch.settings.permissions.role.middleware.changeRoleMiddlewareStatus");
                    Route::middleware([EnsureUserHasRole::class . ":settings-permissions-role-change-status-menu"])
                        ->patch("/menu/{idRole}", [SettingsController::class, "changeRoleMenuStatus"])->name("patch.settings.permissions.role.menu.changeMenuStatus");
                    Route::middleware([EnsureUserHasRole::class . ":settings-permissions-role-change-status-action"])
                        ->patch("/action/{idRole}", [SettingsController::class, "changeRoleActionStatus"])->name("patch.settings.permissions.role.menu.changeActionStatus");
                });
            });
        });

        Route::prefix("credilus")->group(function () {
            Route::middleware([EnsureUserHasRole::class . ":credilus-search-cpf"])
                ->get("/search/cpf/{cpf}", [CredilusController::class, "searchByCpf"])->name("get.credilus.search-cpf");
            Route::middleware([EnsureUserHasRole::class . ":credilus-search-phone"])
                ->get("/search/phone/{phone}", [CredilusController::class, "searchByPhone"])->name("get.credilus.search-phone");
            Route::middleware([EnsureUserHasRole::class . ":credilus-search-name"])
                ->get("/search/name", [CredilusController::class, "searchByName"])->name("get.credilus.search-name");
            Route::middleware([EnsureUserHasRole::class . ":credilus-search-address"])
                ->get("/search/address", [CredilusController::class, "searchByAddress"])->name("get.credilus.search-address");
            Route::middleware([EnsureUserHasRole::class . ":credilus-search-relative"])
                ->get("/search/relative", [CredilusController::class, "searchByRelative"])->name("get.credilus.search-relative");
            Route::middleware([EnsureUserHasRole::class . ":credilus-search-email"])
                ->get("/search/email", [CredilusController::class, "searchByEmail"])->name("get.credilus.search-email");
        });

        Route::prefix("broadcasting")->group(function () {
            Route::middleware([EnsureUserHasRole::class . ":broadcasting-send-for-all"])
                ->post("/send-for-all", [MessageController::class, "sendForAll"])->name("post.broadcasting.sendForAll");
            Route::middleware([EnsureUserHasRole::class . ":broadcasting-send-private"])
                ->post("/send-private", [MessageController::class, "sendPrivate"])->name("post.broadcasting.sendPrivate");
            Route::middleware([EnsureUserHasRole::class . ":broadcasting-get-all"])
                ->get("/get-all", [MessageController::class, "getAll"])->name("post.broadcasting.messages");
            Route::middleware([EnsureUserHasRole::class . ":broadcasting-message-readed"])
                ->patch("/message/readed/{messageId}", [MessageController::class, "readed"])->name("post.broadcasting.readed");
            Route::middleware([EnsureUserHasRole::class . ":broadcasting-message-all"])
                ->put("/message/readed/all", [MessageController::class, "readedAll"])->name("post.broadcasting.readedAll");
        });

        Route::prefix("curriculus")->group(function () {
            Route::prefix("vacancies")->group(function () {
                Route::get("/list", [VacancieController::class, "list"])->name("get.curriculus.vacancies.list");


                Route::middleware([EnsureUserHasRole::class . ":curriculus-vacancies-storeVacancy"])
                    ->post("/store-vacancy", [VacancieController::class, "storeVacancy"])->name("post.curriculus.vacancies.storeVacancy");
                Route::middleware([EnsureUserHasRole::class . ":curriculus-vacancies-editVacancy"])
                    ->patch("/edit-vacancy", [VacancieController::class, "editVacancy"])->name("patch.curriculus.vacancies.editVacancy");
                Route::middleware([EnsureUserHasRole::class . ":curriculus-vacancies-deactivateVacancy"])
                    ->patch("/deactivate-vacancy", [VacancieController::class, "deactivateVacancy"])->name("patch.curriculus.vacancies.deactivateVacancy");
                Route::middleware([EnsureUserHasRole::class . ":curriculus-vacancies-deleteVacancy"])
                    ->patch("/delete-vacancy", [VacancieController::class, "deleteVacancy"])->name("patch.curriculus.vacancies.deleteVacancy");

                Route::get("/get-vacancy", [VacancieController::class, "getVacancy"])->name("get.curriculus.vacancies.getVacancy");
                Route::get("/list-locals", [VacancieController::class, "listLocals"])->name("get.curriculus.vacancies.listLocals");
                Route::get("/list-work-modes", [VacancieController::class, "listWorkModes"])->name("get.curriculus.vacancies.listWorkModes");
            });

            Route::prefix("candidates")->group(function () {
                Route::middleware([EnsureUserHasRole::class . ":curriculus-candidates-list"])
                    ->get("/list", [CandidateController::class, "candidateList"])->name("get.curriculus.candidates.list");
                Route::middleware([EnsureUserHasRole::class . ":curriculus-candidates-get-previous-vacancies"])
                    ->get("/get-previous-vacancies", [CandidateController::class, "getPreviousVacancies"])->name("get.curriculus.candidates.getPreviousVacancies");
                Route::middleware([EnsureUserHasRole::class . ":curriculus-candidates-get-resume-stage-history"])
                    ->get("/get-resume-stage-history", [CandidateController::class, "getResumeStageHistory"])->name("get.curriculus.candidates.getResumeStageHistory");

                Route::middleware([EnsureUserHasRole::class . ":curriculus-candidates-downloadResume"])
                    ->get("/download-resume/{fileName}", [CandidateController::class, "downloadResume"])->name("get.curriculus.candidates.downloadResume");

                Route::post("/store-candidate", [CandidateController::class, "storeCandidate"])->name("post.curriculus.candidates.storeCandidate");
            });

            Route::prefix("resume")->group(function () {
                Route::middleware([EnsureUserHasRole::class . ":curriculus-resume-search"])
                    ->get("/search", [ResumeController::class, "search"])->name("get.curriculus.resume.search");
                Route::middleware([EnsureUserHasRole::class . ":curriculus-resume-search-by-uuid"])
                    ->get("/search-uuid", [ResumeController::class, "searchByUuid"])->name("get.curriculus.resume.searchByUuid");
            });

            Route::prefix("recruitment-stages")->group(function () {
                Route::middleware([EnsureUserHasRole::class . ":curriculus-recruitment-stages-list"])
                    ->get("/list", [RecruitmentStagesController::class, "list"])->name("get.curriculus.recruitment.stages.list");
                Route::middleware([EnsureUserHasRole::class . ":curriculus-recruitment-stages-listCandidateByStage"])
                    ->get("/list-candidate-by-stage", [RecruitmentStagesController::class, "listCandidateByStage"])->name("get.curriculus.recruitment.stages.listCandidateByStage");
            });

            Route::prefix("resume-stage-histories")->group(function () {
                Route::middleware([EnsureUserHasRole::class . ":curriculus-resume-stage-histories-save"])
                    ->post("/save", [ResumeStageHistoriesController::class, "save"])->name("post.curriculus.resume.stage.histories.save");
            });

        });
    });
});
