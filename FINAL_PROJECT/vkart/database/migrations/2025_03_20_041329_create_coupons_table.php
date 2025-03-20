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
            $table->id(); // Define primary key with custom name
            $table->string('code')->unique(); // Coupon code (e.g., "DISCOUNT10")
            $table->decimal('discount_amount', 8, 2); // Discount amount (flat value)
            $table->integer('discount_percentage')->nullable(); // Optional percentage discount
            $table->dateTime('expires_at'); // Expiry date
            $table->timestamps();
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
