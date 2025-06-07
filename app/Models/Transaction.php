<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    //
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cashier_id',
        'customer_id',
        'invoice',
        'cash',
        'change',
        'discount',
        'grand_total'
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
        return $this->belongsTo(User::class, 'cashier_id');
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
    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format("d-M-Y H:i:s"),
        );
    }
}
