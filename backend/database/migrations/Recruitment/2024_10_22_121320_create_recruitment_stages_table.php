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
        Schema::create('recruitment_stages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_recruitment_stage_id');
            $table->foreign('type_recruitment_stage_id')->references('id')->on('types_recruitment_stages')->onDelete('no action')->onUpdate('no action');
            $table->string("description")->nullable()->unique();
            $table->boolean("allow_jump")->default(false);
            $table->boolean("allow_date")->default(false);
            $table->boolean("active")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_stages');
    }
};
