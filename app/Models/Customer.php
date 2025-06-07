<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    protected $fillable = [
        'name',
        'address',
        'gender',
        'no_hp'
    ];

    /**
     * Get all of the Transaction for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get all of the Debt for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Debt()
    {
        return $this->hasMany(Debt::class);
    }
}
