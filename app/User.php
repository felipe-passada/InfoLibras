<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    public function video() { 
        return $this->belongsTo(Video::Class);
    }
    public function sugestion() { 
        return $this->belongsTo(Sugestion::Class);
    }
    public function information() { 
        return $this->belongsTo(information::Class);
    }
    public function qrcode() { 
        return $this->belongsTo(Qrcode::Class);
    }
}
