<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class pagesController extends Controller
{
    //
   public function getDangky()
    {
        return view('admin.auth.dangky');
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
        return redirect()->route('dangnhap.get');
    }

    public function getDangnhap()
    {
        return view('admin.auth.dangnhap');
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
            return  redirect()->route('trangchu.get');
        }    
        else
        {
            return  redirect()->route('dangky.get');
            
        }
    }
    public function getLogout()
  {
    Auth::logout();
    return redirect()->route('dangnhap.get');
  }
  public function gettrangchu()
  {
    
    $dsgiaidau=DB::table('giaidaus')->get();

   
    return view('viewer.index', compact('dsgiaidau'));
  }
  public function getLienhe()
  {
    return view('admin.about.about');
  }
}
