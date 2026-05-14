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
        Schema::create('homepage', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('first_slider');
            $table->string('latest_title');
            $table->string('latest_bigtitle')->nullable();
            $table->string('video')->nullable();
            $table->string('latest_slider')->nullable();
            $table->string('second_slider')->nullable();
             $table->string('category_image1')->nullable();
            $table->string('image1_link')->nullable();
            $table->string('category_image2')->nullable();
            $table->string('image2_link')->nullable();
            $table->string('category_image3')->nullable();
             $table->string('image3_link')->nullable();
             $table->string('category_image4')->nullable();
             $table->string('image4_link')->nullable();
             $table->string('category_image5')->nullable();
             $table->string('image5_link')->nullable();
             $table->string('category_video')->nullable();
             $table->string('third_slider')->nullable();
             $table->string('fourth_slider')->nullable();
             $table->string('fifth_slider')->nullable();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage');
    }
};
