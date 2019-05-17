<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitation extends Model
{
    protected $table = 'solicitations';

    protected $guard = ['id', 'description'];
    
    public function sugestions() {
        return $this->hasMany(Sugestion::Class);
    }
    public function video() {
        return $this->belongsTo(Video::Class);
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
