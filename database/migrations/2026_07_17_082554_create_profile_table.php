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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('company_name')->nullable();
            $table->string('title')->nullable();
            $table->string('gst')->nullable();
            $table->string('website')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('email')->nullable();
            $table->string('watsapp')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('fb')->nullable();
            $table->string('insta')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('phone')->nullable();
            $table->string('state')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
