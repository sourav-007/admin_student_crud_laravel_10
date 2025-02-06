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
        Schema::create('qualification_details', function (Blueprint $table) {
            $table->id();
            // $table->string('qualification_id', 5)->primary();
            // $table->unsignedBigInteger('s_id');
            $table->string('s_id',12);
            $table->enum('qualification_type', ['High School', 'Intermediate', 'Graduation', 'Post Graduation'])->nullable(false);
            $table->string('institution_name', 100)->nullable(false);
            $table->string('board_university', 100)->nullable(false);
            $table->year('passing_year')->nullable(false);
            $table->decimal('percentage', 5, 2)->nullable();
            $table->timestamps();
            $table->foreign('s_id')->references('aadhaar_no')->on('student_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualification_details');
    }
};
