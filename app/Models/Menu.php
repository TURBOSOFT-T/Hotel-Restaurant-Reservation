<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'libelle',
        'description',
        'prix',
        'image',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

