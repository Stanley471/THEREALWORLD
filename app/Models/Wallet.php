<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['user_id', 'balance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function deposit($amount, $description = null, $reference = null)
    {
        $this->balance += $amount;
        $this->save();

        return $this->transactions()->create([
            'type' => 'deposit',
            'amount' => $amount,
            'balance_after' => $this->balance,
            'description' => $description,
            'reference' => $reference,
        ]);
    }

    public function withdraw($amount, $description = null, $reference = null)
    {
        if ($this->balance < $amount) {
            throw new \Exception('Insufficient balance');
        }

        $this->balance -= $amount;
        $this->save();

        return $this->transactions()->create([
            'type' => 'withdrawal',
            'amount' => $amount,
            'balance_after' => $this->balance,
            'description' => $description,
            'reference' => $reference,
        ]);
    }

    public function getRecentTransactions($limit = 10)
    {
        return $this->transactions()->latest()->take($limit)->get();
    }

    public function applyDailyReturn(float $percentage, string $description = null)
    {
        $amount = round($this->balance * ($percentage / 100), 2);

        if ($amount === 0) {
            return null;
        }

        if ($amount > 0) {
            return $this->deposit($amount, $description, 'daily_return');
        }

        $loss = abs($amount);
        $withdrawAmount = min($this->balance, $loss);
        $this->balance -= $withdrawAmount;
        $this->save();

        return $this->transactions()->create([
            'type' => 'withdrawal',
            'amount' => $withdrawAmount,
            'balance_after' => $this->balance,
            'description' => $description,
            'reference' => 'daily_return',
        ]);
    }
}
