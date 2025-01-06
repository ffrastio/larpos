<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'TRANSACTION_ID',
        'TOTAL'
    ];

    /**
     * Get the Transaction that owns the Profit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    
}
