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
        Schema::create('user_details', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('age')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('street_number')->nullable();
            $table->string('unit_number')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('relation_to_household_head')->nullable();
            $table->string('sex')->nullable();
            $table->string('race_ethnicity')->nullable();
            $table->string('ssn')->nullable();

            $table->unsignedBigInteger('employer_id')->nullable();
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');

            $table->string('employer_name')->nullable();
            $table->string('income')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('online')->default(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
