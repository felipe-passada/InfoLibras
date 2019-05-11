<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
