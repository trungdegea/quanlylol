<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bangxephang extends Model
{
    protected $table='bangxephangs';
    protected $primaryKey = 'MaBXH';
   
    public function giaidau()
    {
        return $this->belongsTo('App\giadau','MaGD');
    }
    

}
