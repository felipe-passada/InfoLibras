<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitation extends Model
{
    protected $table = 'solicitations';

    protected $guard = ['id', 'description'];

    public function sugestions()
    {
        return $this->hasMany(Sugestion::Class);
    }
    public function video()
    {
        return $this->belongsTo(Video::Class);
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
