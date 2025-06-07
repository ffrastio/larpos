<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'debt',
        'cash',
        'grand_total',
        'description'
    ];

    /**
     * Get all of the Customer for the Debt
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
