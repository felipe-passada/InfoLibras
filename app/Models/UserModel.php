<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QrCodeModel extends Model
{
    protected $table = 'user';

    protected $fillable = 
    [
        'name', 
        'email', 
        'user_type', 
        'password'
    ];

    
}
