<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    protected $table = 'qrcodes';
    public function users(){
        return $this->hasMany(User::Class);
    }
}
