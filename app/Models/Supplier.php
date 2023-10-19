<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'type',
        'phone_number',
        'address',
        'account_number',
        // Add other fields as needed
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function purchaseInvoices()
    {
        return $this->hasMany(PurchaseInvoice::class);
    }
    use HasFactory;
}
