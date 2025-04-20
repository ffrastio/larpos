<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use HasFactory;
    use SoftDeletes;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        "CATEGORY_ID",
        "IMAGE",
        "BARCODE",
        "NAME",
        "DESCRIPTION",
        "PREVIOUS_PRICE",
        "BUY_PRICE",
        "SELL_PRICE",
        "STOCK"
    ];

    /**
     * Get the Category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Category()
    {
        return $this->belongsTo(Category::class, 'CATEGORY_ID');
    }

    public function IMAGE(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url('/storage/products/' . $value),
        );
    }
}
