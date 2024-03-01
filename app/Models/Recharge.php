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

    /**
     * Método para obtener el usuario asociado a la recarga
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Método para obtener la suscripción asociada a la recarga
     */
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }
}
