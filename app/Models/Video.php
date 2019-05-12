<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    protected $table = 'videos';
    
    public function users(){
        return $this->hasMany(User::class);
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
