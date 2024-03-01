<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d\\TH:i:sP',
        'updated_at' => 'datetime:Y-m-d\\TH:i:sP'
    ];

    /**
     * Método para obtener las recargas asociadas la suscripción
     */
    public function recharges(): HasMany
    {
        return $this->hasMany(Recharge::class);
    }
}
