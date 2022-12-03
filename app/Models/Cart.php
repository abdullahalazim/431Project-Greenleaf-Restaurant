<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip_address',
        'product_id',
        'order_id',
        'quantity',
    ];

    public function product(){
        return $this->belongsTo(product::class);
      }
}
