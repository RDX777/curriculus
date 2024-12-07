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
        Schema::connection('application')
            ->create('middleware_role', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id');
                $table->unsignedBigInteger('middleware_id');

                $table->foreign('role_id')->references('id')->on('roles')->onDelete('no action')->onUpdate('no action');
                $table->foreign('middleware_id')->references('id')->on('middlewares')->onDelete('no action')->onUpdate('no action');

                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('middleware_role');
    }
};
