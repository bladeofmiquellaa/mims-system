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
        Schema::create('ccases', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('doctor_id')->refrences('id')->on('users');
            $table->integer('radiologist_id')->nullable()->refrences('id')->on('users');
            $table->string('state');
            $table->string('patient_name');
            $table->string('location');
            $table->integer('category_id')->nullable()->refrences('id')->on('categories');
            $table->text('history')->nullable();
            $table->text('findings')->nullable();
            $table->text('diagnosis')->nullable();
            $table->integer('age');
            $table->integer('organs_id')->nullable()->refrences('id')->on('organs');
            $table->integer('subcategory_id')->nullable()->refrences('id')->on('subcategories');
            $table->string('medical_code');
            $table->string('gender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ccases');
    }
};
