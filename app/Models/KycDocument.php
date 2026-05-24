<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KycDocument extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'first_name',
        'last_name',
        'date_of_birth',
        'document_type',
        'document_front_path',
        'document_back_path',
        'rejection_reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
