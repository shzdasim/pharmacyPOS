<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    protected $fillable = [
        'purchase_number',
        'purchase_date',
        'supplier_id',
        'supplier_bill_number',
        'supplier_bill_date',
        'bill_amount',
        'invoice_discount',
        'invoice_tax',
        'payable_amount',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function items()
    {
        return $this->hasMany(PurchaseInvoiceItem::class);
    }
    use HasFactory;
}
