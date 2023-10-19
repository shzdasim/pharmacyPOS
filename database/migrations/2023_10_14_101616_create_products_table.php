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
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('formulation')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('manufacturer_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->string('product_barcode')->nullable();
            $table->string('pack_size');
            $table->integer('current_quantity')->nullable()->default(0);
            $table->string('batch_number')->nullable();
            $table->decimal('pack_purchase_price', 10, 2)->nullable();
            $table->decimal('pack_avg_purchase_price', 10, 2)->nullable();
            $table->decimal('single_purchase_price', 10, 2)->nullable();
            $table->decimal('pack_sale_price', 10, 2)->nullable();
            $table->decimal('single_avg_sale_price', 10, 2)->nullable();
            $table->decimal('single_sale_price', 10, 2)->nullable();
            $table->decimal('margin', 10, 2)->nullable();
            $table->string('location')->nullable();
            $table->boolean('narcotics_lock')->default(false);
            $table->timestamps();
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
