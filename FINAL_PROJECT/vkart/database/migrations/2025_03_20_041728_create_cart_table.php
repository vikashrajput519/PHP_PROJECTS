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
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('cartId'); // Primary key (auto-increment)
            $table->foreignId('userId')->constrained('users')->onDelete('cascade');
            $table->foreignId('productId')->constrained('products')->onDelete('cascade'); // ✅ Renamed correctly
            $table->integer('quantity')->default(1);
            $table->foreignId('couponId')->nullable()->constrained('coupons')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
