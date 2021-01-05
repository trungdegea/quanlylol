<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giaidau extends Model
{
    protected $table='giaidaus';
    protected $primaryKey = 'MaGD';
    public function doi()
    {
        return $this->hasMany('App\doi','MaGD');
    }

    public function user()
    {
        return $this->belongsTo('App\user','MaUser');
    }
    public function lichthidau()
    {
        return $this->hasMany('App\lichthidau','MaGD');
    }
    public function bangxephang()
    {
        return $this->hasMany('App\bangxephang','MaGD');
    }

}
