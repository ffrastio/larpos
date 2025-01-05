<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use HasFactory;
    use SoftDeletes;

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
}
