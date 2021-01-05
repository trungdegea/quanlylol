<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doi extends Model
{
    protected $table='dois';
    protected $primaryKey = 'MaDoi';
    public function thanhvien()
    {
        return $this->hasMany('App\thanhvien','MaDoi');
    }

    public function giaidau()
    {
        return $this->belongsTo('App\giaidau','MaGD');
    }
}
