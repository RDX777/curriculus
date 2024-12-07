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
            ->create('broadcast_message_user', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('broadcast_message_id');
                $table->boolean("read")->default(false);

                $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
                $table->foreign('broadcast_message_id')->references('id')->on('broadcast_messages')->onDelete('no action')->onUpdate('no action');

                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broadcast_messages_users');
    }
};
