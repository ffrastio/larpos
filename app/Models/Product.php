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
        'category_id',
        'image',
        'barcode',
        'name',
        'description',
        'previous_price',
        'buy_price',
        'sell_price',
        'stock'
    ];

    /**
     * Get the Category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function IMAGE(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url('/storage/products/' . $value),
        );
    }
}
