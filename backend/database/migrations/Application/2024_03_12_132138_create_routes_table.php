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
            ->create('routes', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('menu_id');
                $table->string('link', 255);
                $table->boolean("active")->default(true);

                $table->foreign('menu_id')->references('id')->on('menus')->onDelete('no action');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
