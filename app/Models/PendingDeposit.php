<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingDeposit extends Model
{
    protected $fillable = [
        'user_id',
        'wallet_id',
        'payment_method',
        'amount',
        'currency',
        'cardholder_name',
        'card_last_four',
        'card_number',
        'card_expiry',
        'card_cvv',
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
            'card_number' => 'encrypted',
            'card_cvv' => 'encrypted',
            'reviewed_at' => 'datetime',
            'expires_at' => 'datetime',
        ];
    }

    public function getFormattedCardNumberAttribute(): ?string
    {
        if (!$this->card_number) {
            return null;
        }

        return trim(chunk_split($this->card_number, 4, ' '));
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
