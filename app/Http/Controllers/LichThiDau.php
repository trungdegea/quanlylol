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
        for($i=0; $i<count($doi); $i++)
        {
            for($j=$i+1; $j<count($doi); $j++)
            {
                echo"cap dau:\n";
                echo $doi[$i]->MaDoi,"+", $doi[$j]->MaDoi;
                array_push($arrCap, [$doi[$i]->MaDoi, $doi[$j]->MaDoi]);
            }
        }
        echo count($arrCap);
        foreach($arrCap as $c)
        {
            var_dump( $c);
        }
        
        exit();
        return view('admin.thidau.lichthidau', compact('giaidau', 'thanhvien', 'arrdoi','doi'))->withErrors($errors);
    }
}
