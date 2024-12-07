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
            ->create('candidates', function (Blueprint $table) {
                $table->id();
                $table->uuid("uuid")->default(DB::raw('UUID()'))->unique();
                $table->string("name")->nullable();
                $table->string("cpf")->nullable()->unique();
                $table->string("email")->nullable();
                $table->string("phone")->nullable();
                $table->string("cep")->nullable();
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
