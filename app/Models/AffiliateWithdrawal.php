<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateWithdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_id',
        'amount',
        'bank_account',
        'status',
        'requested_date',
        'approved_date',
        'notes'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'requested_date' => 'datetime',
        'approved_date' => 'datetime',
    ];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }
}
