<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resume_stage_histories', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->default(DB::raw('UUID()'))->unique();
            $table->unsignedBigInteger('candidate_id');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('no action')->onUpdate('no action');
            $table->uuid("uuid_vacancy");
            $table->foreign('uuid_vacancy')->references('uuid')->on('vacancies')->onDelete('no action')->onUpdate('no action');
            $table->unsignedBigInteger("recruitment_stage_id");
            $table->foreign('recruitment_stage_id')->references('id')->on('recruitment_stages')->onDelete('no action')->onUpdate('no action');
            $table->unsignedBigInteger("resume_id");
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('no action')->onUpdate('no action');
            $table->longText("observation")->nullable();
            $table->string("login_user")->nullable()->index();
            $table->string("name_user")->nullable()->index();
            $table->datetime('start_in')->nullable();
            $table->datetime('end_in')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_stage_histories');
    }
};
