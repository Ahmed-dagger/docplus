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
        Schema::create('hospital_branches', function (Blueprint $table) {
            $table->id();
            $table->string('name',500)->nullable();
            $table->text('desc')->nullable();
            $table->string('image')->nullable();
            $table->time('work_from')->nullable();
            $table->time('work_to')->nullable();
            $table->string('location')->nullable();
            $table->text('about_us')->nullable();
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->text('phone')->nullable();
            $table->text('website_link')->nullable();
            $table->integer('rating_value')->nullable();
            $table->integer('num_of_raters')->nullable();
            $table->enum('type', ['hospital', 'center'])->default('hospital')->nullable();
            $table->unsignedBigInteger('hospital_id')->nullable();
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_branches');
    }
};
