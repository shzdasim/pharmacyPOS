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
        Schema::create('purchase_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_number')->unique();
            $table->date('purchase_date')->default(now());
            $table->foreignId('supplier_id')->constrained();
            $table->string('supplier_bill_number');
            $table->date('supplier_bill_date')->default(now());
            $table->decimal('bill_amount', 10, 2);
            $table->decimal('invoice_discount', 10, 2);
            $table->decimal('invoice_tax', 10, 2);
            $table->decimal('payable_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_invoices');
    }
};
