<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use App\User;
use App\giaidau;
use App\lichthidau;
use App\bangxephang;
use App\doi;
use App\thanhvien;
use App\thongtinve;
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
    return redirect()->route('trangchu.get');
  }
  public function gettrangchu()
  {
   
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time=time(); 
    //  var_dump($time); exit();
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
    // foreach ($giaidauAlready as $key => $gd) {
    //     var_dump($gd->TGBD);
    // }
    // exit();
    return view('viewer.index', compact('giaidauCurrent','giaidauAlready'));
  }
  public function getchitietGD($MaGD)
  {
     
    $errors = new MessageBag();
    $DemSoGD = giaidau::where('MaGD', $MaGD)->count();
    $giaidau = giaidau::find($MaGD);
    $lichthidau=lichthidau::where('MaGD', $MaGD)->orderBy('ThoiGian', 'asc')->get();
    $doi=doi::where('MaGD',$MaGD)->get();// lay doi co trong giai dau co MaGD
    $dsdoi=[];
    $arrSl=[];
    $tenDoi=[];
    foreach($doi as $d){
        array_push($dsdoi,$d->MaDoi); 
        $sltv=thanhvien::where('MaDoi',$d->MaDoi)->count();
        $arrSl[$d->MaDoi]=$sltv;//Arraydoi cos key = MaDoi, Value=Tendoi
        $tenDoi[$d->MaDoi]=$d->TenDoi;//Arraydoi cos key = MaDoi, Value=Tendoi
    }
    
    $bxh=bangxephang::where('MaGD',$MaGD)->orderBy('Diem', 'desc')->orderBy('HieuSo', 'desc')->get();
    return view('viewer.chitietGD', compact('giaidau', 'arrSl','doi','bxh','tenDoi','lichthidau'));
     
  }
  public function postDatVe($MaGD, Request $request)
  {
      if($request->sove===null||$request->tenkhach===null||$request->sdt===null)
      {
        echo "<script>
        alert('Vui lòng nhập đầy đủ thông tin!');
        window.location.href='../chitiet/".$MaGD."';
        </script>";  
      }
      else
      {
          
          $giaidau=giaidau::find($MaGD);
          if($giaidau->SLve<$request->sove)
          {
            echo "<script>
            alert('Giải đấu ".$giaidau->TenGD." chỉ còn ".$giaidau->SLve." vé!');
            window.location.href='../chitiet/".$MaGD."';
            </script>";  
          }
          else
          {
            $giaidau->SLve=$giaidau->SLve-$request->sove;
            $thongtin=new thongtinve();
            $thongtin->TenKhach=$request->tenkhach;
            $thongtin->SDT=$request->sdt;
            $thongtin->SoVe=$request->sove;
            $thongtin->TongTien=50000*$request->sove;
            $thongtin->MaGD=$MaGD;
            $giaidau->save();
            $thongtin->save();  
            echo "<script>
            alert('Bạn đã đặt vé thành công!');
            window.location.href='../chitiet/".$MaGD."';
            </script>";
     
          }
                        
      }
  }
  public function getLienhe()
  {
    return view('admin.about.about');
  }
 
}
