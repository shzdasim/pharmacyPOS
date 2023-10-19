<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'formulation', 'category_id', 'manufacturer_id','supplier_id', 'product_barcode',
        'pack_size', 'current_quantity', 'batch_number', 'pack_purchase_price',
        'single_purchase_price', 'pack_sale_price', 'single_sale_price', 'location', 'pack_avg_purchase_price', 'single_avg_sale_price', 'margin',
        'narcotics_lock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function purchaseInvoiceItems()
    {
        return $this->hasMany(PurchaseInvoiceItem::class);
    }
    use HasFactory;
}
