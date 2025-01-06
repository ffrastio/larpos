<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    //
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'CASHIER_ID',
        'CUSTOMER_ID',
        'INVOICE',
        'CASH',
        'CHANGE',
        'DISCOUNT',
        'GRAND_TOTAL'
    ];

    /**
     * Get all of the TransactionDetails for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function TransactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    /**
     * Get the Cutomer that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Cutomer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the User that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(User::class, 'CASHIER_ID');
    }

    /**
     * Get all of the Profit for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Profit()
    {
        return $this->hasMany(Profit::class);
    }
}
