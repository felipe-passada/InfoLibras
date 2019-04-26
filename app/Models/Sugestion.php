<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sugestion extends Model
{
    protected $table = 'sugestions';
    
    protected $guard = ['id', 'description', 'status'];

    public function User() {
        return $this->hasMany(User::Class);
    }

    public function information() {
        return $this->belongsTo(Information::Class);
    }
}
