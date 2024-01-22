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
        Schema::create('painters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add a foreign key to associate the painter with a user
            $table->string('name'); // Add a column for the painter's name
            $table->string('email')->unique(); // Add a column for the painter's name

            $table->text('bio'); // Add a column for the painter's biography or information
            $table->string('image'); // Add a column for the painter's image or artwork
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('painters');
    }
};
