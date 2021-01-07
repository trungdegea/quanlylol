<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\doi;
use App\giaidau;
use App\thanhvien;
use App\lichthidau;

use App\bangxephang;
class DoituyenController extends Controller
{
    public function getDsdoi($MaGD)
    {
        $errors = new MessageBag();
        $giaidau=giaidau::find($MaGD);
        $SLdoi=giaidau::find($MaGD)->SLdoi;
        $doi= doi::all()->where('MaGD',$MaGD);//Lay nhung doi tham gia giai dau
        $lichthidau=lichthidau::where('MaGD', $MaGD)->get()->count();
        
        $DemSoDoi = doi::where('MaGD', $MaGD)->count();//dem so doi trong giai dau
        
        if ($DemSoDoi == 0) {
            $errors->add('err', 'Chưa có đội tham gia giải đấu.');
            return view('admin.doi.dsdoi', compact('doi','giaidau','lichthidau'))->withErrors($errors);
        } 
        else 
        {
            if($DemSoDoi==$SLdoi)
            {
                return view('admin.doi.dsdoi', compact('doi','giaidau','lichthidau'))->with('success', "Đã đủ đội tham gia giải đấu, bây giờ bạn có thể xếp lịch thi đấu.");
            }
            else
            {
                return view('admin.doi.dsdoi', compact('doi','giaidau','lichthidau'));
            }
        }
           
          
    }
    public function getthemdoi($MaGD)
    {
        $errors = new MessageBag();
        $giaidau=giaidau::find($MaGD);
        $SLdoi=$giaidau->SLdoi;
        $doi= doi::where('MaGD', $MaGD);//Lay nhung doi tham gia giai dau
        $DemSoDoi = doi::where('MaGD', $MaGD)->count();
        
        if($DemSoDoi<$SLdoi)
        {   
            return view('admin.doi.themdoi',compact('doi','giaidau'))->with('success', "Hiện tại vẫn chưa đủ đội để bắt đầu giải đấu, bạn có thểm thêm đội tuyển!");
        }
        else
        {
            if($DemSoDoi==$SLdoi)
            {
                $errors->add('err', 'Đã đủ đội tham gia, không thể thêm đội. Bạn có thể chỉnh sửa đội ở dưới!.');
                return view('admin.doi.themdoi', compact('doi','giaidau'))->withErrors($errors);
            }
        }
    }
    public function postthemdoi(Request $request,$MaGD)
    {
       if(isset($_POST['themdoi']))
       {
            $giaidau=giaidau::find($MaGD);
            
            $SLdoi=$giaidau->SLdoi;
            $doi= doi::where('MaGD', $MaGD);//Lay nhung doi tham gia giai dau
            $DemSoDoi = doi::where('MaGD', $MaGD)->count();
            if($DemSoDoi==$SLdoi)
            {
                return redirect()->route('them-doi.get',[$MaGD])->with('err', "Đã đủ đội."); 
            }
           //kiểm tra ảnh hồ sơ đội có đc tải hay không
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
            //lấy ảnh hồ sơ doi mặc định
            $filenameToStore="anh_doi_tuyen.jpg";
        }   
       
        $rules=[
            'tendoi'=>'required|min:5|max:100',
            'sltv'=>'required|integer|min:5|max:10', 
        ];
        $messages=[
            'tendoi.required'=>"Bạn chưa nhập tên đội.",
            'tendoi.min'=>"Tên đội cần dài hơn 5 ký tự",
            'tendoi.max'=>"Tên đội không quá 100 ký tự",
            'sltv.required'=>"Bạn chưa nhập số lượng thành viên tham gia.",
            'sltv.min'=>'Số lượng thành viên ít nhất là 5.',
            'sltv.max'=>'Số lượng thành viên tối đa là 10.',
           
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        
        if ($errors->fails()) {
            return redirect()->route('them-doi.get',[$MaGD])
                        ->withErrors($errors)
                        ->withInput();
        }
        $doi= new doi();
        $doi->TenDoi=$request->tendoi;
        $doi->SLTV=$request->sltv;
       
        $doi->MaGD=$MaGD;
        $doi->img=$filenameToStore;
        $doi->save();
        return redirect()->route('them-doi.get',[$MaGD])->with('success', "Thêm đội thành công."); 
       }
       
    }
    public function getchitietdoi($MaGD,$MaDoi)
    {
        $errors = new MessageBag();
        $giaidau=giaidau::find($MaGD);
        $doi=doi::find($MaDoi);
        $thanhtich=bangxephang::where('MaDoi',$MaDoi)->get();
        
        
        $thanhvien=thanhvien::all()->where('MaDoi',$doi->MaDoi);
        if ($thanhvien->count() == 0) {
            $errors->add('err', 'Đội chưa có thành viên tham gia.');
            return view('admin.doi.chitiet', compact('doi','giaidau','thanhvien', 'thanhtich'))->withErrors($errors);
        } 
        
        return view('admin.doi.chitiet', compact('giaidau', 'doi','thanhvien','thanhtich'));
    }
    public function posthemthanhvien(Request $request,$MaGD,$MaDoi)
    {
        $errors = new MessageBag();
        $giaidau=giaidau::find($MaGD);
        $sltv=doi::find($MaDoi)->SLTV;
        $sltvCo=doi::find($MaDoi)->thanhvien()->count(); 
        if($sltv>$sltvCo)
        {
            $rules=[
                'tentv'=>'required|min:2|max:100',
                'vitri'=>'required', 
            ];
            $messages=[
                'tentv.required'=>"Bạn chưa nhập tên đội.",
                'tendoi.min'=>"Tên thành viên cần dài hơn 2 ký tự",
                'tendoi.max'=>"Tên thành viên không quá 100 ký tự",
                'vitri.required'=>"Bạn chưa nhập tên vị trí.",
                
               
            ];
            $errors = Validator::make($request->all(), $rules, $messages);
            if ($errors->fails()) {
                return redirect()->route('chitiet-doi.get',[$MaGD,$MaDoi])
                            ->withErrors($errors)
                            ->withInput();
            }
            else
            {
             
                $thanhvien=new thanhvien();
                $thanhvien->TenTV=$request->tentv;
                $thanhvien->ViTri=$request->vitri;
                $thanhvien->MaDoi=$MaDoi;
                $thanhvien->save();
                return redirect()->route('chitiet-doi.get',[$MaGD,$MaDoi])->with('success', "Thêm thành viên vào đội thành công."); 
            }
        }
        else{
            return redirect()->back()->with('error', 'Không thể thêm thành viên, đội đã đủ thành viên ');
        }
        
        
    }
    public function postsuaDSThanhVien(Request $request,$MaGD,$MaDoi)
    {
        $errors = new MessageBag();
        $giaidau=giaidau::find($MaGD);
        $doi=doi::find($MaDoi);
        $thanhvien=thanhvien::all()->where('MaDoi',$MaDoi);
       
       foreach($thanhvien as $key=>$TV)
        {
            $tentv="tentv";
            $vitri="vitri";
            $vitri.=$TV->MaTV;
            $tentv.=$TV->MaTV;
            thanhvien::where('MaTV',$thanhvien[$key]->MaTV )->update(['TenTV'=>$request->$tentv,'ViTri'=>$request->$vitri]);
        }
        return redirect()->route('chitiet-doi.get',[$MaGD,$MaDoi])->with('success', "Update thành công."); 
       
       
    }
    public function xoathanhviendoi($MaTV)
    {
        thanhvien::find($MaTV)->delete();
        return redirect()->back()->with('success', 'Xóa thành công 1 thành viên.');
    }
    public function xoaDoi($MaDoi)
    {   
        $MaGD=doi::find($MaDoi)->MaGD;
        giaidau::find($MaGD)->lichthidau()->delete();
        $thanhvien=doi::find($MaDoi)->thanhvien()->delete();
        doi::find($MaDoi)->delete();
        return redirect()->back()->with('success', 'Xóa thành công 1 đội.');
    }
    
   
}
