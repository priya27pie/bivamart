<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherproductSubcategoryTable extends Migration
{
    public function up()
    {
        Schema::create('otherproduct_subcategory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('otherproduct_id');
            $table->unsignedBigInteger('subcategory_id');

            $table->foreign('otherproduct_id')
                  ->references('id')->on('otherproducts')
                  ->onDelete('cascade');

            $table->foreign('subcategory_id')
                  ->references('id')->on('subcategories')
                  ->onDelete('cascade');

            $table->unique(['otherproduct_id', 'subcategory_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('otherproduct_subcategory');
    }
}
