<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Events\UpdatePasswordEvent;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $observables = ['updatePassword',];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'full_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'created_at' => 'datetime:Y-m-d\\TH:i:sP',
        'updated_at' => 'datetime:Y-m-d\\TH:i:sP'
    ];


    /**
     * Método para obtener las recargas asociadas al usuario
     */
    public function recharges(): HasMany
    {
        return $this->hasMany(Recharge::class);
    }

    /**
     * Método para actualizar contraseña de un usuario
     * @param string $password
     */
    public function updatePassword(string $password)
    {
        $this->fireModelEvent('updatePassword');
        return $this->fill(compact('password'))->save([]);
    }
}
