<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhVien extends Model
{
    protected $table='thanhviens';
    protected $primaryKey = 'MaTV';
   

    public function doi()
    {
        return $this->belongsTo('App\doi','MaDoi');
    }
}
