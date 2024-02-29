<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subscription_id',
        'value',
        'state',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d\\TH:i:sP',
        'updated_at' => 'datetime:Y-m-d\\TH:i:sP'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }
}
