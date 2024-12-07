<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('recruitments')
            ->create('resumes', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('candidate_id');
                $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('no action')->onUpdate('no action');
                $table->uuid("uuid_vacancy");
                $table->foreign('uuid_vacancy')->references('uuid')->on('vacancies')->onDelete('no action')->onUpdate('no action');
                $table->unsignedBigInteger("last_recruitment_stage_id");
                $table->foreign('last_recruitment_stage_id')->references('id')->on('recruitment_stages')->onDelete('no action')->onUpdate('no action');
                $table->string("indicated_by")->nullable();
                $table->longText("professional_summary")->nullable();
                $table->longText("academic_background")->nullable();
                $table->longText("professional_experience")->nullable();
                $table->longText("additional_information")->nullable();
                $table->string("file")->nullable();
                $table->boolean("consent")->nullable()->default(1);
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
