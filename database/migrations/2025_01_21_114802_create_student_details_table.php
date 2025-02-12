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
        Schema::create('student_details', function (Blueprint $table) {
            $table->string('aadhaar_no', 12)->primary();
            $table->string('firstname', 20)->nullable(false);
            $table->string('middlename', 20)->nullable();
            $table->string('lastname', 20)->nullable(false);
            $table->string('email', 50)->unique()->nullable(false);
            $table->string('mobile_no', 10)->unique()->nullable(false);
            $table->string('alternate_mobile_no', 10)->unique()->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable(false);
            $table->enum('caste', ['OBC-A', 'OBC-B', 'SC', 'ST', 'General'])->nullable(false);
            $table->date('dob')->nullable(false);
            $table->integer('age')->nullable();
            $table->string('nationality')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
