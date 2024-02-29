<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
