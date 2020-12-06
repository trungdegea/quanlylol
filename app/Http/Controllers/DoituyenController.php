<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoituyenController extends Controller
{
    public function getthemdoi()
    {
        return view('admin.doi.themdoi');
    }
}
