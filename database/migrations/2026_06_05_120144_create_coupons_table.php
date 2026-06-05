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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('coupon_code', 50)->unique();
            $table->enum('discount_type', ['fixed', 'percent']);
            $table->decimal('discount_value', 10, 2);
            $table->decimal('min_order_amount', 10, 2)->default(0);
            $table->date('expiry_date');
            $table->tinyInteger('status')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
