<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
<<<<<<< HEAD
}
=======

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

>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
