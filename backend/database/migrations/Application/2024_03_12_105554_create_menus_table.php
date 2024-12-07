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
            ->create('menus', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger("belong_menu_id")->nullable()->default(null);
                $table->integer("position")->nullable()->default(null);
                $table->integer("level");
                $table->string('name')->unique();
                $table->string('icon')->nullable()->default(null);
                $table->string('classification');
                $table->text("description");
                $table->boolean("active")->default(true);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
