<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use App\giaidau;
use App\doi;
use App\thanhvien;
class LichThiDau extends Controller
{
    public function getLichThiDau($MaGD)
    {
        $errors = new MessageBag();
        $giaidau= giaidau::find($MaGD);
        $doi=doi::where('MaGD',$MaGD)->get();// lay doi co trong giai dau co MaGD
        if($giaidau->SLdoi>$doi->count())
        {
            $errors->add('err', 'Chưa đủ số lượng đội để bắt đầu giải đấu.');
        }
        $dsdoi=[];
        $arrCap=[];
        $arrdoi=[];
        foreach($doi as $d){
            array_push($dsdoi,$d->MaDoi); 
            $arrdoi[$d->MaDoi]=$d->TenDoi;//Arraydoi cos key = MaDoi, Value=Tendoi
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
             foreach($arrCap as $r)
            {
                if($dem%4==0)
                {
                    $tgbd['day']++;
                    $dem=0;
                }
                $date_string = date('Y-m-d H:i:s', mktime($arrgio[$dem], 0, 0, $tgbd['month'], $tgbd['day'], $tgbd['year'])); 
                array_push($r, $date_string);
               
                $dem++;
            }
            

        }
       
        return view('admin.thidau.lichthidau', compact('giaidau', 'thanhvien', 'arrdoi','doi', 'arrCap'))->withErrors($errors);
    }
}
