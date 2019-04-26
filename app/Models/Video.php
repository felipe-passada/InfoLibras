<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    
    public function users(){
        return $this->hasMany(User::class);
    }
}
