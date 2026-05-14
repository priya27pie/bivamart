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
        Schema::create('otherproducts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
             $table->string('product_id');
            $table->string('title');
            $table->double('price',9,2);
            $table->double('discounted_price',9,2);
            $table->integer('discount');
            $table->text('description');
            $table->text('specification');
            $table->string('trending');
            $table->string('sub_category');
             $table->string('category');
             $table->string('tags')->nullable();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otherproducts');
    }
};
