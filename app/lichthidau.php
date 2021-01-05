<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lichthidau extends Model
{
    protected $table='lichthidaus';
    protected $primaryKey = 'MaLTD';
    public function giaidau()
    {
        return $this->belongsTo('App\giaidau','MaGD');
    }
}
