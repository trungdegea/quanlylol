<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use App\giaidau;
use App\doi;
use App\thanhvien;
class ThanhvienController extends Controller
{
    public function getDsThanhVien($MaGD)
    {   
       
        $giaidau= giaidau::find($MaGD);
        $doi=doi::where('MaGD',$MaGD)->get(['MaDoi','TenDoi']);// lay doi co trong giai dau co MaGD
        
        $dsdoi=[];
        $arrdoi=[];
        foreach($doi as $d){
            array_push($dsdoi,$d->MaDoi); 
            $arrdoi[$d->MaDoi]=$d->TenDoi;//Arraydoi cos key = MaDoi, Value=Tendoi
        }
        
        $thanhvien=thanhvien::whereIn('MaDoi',$dsdoi )->orderBy('MaDoi','asc')->get();
        
       
        return view('admin.thanhvien.dsthanhvien', compact('giaidau', 'thanhvien', 'arrdoi','doi'));
    }
    public function xoathanhvien($MaTV)
    {
        thanhvien::find($MaTV)->delete();
        return redirect()->back()->with('success', 'Xóa thành công 1 thành viên.');
    }
    public function postthemthanhvien(Request $request)
    {
       
        
            $errors = new MessageBag();
            var_dump($request->doi);
            $sltv=doi::where('MaDoi', $request->doi)->get(['SLTV'])->toArray();// số lượng thành viên mặc định
            $slCo=thanhvien::where('MaDoi',$request->doi)->count();//số lượng thành viên hiện tại
            $tentv=$request->tentv; // ten thành viên
            $KtTen=thanhvien::where('TenTV', 'LIKE',$tentv);
    
            if($slCo>=$sltv[0]['SLTV']) // kiem tra so luong thanh vien hien co voi so luong thanh vien quy dinh
            {
                $errors->add('err', 'Không thể thêm thành viên, đội đã đủ thành viên.');
            }
            if($KtTen->count()!=0)
            {
                $errors->add('err', 'Đặt lại tên thành viên bị trùng.');
            }
            if(count($errors)>0)
            {
                return redirect()->back()
                ->withErrors($errors)
                ->withInput();
            }
            else
            {
                $thanhvien=new thanhvien();
                $thanhvien->TenTV=$tentv;
                $thanhvien->ViTri=$request->vitri;
                $thanhvien->MaDoi=$request->doi;
                $thanhvien->save();
                return redirect()->back()->with('success', 'Thêm mới thành công một thành viên');
            }
    
        
      
    }
    public function postLoDoi(Request $request, $MaGD)
    {
        if($request->locdoi=="#")
        {
            $giaidau= giaidau::find($MaGD);
            $doi=doi::where('MaGD',$MaGD)->get(['MaDoi','TenDoi']);// lay doi co trong giai dau co MaGD
            
            $dsdoi=[];
            $arrdoi=[];
            foreach($doi as $d){
                array_push($dsdoi,$d->MaDoi); 
                $arrdoi[$d->MaDoi]=$d->TenDoi;//Arraydoi cos key = MaDoi, Value=Tendoi
            }
            $thanhvien=thanhvien::whereIn('MaDoi',$dsdoi )->orderBy('MaDoi','asc')->get();
            return view('admin.thanhvien.dsthanhvien', compact('giaidau', 'thanhvien', 'arrdoi','doi'));
        }
        else
        {
            $giaidau= giaidau::find($MaGD);
            $doi=doi::where('MaGD',$MaGD)->get(['MaDoi','TenDoi']);// lay doi co trong giai dau co MaGD
            $dsdoi=[];
            $arr=doi::find($request->locdoi);
            $arrdoi[$arr->MaDoi]=$arr->TenDoi;
            $thanhvien=thanhvien::where('MaDoi',$request->locdoi )->get();
            return view('admin.thanhvien.dsthanhvien', compact('giaidau', 'thanhvien', 'arrdoi','doi'));
        }
        
            
    }
    

    public function postsuadoi(Request $request,$MaGD)
    {
        $giaidau= giaidau::find($MaGD);
        $doi=doi::where('MaGD',$MaGD)->get(['MaDoi','TenDoi']);// lay doi co trong giai dau co MaGD
        
        $dsdoi=[];
        $arrdoi=[];
        foreach($doi as $d){
            array_push($dsdoi,$d->MaDoi); 
            $arrdoi[$d->MaDoi]=$d->TenDoi;//Arraydoi cos key = MaDoi, Value=Tendoi
        }
        $thanhvien=thanhvien::whereIn('MaDoi',$dsdoi )->orderBy('MaDoi','asc')->get();
        $SLTV=$thanhvien->count();
        for($i=0;$i<$SLTV;$i++)
        {
            $tentv="tentv";
            $vitri="vitri";
            $vitri.=$thanhvien[$i]->MaTV;
            $tentv.=$thanhvien[$i]->MaTV;
            thanhvien::where('MaTV',$thanhvien[$i]->MaTV )->update(['TenTV'=>$request->$tentv,'ViTri'=>$request->$vitri]);
        }
        return redirect()->route('ds-thanhvien.get',[$MaGD])->with('success','Update danh sách thành viên thành công!.');
        
    }
}
