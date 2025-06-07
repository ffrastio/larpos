<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'cashier_id',
        'product_id',
        'qty',
        'price'
    ];

    /**
     * Get the Product that owns the cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
