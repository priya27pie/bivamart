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
        Schema::create('reviews', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')->constrained()->onDelete('cascade');

    $table->foreignId('order_id')->constrained()->onDelete('cascade');

    $table->string('product_id');

    $table->enum('product_type', ['book', 'other']);

    $table->tinyInteger('rating');

    $table->text('review')->nullable();

    $table->enum('status', ['Pending', 'Approved', 'Rejected'])
          ->default('Pending');

    $table->timestamps();
});
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
