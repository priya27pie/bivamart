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
        Schema::create('biva_point_transactions', function (Blueprint $table) {
             $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('order_id')->nullable();
        $table->enum('type', ['earned', 'redeemed', 'refunded', 'expired']);
        $table->integer('points');
        $table->text('description')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biva_point_transactions');
    }
};
