<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\doi;
use App\giaidau;
class DoituyenController extends Controller
{
    public function getDsdoi($MaGD)
    {
        $errors = new MessageBag();
        $giaidau=giaidau::find($MaGD);
        $SLdoi=giaidau::find($MaGD)->SLdoi;
        $doi= doi::all()->where('MaGD',$MaGD);//Lay nhung doi tham gia giai dau
        
       
        $DemSoDoi = doi::where('MaGD', $MaGD)->count();
        // return view('admin.doi.dsdoi', compact('doi','giaidau'));
        if ($DemSoDoi == 0) {
            $errors->add('err', 'Chưa có đội tham gia giải đấu.');
            return view('admin.doi.dsdoi', compact('doi','giaidau'))->withErrors($errors);
        } 
        else 
        {
            if($DemSoDoi==$SLdoi)
            {
                return redirect()->route('ds-doi.get',[$MaGD])->with('success', "Đã đủ đội tham gia giải đấu, bây giờ bạn có thể xếp lịch thi đấu.");
            }
            else
            {
                return view('admin.doi.dsdoi', compact('doi','giaidau'));
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
            'tendoi'=>'required|min:10|max:100',
            'sltv'=>'required|integer|min:3|max:10', 
        ];
        $messages=[
            'tendoi.required'=>"Bạn chưa nhập tên đội.",
            'tendoi.min'=>"Tên đội cần dài hơn 10 ký tự",
            'tendoi.max'=>"Tên đội không quá 100 ký tự",
            'sltv.required'=>"Bạn chưa nhập số lượng thành viên tham gia.",
            'sltv.min'=>'Số lượng thành viên ít nhất là 3.',
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
        $doi->Diem=0;
        $doi->TranThang=0;
        $doi->TranThua=0;
        $doi->MaGD=$MaGD;
        $doi->img=$filenameToStore;
        $doi->save();
        return redirect()->route('them-doi.get',[$MaGD])->with('success', "Thêm đội thành công."); 
    }
    public function getchitietdoi($MaGD,$MaDoi)
    {
        $giaidau=giaidau::find($MaGD);
        $doi=doi::find($MaDoi);
        return view('admin.doi.chitiet', compact('giaidau', 'doi'));
    }
   
}
