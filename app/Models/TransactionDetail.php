<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'product_id',
        'qty',
        'price',
    ];

    /**
     * Get the Transaction that owns the TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
     * Get the Product that owns the TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
