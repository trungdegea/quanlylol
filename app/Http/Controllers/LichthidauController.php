<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use App\giaidau;
use App\doi;
use App\lichthidau;
use App\thanhvien;
use App\bangxephang;
class LichthidauController extends Controller
{
    public function getLichThiDau($MaGD)
    {
        $lichthidau=lichthidau::where('MaGD', $MaGD)->orderBy('ThoiGian', 'asc')->get();
        $errors = new MessageBag();
        $giaidau= giaidau::find($MaGD);
        
        if($lichthidau->count()>0)
        {
           
            $doi=doi::where('MaGD',$MaGD)->get();// lay doi co trong giai dau co MaGD
            $dsdoi=[];
            $arrdoi=[];
            foreach($doi as $d){
                array_push($dsdoi,$d->MaDoi); 
                $arrdoi[$d->MaDoi]=$d->TenDoi;//Arrdoi cos key = MaDoi, Value=Tendoi
            }
         
            return view('admin.thidau.lichthidau', compact('giaidau','arrdoi', 'lichthidau'))->withErrors($errors);
        }
        else
        {
            
            $doi=doi::where('MaGD',$MaGD)->get();// lay doi co trong giai dau co MaGD
            $dsdoi=[];
            $arrCap=[];
            $arrdoi=[];
            foreach($doi as $d){
                array_push($dsdoi,$d->MaDoi); 
                $arrdoi[$d->MaDoi]=$d->TenDoi;//Arrdoi cos key = MaDoi, Value=Tendoi
            }
            if($giaidau->SLdoi>$doi->count())
            {
                $errors->add('err', 'Chưa đủ số lượng đội để bắt đầu giải đấu.');
            }
           
            foreach($dsdoi as $d)
            {
                $thanhvien=thanhvien::where('MaDoi', $d)->get();
                $doi1=doi::find($d);
                $sltv=$doi1->SLTV;
                $sltvCo=$thanhvien->count();
                $sltthieu=$sltv-$sltvCo;
                if($sltv>$sltvCo)
                {
                    $errors->add('err', 'Đội '.$doi1->TenDoi.' còn thiếu '.$sltthieu.' thành viên mới có thể tham gia.');
                }
            }
            $thanhvien=thanhvien::whereIn('MaDoi',$dsdoi )->orderBy('MaDoi','asc')->get();
            if(count($errors)==0)
            {
                for($i=0; $i<count($doi); $i++)
                {
                    for($j=$i+1; $j<count($doi); $j++)
                    {
                        
                        array_push($arrCap, [$doi[$i]->MaDoi, $doi[$j]->MaDoi]);
                    }
                }
                $keys=array_keys($arrCap);
                shuffle($keys);
                $random=[];
                foreach ($keys as $key) {
                    # code...
                    $random[$key]=$arrCap[$key];
                }
                $arrCap=$random;
               
                $tgbd=date_parse($giaidau->TGBD);
                $tgkt=date_parse($giaidau->TGKT);
                $soNgay=$tgkt['day']-$tgbd['day'];
                if($soNgay*4<count($arrCap))
                {
                    $errors->add('err', 'Đặt lại ngày bắt đầu và kết thúc giải đấu để đảm bảo số lượng trận trong ngày nhỏ hơn 4.');
                  
                }
                $dem=0;
                $arrgio=['8','10','14','16'];
                 foreach($arrCap as $i=>$r)
                {
                    if($dem%4==0)
                    {
                        $tgbd['day']++;
                        $dem=0;
                    }
                    $date_string = date('Y-m-d H:i:s', mktime($arrgio[$dem], 0, 0, $tgbd['month'], $tgbd['day'], $tgbd['year'])); 
                    array_push($arrCap[$i], $date_string);
                    $dem++; 
                }
    
            }
            session_start();
            $_SESSION['arrCap']=$arrCap;
            return view('admin.thidau.lichthidau', compact('giaidau', 'thanhvien', 'arrdoi','doi', 'arrCap','lichthidau'))->withErrors($errors);
        }
        

    
    }
    public function postXepLichThiDau($MaGD, Request $request)
    {
        $lichthidau= lichthidau::where('MaGD',$MaGD)->get();
        if($request->xeplai)
        {
           return redirect()->route('lichthidau.get',[$MaGD]);
        }
        else{
          
                session_start();
                $arrCap=$_SESSION['arrCap'];
                foreach($arrCap as $cap)
                {
                    $lichthidau=new lichthidau();
                    $lichthidau->MaDoi1=$cap[0];
                    $lichthidau->MaDoi2=$cap[1];
                    $lichthidau->ThoiGian=$cap[2];
                    $lichthidau->MaGD=$MaGD;
                    $lichthidau->save();
                }  
                $doi=doi::where('MaGD', $MaGD)->get();
                foreach ($doi as $key => $d) {
                    $bxh=new bangxephang();
                    $bxh->MaDoi=$d->MaDoi;
                    $bxh->Diem=0;
                    $bxh->HieuSo=0;
                    $bxh->MaGD=$MaGD;
                    $bxh->save();
                }
                return redirect()->back()->with('success', 'Tạo lịch thi đấu thành công');
       
            
        }
       
    }
    public function postCapNhatKetQua($MaGD, Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = date('Y-m-d H:i:s'); 
        $giaidau=giaidau::find($MaGD); 
        $tgbd=$giaidau->TGBD;
       
        if($now>$tgbd)
        {
          
            $lichthidau=lichthidau::where('MaGD', $MaGD)->get();
            foreach($lichthidau as $lich)
            {
                $Ma=$lich->MaLTD;
                $lich->KQ1=$request->$Ma[0];
                $lich->KQ2=$request->$Ma[1];
                $lich->save();
            } 
            app()->call('App\Http\Controllers\LichThiDauController@TinhDiem',[$MaGD]);
            return redirect()->back();   
        }
        else{
            return redirect()->back()->with('alert', 'Không thể cập nhật giải khi giải đấu chưa bắt đầu!');
        }
        }
        
       
       
