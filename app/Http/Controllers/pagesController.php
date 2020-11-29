<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Validator;

class pagesController extends Controller
{
    //
   public function getDangky()
    {
        return view('pages.dangky');
    }

    public function postDangky(Request $request)
    {
        $this->validate($request,[
            'username'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:32',
            'repassword'=>'required|same:password'
            

        ],[
            'username.required'=>'ban chua nhap ten nguoi dung'

        ]);
        User::create(
            [
            'Username'=>$request->username,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'quyen'=>0
            ]
        );
        return redirect('/dangnhap');
    }

    public function getDangnhap()
    {
        return view('pages.dangnhap');
    }
     public function postDangnhap(Request $request)

    {
        
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:3|max:32'
        ],[
            'email.required'=>"Ban chua nhap Email",
            'password.required'=>"Ban chua nhap PassWord",
            'password.min'=>'Password khong duoc nho hon 3 ky tu',
            'password.max'=>'Password khong duoc lon hon 32 ky tu'
        ]);
            $array=['email' => $request->get('email'), 'password' => $request->get('password'), 'quyen'=>1];
        ;

        if(Auth::attempt($array)){
            return  redirect('/home');
           
        }    
        else
        {
            return  redirect('/dangnhap');
            
        }
    }
}