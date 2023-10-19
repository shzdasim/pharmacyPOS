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
        Schema::create('purchase_invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_invoice_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->decimal('invoice_purchase_price_packet', 10, 2);
            $table->decimal('invoice_purchase_price_unit', 10, 2);
            $table->decimal('pack_avg_purchase_price', 10, 2);
            $table->integer('pack_quantity');
            $table->integer('unit_quantity');
            $table->integer('pack_bonus');
            $table->integer('unit_bonus');
            $table->decimal('percent_bonus', 5, 2);
            $table->decimal('new_sale_price_packet', 10, 2);
            $table->decimal('new_sale_price_unit', 10, 2);
            $table->decimal('single_avg_sale_price', 10, 2);
            $table->string('batch_number')->nullable();
            $table->decimal('margin', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_invoice_items');
    }
};
