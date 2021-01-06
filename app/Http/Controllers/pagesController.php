<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\giaidau;
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
       
        $rules=[
            'username'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:32',
            'repassword'=>'required|same:password'
            
        ];
        $messages=[
            'username.required'=>"Bạn chưa nhập tên giải đấu.",
            'email.required'=>"Bạn chưa nhập tên giải đấu.",
            
        ];

        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()->route('dangky.get')
                        ->withErrors($errors)
                        ->withInput();
            
        }
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
            return  redirect()->route('ds-giaidau.get');
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
    $time=time(); 
    // var_dump($time); exit();
    $Allgiaidau=DB::table('giaidaus')->get();//lay tat ca giai dau 
    $giaidauCurrent=[]; //mang luu giai dau dang dien ra
    $giaidauAlready=[];
    foreach ($Allgiaidau as $key => $gd) {
        $tgbd=strtotime($gd->TGBD);
        $tgkt=strtotime($gd->TGKT);
        if($time>$tgbd&&$time<$tgkt)
        {
            array_push($giaidauCurrent, $gd);
        }
        if($time<$tgbd)
        {
            array_push($giaidauAlready, $gd);
        }
    }
    foreach ($giaidauCurrent as $key => $gd) {
        var_dump($gd->TenGD);
    }
    // exit();
    return view('viewer.index', compact('giaidauCurrent','giaidauAlready'));
  }
  public function getLienhe()
  {
    return view('admin.about.about');
  }
 
}