    public function TinhDiem($MaGD)
    {
        $lichthidau=lichthidau::where('MaGD', $MaGD)->get();
        if($lichthidau->count()>0)
        {
            $bxhDoi=bangxephang::where('MaGD',$MaGD)->get();
            foreach($bxhDoi as $d)
            {   
                
                $lich1=lichthidau::where('MaDoi1', $d->MaDoi)->get();
                $lich2=lichthidau::where('MaDoi2', $d->MaDoi)->get();
                $diem=0;
                $hieuSo=0;
                $tranthang=0;
                $tranthua=0;
                foreach ($lich1 as $key => $l) {
                   if($l->KQ1!==NULL&&$l->KQ2!==NULL)
                   {
                            if($l->KQ1>$l->KQ2)
                            {
                                $diem++;
                                $hieuSo+=$l->KQ1-$l->KQ2;
                                $tranthang++;
                            }
                            else
                            {
                                $hieuSo+=$l->KQ1-$l->KQ2;
                                $tranthua++;
                            }
                        
                    }
                }
                foreach ($lich2 as $key => $l) {
                    if($l->KQ1!==NULL&&$l->KQ2!==NULL)
                    {
                             if($l->KQ1<$l->KQ2)
                             {
                                 $diem++;
                                 $hieuSo+=$l->KQ2-$l->KQ1;
                                 $tranthang++;
                             }
                             else
                             {
                                 $hieuSo+=$l->KQ2-$l->KQ1;
                                 $tranthua++;
                             }
                         
                     }
                 }
                 $d->Diem=$diem;
                 $d->HieuSo=$hieuSo;
                 $d->TranThang=$tranthang;
                 $d->TranThua=$tranthua;
                 $d->save();
               
              
                
            }
           
            
        }
       
    }
    
    
}
