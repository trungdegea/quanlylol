<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThanhvienController extends Controller
{
    public function getDsThanhVien($MaGD, $MaDoi)
    {
        return view('admin.thanhvien.dsthanhvien');
    }
}
