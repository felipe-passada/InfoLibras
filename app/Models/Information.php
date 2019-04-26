<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';
    
    public function sugestions() {
        return $this->hasMany(Sugestion::Class);
    }
    public function video() {
        return $this->belongsTo(Video::Class);
    }
}
