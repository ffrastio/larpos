<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'CUSTOMER_ID',
        'DEBT',
        'CASH',
        'GRAND_TOTAL',
        'DESCRIPTION'
    ];

    /**
     * Get all of the Customer for the Debt
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Customer()
    {
        return $this->hasMany(Customer::class);
    }
}
