<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\giaidau;
use Auth;
class GiaidauController extends Controller
{
    public function getDsGiaidau()
    {
        $dsgiaidau= giaidau::all(); 
    
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
            $img=$request->file('imageshs')->getClientOriginalName();;
        }
        else
        {   
            //lấy ảnh hồ sơ giải đấu mặc định
            $img="giaidau3.jpg";
        }
       
        $rules=[
            'tengiai'=>'required|min:10|max:100',
            'sldoi'=>'required',
            'slve'=>'required|min:0|max:1000',
            'tgbd'=>'required',
            'tgkt'=>'required',
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
        $giaidaus->img=$img;
        $giaidaus->save();
        return redirect()->route('them-giaidau.get')->with('success', "Thêm giải đấu thành công.");

       
        
    }
}
