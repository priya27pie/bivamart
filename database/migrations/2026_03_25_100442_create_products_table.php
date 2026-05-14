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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('category');
            $table->string('product_id');
            $table->string('title');
            $table->string('author');
            $table->string('series');
            $table->string('language');
            $table->string('publisher');
             $table->string('no_of_pages');
            $table->string('binding');
            $table->string('edition');
             $table->string('illustrations');
            $table->string('isbn');
            $table->double('price',9,2);
            $table->double('discounted_price',9,2);
            $table->integer('discount');
            $table->text('description');
            $table->text('specification');
            $table->date('published_on');
            $table->string('trending');
            $table->string('sub_category');   
            $table->string('latest');
            $table->string('min_age');
            $table->string('max_age');
            $table->string('tags')->nullable();
            $table->string('weight');
            $table->string('special_tag')->nullable();
            $table->string('tagcolor')->nullable();
          
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
