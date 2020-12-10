<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrangchuController extends Controller
{
    public function getTrangchu()
    {
        $user = Auth::user();
        return view('admin.trangchu.home', compact('user'));
    }
}
