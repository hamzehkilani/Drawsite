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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Add a column for the event title
            $table->text('description'); // Add a column for the event description
            $table->date('date'); // Add a column for the event date
            $table->string('location'); // Add a column for the event location
            $table->unsignedBigInteger('user_id'); // Add a foreign key column to associate the event with a user who created it
            $table->enum('status',['active','unactive'])->default('active');
            $table->string('image')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
