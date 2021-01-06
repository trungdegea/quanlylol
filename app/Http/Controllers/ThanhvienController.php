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
        $tendoi="";
        $giaidau= giaidau::find($MaGD);
        $doi=doi::where('MaGD',$MaGD)->get(['MaDoi','TenDoi','SLTV']);// lay doi co trong giai dau co MaGD
        $dsSL=[];
        $dsdoi=[];
        $arrdoi=[];
        foreach($doi as $d){
            $tv=thanhvien::where('MaDoi', $d->MaDoi)->get();
            array_push($dsdoi,$d->MaDoi); 
            $arrdoi[$d->MaDoi]=[$d->TenDoi,$tv->count()];//Arraydoi cos key = MaDoi, Value=Tendoi
        }
        
        $thanhvien=thanhvien::whereIn('MaDoi',$dsdoi )->orderBy('MaDoi','asc')->get();
        return view('admin.thanhvien.dsthanhvien', compact('giaidau', 'thanhvien', 'arrdoi','doi','dsdoi','tendoi'));
    }
    public function xoathanhvien($MaTV)
    {
        thanhvien::find($MaTV)->delete();
        
        return redirect()->back()->with('success', 'Xóa thành công 1 thành viên.');
    }
    public function postthemthanhvien(Request $request)
    {
        if(isset($_POST['themTV']))
        {
            $MaDoi=$request->doi;
            $errors = new MessageBag();
            $success = new MessageBag();
            $sltv=doi::find($MaDoi)->SLTV;// số lượng thành viên mặc định
            //số lượng thành viên hiện tại
            $arrTen=$request->tentv;
            foreach ($arrTen as $key => $ten) {
               if($ten!=NULL)
               {
                    $slCo=thanhvien::where('MaDoi',$MaDoi)->count();
                    if($slCo<$sltv)
                    {
                       
                        $KtTen=thanhvien::where('MaDoi',$MaDoi)->where('TenTV', 'LIKE',$ten);
                        
                        if($KtTen->count()>0)
                        {
                            $errors->add('err', 'Đặt lại tên. Tên thành viên '.$ten.' bị trùng.');
                        }
                        else{
                            $thanhvien=new thanhvien();
                            $thanhvien->TenTV=$ten;
                            $thanhvien->ViTri=$request->vitri[$key];
                            $thanhvien->MaDoi=$MaDoi;
                            $thanhvien->save();
                            $success->add('success','Thêm thành viên '.$ten.' thành công.');
                        } 
                    }
                    else{
                        $errors->add('err', 'Không thể thêm thành viên '.$ten.', đội đã đủ thành viên.');
                    }
                  
               }
            }
            
            
            
            return redirect()->back()->withErrors($errors);
           
          
        }
      
    }
    public function postLoDoi(Request $request, $MaGD)
    {
        if($request->locdoi=="#")
        {
            $giaidau= giaidau::find($MaGD);
            $doi=doi::where('MaGD',$MaGD)->get(['MaDoi','TenDoi']);// lay doi co trong giai dau co MaGD
            $tendoi="";
            $dsdoi=[];
            $arrdoi=[];
            foreach($doi as $d){
                $tv=thanhvien::where('MaDoi', $d->MaDoi)->get();
                array_push($dsdoi,$d->MaDoi); 
                $arrdoi[$d->MaDoi]=[$d->TenDoi,$tv->count()];//Arraydoi cos key = MaDoi, Value=Tendoi
            }
            $thanhvien=thanhvien::whereIn('MaDoi',$dsdoi )->orderBy('MaDoi','asc')->get();
            return view('admin.thanhvien.dsthanhvien', compact('giaidau', 'thanhvien', 'arrdoi','doi','tendoi'));
        }
        else
        {
            $giaidau= giaidau::find($MaGD);
            $doi=doi::where('MaGD',$MaGD)->get(['MaDoi','TenDoi']);// lay doi co trong giai dau co MaGD
            $dsdoi=[];
            $arr=doi::find($request->locdoi);
            $tendoi=$arr->TenDoi;
            $arrdoi[$arr->MaDoi]=$arr->TenDoi;
            $thanhvien=thanhvien::where('MaDoi',$request->locdoi )->get();
            return view('admin.thanhvien.dsthanhvien', compact('giaidau', 'thanhvien', 'arrdoi','doi','tendoi'));
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
