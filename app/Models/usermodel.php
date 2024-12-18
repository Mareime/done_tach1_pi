<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usermodel extends Model
{
    //
    protected $table = 'user';
    protected $fillable = [
        'password',
        'email',
    ];
}
