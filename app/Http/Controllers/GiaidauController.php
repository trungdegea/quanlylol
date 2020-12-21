<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\giaidau;
use Auth;
use App\doi;
use App\thanhvien;
use Illuminate\Support\Facades\Storage;
class GiaidauController extends Controller
{
    public function getDsGiaidau()
    {
        $user = Auth::user();
        
        $dsgiaidau= giaidau::where('MaUser', $user->id)->get(); 
    
        return view('admin.giaidau.dsgiaidau', compact('dsgiaidau'));
    }
    public function getthemGiaidau()
    {
        return view('admin.giaidau.themgiaidau');
    }
    public function postthemGiaidau(Request $request)
    {
        //kiểm tra ảnh hồ sơ giải đấu có đc tải hay không
        if($request->hasFile('imageshs'))
        {
            $filename=$request->file('imageshs')->getClientOriginalName();
            //get just filename 
            $filename = pathinfo($filename, PATHINFO_FILENAME);
            //get just ext
            $extension=$request->file('imageshs')->getClientOriginalExtension();
            //filename to store
            $filenameToStore=$filename.'_'.time().'.'.$extension;
            //upload image
            $path=$request->file('imageshs')->move( 'img',$filenameToStore);
        }
        else
        {   
            //lấy ảnh hồ sơ giải đấu mặc định
            $filenameToStore="giaidau3.jpg";
        }   
       
        $rules=[
            'tengiai'=>'required|min:5|max:100',
            'sldoi'=>'required|integer|min:1|max:20',
            'slve'=>'required|integer|min:0|max:1000',
            'tgbd'=>'required',
            'tgkt'=>'required',
            
        ];
        $messages=[
            'tengiai.required'=>"Bạn chưa nhập tên giải đấu.",
            'tengiai.min'=>"Bạn giải tối thiểu 5 ký tự.",
            'tengiai.max'=>"Bạn giải tối đa 100 ký tự.",
            'sldoi.required'=>"Bạn chưa nhập số lượng đội tham gia.",
            'sldoi.min'=>'Số đội tham gia ít nhất là 4.',
            'sldoi.max'=>'Số lượng đội tham gia tối đa là 32.',
            'slve.min'=>'Số lượng vé ít nhất là 0.',
            'slve.max'=>'Số lượng vé tối đa là 1000.',
            'tgbd.required'=>"Bạn chưa nhập thời gian bắt đầu giải đấu.",
            'tgkt.required'=>"Bạn chưa nhập thời gian kết thúc giải đấu.",
            'imageshs.image'=>"Chọn ảnh để upload.",
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        
        if ($errors->fails()) {
            return redirect()->route('them-giaidau.get')
                        ->withErrors($errors)
                        ->withInput();
        }
        $giaidaus= new giaidau();
        $giaidaus->TenGD=$request->tengiai;
        $giaidaus->SLdoi=$request->sldoi;
        $giaidaus->SLve=$request->slve;
        $giaidaus->TGBD=$request->tgbd;
        $giaidaus->TGKT=$request->tgkt;
        $giaidaus->MaUser=Auth::User()->id;
      
        $giaidaus->img=$filenameToStore;
        
        $giaidaus->save();
        return redirect()->route('them-giaidau.get')->with('success', "Thêm giải đấu thành công."); 
        
    }
    public function getchitietGiaidau($id)
    {
        $errors = new MessageBag();
        $DemSoGD = giaidau::where('MaGD', $id)->count();
        $giaidau = giaidau::find($id);
        //lay danh sach thanh vien cua tat ca cac doi
        $doi=doi::where('MaGD',$id)->get(['MaDoi','TenDoi']);// lay doi co trong giai dau co MaGD
        $dsdoi=[];
        $arrdoi=[];
        foreach($doi as $d){
            array_push($dsdoi,$d->MaDoi); 
            $arrdoi[$d->MaDoi]=$d->TenDoi;//Arraydoi cos key = MaDoi, Value=Tendoi
        }
        $thanhvien=thanhvien::whereIn('MaDoi',$dsdoi )->orderBy('MaDoi','asc')->get();
        return view('admin.giaidau.chitietgiaidau', compact('giaidau','thanhvien', 'arrdoi','doi'));
        
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
            return view('admin.giaidau.chitietgiaidau', compact('giaidau', 'thanhvien', 'arrdoi','doi'));
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
    public function getsuaGiaidau($id)
    {
        $DemSoGD = giaidau::where('MaGD', $id)->count();
        if ($DemSoGD == 0) {
            $errors->add('err', 'Giải đấu không không tồn tại.');
            return redirect()->route('ds-giaidau.get')->withErrors($errors);
          } else {
            $giaidau = giaidau::find($id);
            return view('admin.giaidau.suagiaidau', compact('giaidau'));
          }
    }
    public function postsuaGiaidau(Request $request, $id)
    {
        $DemSoGD = giaidau::where('MaGD', $id)->count();
        if ($DemSoGD == 0) {
            $errors->add('err', 'Giải đấu không không tồn tại.');
            return redirect()->route('ds-giaidau.get')->withErrors($errors);
        }
        else
        {
            if($request->hasFile('imageshs'))
            {
                $filename=$request->file('imageshs')->getClientOriginalName();
                //get just filename 
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                //get just ext
                $extension=$request->file('imageshs')->getClientOriginalExtension();
                //filename to store
                $filenameToStore=$filename.'_'.time().'.'.$extension;
                //upload image
                $path=$request->file('imageshs')->move( 'img',$filenameToStore);
            }
            else
            {   
                //lấy ảnh hồ sơ giải đấu mặc định
                $filenameToStore="giaidau3.jpg";
            }   
            $rules=[
                'tengiai'=>'required|min:10|max:100',
                'sldoi'=>'required',
                'slve'=>'required|min:0|max:1000',
                
                
            ];
            $messages=[
                'tengiai.required'=>"Bạn chưa nhập tên giải đấu.",
                'sldoi.required'=>"Bạn chưa nhập số lượng đội tham gia.",
                // 'sldoi.min'=>'Số đội tham gia ít nhất là 4.',
                // 'sldoi.max'=>'Số lượng đội tham gia tối đa là 32.',
                'slve.min'=>'Số lượng vé ít nhất là 0.',
                'slve.max'=>'Số lượng vé tối đa là 1000.',
                'tgbd.required'=>"Bạn chưa nhập thời gian bắt đầu giải đấu.",
                'tgkt.required'=>"Bạn chưa nhập thời gian kết thúc giải đấu.",
                'imageshs.image'=>"Chọn ảnh để upload.",
            ];
            $errors = Validator::make($request->all(), $rules, $messages);
            
            if ($errors->fails()) {
                return redirect()->route('sua-giaidau.get',[$id])
                            ->withErrors($errors)
                            ->withInput();
            }
            $giaidaus=  giaidau::find($id);
            $giaidaus->TenGD=$request->tengiai;
            $giaidaus->SLdoi=$request->sldoi;
            $giaidaus->SLve=$request->slve;
            $giaidaus->TGBD=$request->tgbd;
            $giaidaus->TGKT=$request->tgkt;
             $giaidaus->img=$filenameToStore;
          
            $giaidaus->save();
            return redirect()->route('sua-giaidau.get',[$id])->with('success', "Sửa giải đấu thành công."); 
        }

    }
}
