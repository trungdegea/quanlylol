@extends('admin.layouts.index')

@section('title')
    <title>Chi tiết giải đấu</title>
@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('trangchu.get')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active"><a href="{{route('ds-giaidau.get')}}">Giải đấu</a></li>
              <li class="breadcrumb-item active">Chi tiết</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="card">
          <div class="col-md-6">
            <img src="{{asset('img/'.$giaidau->img)}}" height="400" width="600" alt=""><br>
          </div>
         </div>
         <div class="card">
           
         </div>
          <div class="col-md-6">
            <h3 class="m-0 pb-5">Giải đấu: {{$giaidau->TenGD}}</h3>
            <b><p>Thông tin giải đấu:</p></b>
            <p>Số lượng đội tham gia: {{$giaidau->SLdoi}} đội.</p>
            <p>Thời gian bắt đầu: {{$giaidau->TGBD}}</p>
            <p>Thời gian kết thúc:{{$giaidau->TGKT}} </p>
            <div class="row">
              <div class="col-md-3"> Giá vé: <label for="" style="background-color: rgb(224, 44, 44); color:white"> 50.000 vnd</label></div>
              <div class="col-md-3"> Số vé còn lại: <label for="" style="background-color: rgb(83, 241, 123); color:white"> {{$giaidau->SLve}}</label></div>
            </div>
            <?php
                $date=new DateTime('NOW');
                echo $date->format('c');
            ?>
            
            <a href="{{route("sua-giaidau.get",[$giaidau->MaGD])}}" class="btn btn-warning waves-light waves-effect" title="Sửa"><i class="fas fa-pencil-alt"></i></a>
          </div>
          
        </div>
        
       
    @if ($doi->count()<$giaidau->SLdoi)
        <div class="col-2" style=" text-align: right;"> 
            <a href="{{route('them-doi.get',[$giaidau->MaGD])}}"><button type="submit" class="btn btn-primary btn-block ">Thêm</button></a>
         </div>
    @endif
        
        <div class="row">
          
          <div class="col-sm-12">
           
            <div class="card">
       
              
              <div class="card-body">
                <div class="card-box table-responsive dvData">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên đội</th>
                        <th>Số lượng</th>
                        <th>Chi tiết</th>
                        
                      </tr>
                    </thead>
        
                    <tbody>
                      @foreach($doi as $i=>$d)
                      <tr>
                        <td>
                          {{$i+1}}
                        </td>
                        <td>
                          {{$d->TenDoi}}
                        
                        </td>
                        <td>
                         {{$arrSl[$d->MaDoi]}}
                         
                        </td>
                        <td>
                          <a href="{{route("chitiet-doi.get",[$giaidau->MaGD,$d->MaDoi])}}" class="btn btn-warning waves-light waves-effect" title="chi tiet"><i class="ion-eye"></i></i></a>
                        </td>
                       
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                
                <div class="col-md-2 float-right">
                  <a href="{{route('ds-thanhvien.get',[$giaidau->MaGD])}}"> <button type="submit" class="btn btn-primary btn-block " name="update" >Sửa danh sách</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
 

@endsection

@section('siderbar')
<li class="nav-header">HỒ SƠ GIẢI ĐẤU</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-book "></i>
    <p>
      Đội tuyển
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview pl-3">
    <li class="nav-item ml-1">
      <a href="{{route("ds-doi.get",[$giaidau->MaGD])}}" class="nav-link">
        <i class="ion-android-list nav-icon"></i>
        <p>Danh sách</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route("them-doi.get",[$giaidau->MaGD])}}" class="nav-link">
        <i class="far ion-android-add nav-icon"></i>
        <p>Thêm đội</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item pl-1">
  <a href="{{route('ds-thanhvien.get',[$giaidau->MaGD])}}" class="nav-link ">
    <i class="nav-icon ion-android-person"></i>
    <p>
      Tuyển thủ
    
    </p>
  </a>

</li>
<li class="nav-item">
  <a href="{{route('lichthidau.get',[$giaidau->MaGD])}}" class="nav-link">
    <i class="nav-icon far fa-calendar-alt"></i>
    <p>
      Lịch thi đấu - kết quả
      <span class="badge badge-info right">2</span>
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="pages/gallery.html" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>
      Điều lệ giải
    </p>
  </a>
</li>


@endsection