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
        Schema::create('reqeuestforusers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('request_type')->nullable();
            $table->string('name')->nullable();
            $table->string('auckland_type')->nullable();
            $table->string('document_number')->nullable();
            $table->integer('request_value_1faz')->nullable();
            $table->integer('request_value_3faz')->nullable();
            $table->integer('1faz')->nullable();
            $table->integer('3faz')->nullable();
            $table->integer('imber_power3')->nullable();
            $table->integer('imber_power1')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('governorate')->nullable();
            $table->integer('placement')->nullable();
            $table->string('street_name')->nullable();
            $table->string('building_number')->nullable();
            $table->string('the_nearest_landmark_is_available')->nullable();
            $table->string('registration_document')->nullable();
            $table->string('Land_plan')->nullable();
            $table->string('Site_plan')->nullable();
            $table->string('applicant_identity')->nullable();
            $table->string('temporary_pledge_form')->nullable();
            $table->string('fill_out_the_load_form')->nullable();
            $table->string('commercial_register_for_housing_companies')->nullable();

            $table->enum('status',['0','1'])->default('0');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reqeuestforusers');
    }
};
