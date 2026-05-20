<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingDeposit extends Model
{
    protected $fillable = [
        'user_id',
        'wallet_id',
        'amount',
        'currency',
        'description',
        'reference',
        'status',
        'reviewed_by',
        'reviewed_at',
        'admin_note',
        'transaction_id',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'reviewed_at' => 'datetime',
            'expires_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }
}
