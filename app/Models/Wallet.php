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
}
