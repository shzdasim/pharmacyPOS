<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceItem extends Model
{
    protected $fillable = [
        'invoice_purchase_price_packet',
        'invoice_purchase_price_unit',
        'pack_avg_purchase_price',
        'pack_quantity',
        'unit_quantity', 
        'pack_bonus',
        'unit_bonus',
        'percent_bonus',
        'new_sale_price_packet',
        'new_sale_price_unit',
        'single_avg_sale_price',
        'batch_number',
        'margin',
    ];

    public function invoice()
    {
        return $this->belongsTo(PurchaseInvoice::class, 'purchase_invoice_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    use HasFactory;
}
