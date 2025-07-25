<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'email',
        'tax_percentage',
        'subtotal',
        'tax_amount',
        'total',
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
