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
        Schema::table('orders', function (Blueprint $table) {

            $table->enum('pay_status', [
                'PENDING',
                'PAID',
                'FAILED',
                'REFUNDED'
            ])->default('PENDING');

            $table->string('payment_method')->nullable()->after('pay_status');

            $table->string('transaction_id')->nullable()->after('payment_method');

        });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'pay_status',
                'payment_method',
                'transaction_id'
            ]);

        });
    }
};
