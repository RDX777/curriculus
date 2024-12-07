<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('recruitments')
            ->create('vacancies', function (Blueprint $table) {
                $table->uuid()->primary()->default(DB::raw('UUID()'))->unique();
                $table->unsignedBigInteger('company_id')->nullable();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict')->onUpdate('restrict');
                $table->unsignedBigInteger('work_mode_id')->nullable();
                $table->foreign('work_mode_id')->references('id')->on('work_modes')->onDelete('restrict')->onUpdate('restrict');
                $table->string("title")->nullable();
                $table->tinyText("short_description")->nullable();
                $table->longText("long_description")->nullable();
                $table->boolean("active")->default(true);
                $table->boolean("deleted")->default(false);
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
