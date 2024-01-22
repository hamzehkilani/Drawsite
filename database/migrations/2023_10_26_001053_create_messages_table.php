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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('content'); // Add a column for the message content
            $table->unsignedBigInteger('sender_id'); // Add a foreign key column to associate the message with a user
            $table->unsignedBigInteger('recever_id'); // Add a foreign key column to associate the message with a user
            $table->enum('stauts',['0','1'])->default('0'); // Add a foreign key column to associate the message with a user

            
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
