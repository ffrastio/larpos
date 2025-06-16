<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //    
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'name',
        'description'
    ];

    /**
     * Get all of the Products for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Products()
    {
        return $this->hasMany(Product::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('/storage/categories/' . $value),
        );
    }
}
