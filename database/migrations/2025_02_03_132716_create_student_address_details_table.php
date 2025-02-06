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
        Schema::create('student_address_details', function (Blueprint $table) {
            $table->id();
            // $table->string('student_address_id', 5)->primary();
            // $table->unsignedBigInteger('s_id');
            $table->string('s_id',12);
            $table->string('country', 20)->nullable(false);
            $table->string('current_house_no', 6)->nullable();
            $table->string('current_street', 50)->nullable();
            $table->string('current_district', 50)->nullable();
            $table->string('current_pincode', 6)->nullable();
            $table->string('current_state', 15)->nullable();
            $table->boolean('same_as_current')->default(0);
            $table->string('permanent_house_no', 6)->nullable();
            $table->string('permanent_street', 50)->nullable();
            $table->string('permanent_district', 50)->nullable();
            $table->string('permanent_pincode', 6)->nullable();
            $table->string('permanent_state', 15)->nullable();
            $table->timestamps();
            $table->foreign('s_id')->references('aadhaar_no')->on('student_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_address_details');
    }
};
