<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class studentModel extends Authenticatable
{
    use Notifiable;

    protected $table = 'students';
    public $timestamps = false;

    protected $fillable = [
        'username', 'password', 'name', 'class', 'age', 'gender', 'photo'
    ];

    protected $hidden = [
        'password',
    ];
}
