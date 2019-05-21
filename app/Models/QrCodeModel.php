<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QrCodeModel extends Model
{
    protected $table = 'qr_codes';

    protected $fillable = ['title', 'content', 'description', 'path', 'video', 'servidor_id'];
    public function users(){
        return $this->hasMany(User::Class);
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
