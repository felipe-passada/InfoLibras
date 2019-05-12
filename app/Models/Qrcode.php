<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qrcode extends Model
{
    protected $table = 'qrcodes';
    public function users(){
        return $this->hasMany(User::Class);
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
