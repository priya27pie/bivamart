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
        Schema::create('shipping', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('citybase');
            $table->text('citybase_next');
            $table->string('statebase');
            $table->text('statebase_next');
            $table->text('spclpincode_base');
            $table->text('spclpincode_nxt');
            $table->string('countrybase');
            $table->string('countrybase_next');  
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping');
    }
};
