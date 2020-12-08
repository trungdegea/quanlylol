@extends('admin.layouts.index')

@section('title')
    <title>Danh sách đội tuyển giải đấu {{$giaidau->TenGD}} </title>
@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$giaidau->TenGD}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('trangchu.get')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active"><a href="{{route('ds-giaidau.get')}}">Giải đấu</a></li>
              <li class="breadcrumb-item active">Đội</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    @if (count($errors) > 0 || session('error'))
    <div class="alert alert-danger" role="alert">
      <strong>Cảnh báo!</strong><br>
      @foreach($errors->all() as $err)
      {{$err}}<br />
      @endforeach
      {{session('error')}}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
      <strong>Thành công!</strong>
      <button type="button" class="close" data-dismiss="alert">×</button>
      <br />
      {!! session('success')!!}
    </div>
    @endif
    @if ($doi->count()<$giaidau->SLdoi)
        <div class="col-2" style=" text-align: right;"> 
            <a href="{{route('them-doi.get',[$giaidau->MaGD])}}"><button type="submit" class="btn btn-primary btn-block ">Thêm</button></a>
         </div>
         
           <!-- Main content -->
  
    @endif
    <section class="content">
      @if ($doi->count()>0)
      <div class="container">
        <table >
         <?php $dem=0; ?>
         @foreach ($doi as $d)
             @if ($dem%3==0)
               <tr></tr>
             @endif
             <td>
                 {{-- In anh ho so cua giai dau --}}
                 <img src="{{asset('img/'.$d->img)}}" height="200" width="200px" alt=""><br>
                 {{-- in thông tin của cả giải đấu 
                     in tên giải đấu {{$giaidau->TenGD}}
 
                   --}}
                 {{$d}}
                 <br>
                 {{-- nút chi tiết của một giải đấu, sau khi click chuyển đến trang chi tiết của giải đấu đó --}}
                 <a href="{{route("chitiet-doi.get",[$giaidau->MaGD,$d->MaDoi])}}" class="btn btn-warning waves-light waves-effect" title="chi tiet">Chi tiết</i></a>
             </td>
             <?php $dem++; ?>
         @endforeach
 
        </table>
     </div>
      @endif 
     </section>
       

    
  </div>
  <!-- /.content-wrapper -->

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
      <a href="#" class="nav-link">
        <i class="ion-android-list nav-icon"></i>
        <p>Danh sách</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('them-doi.get',[$giaidau->MaGD])}}" class="nav-link">
        <i class="far ion-android-add nav-icon"></i>
        <p>Thêm đội</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item pl-1">
  <a href="#" class="nav-link ">
    <i class="nav-icon ion-android-person"></i>
    <p>
      Tuyển thủ
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview pl-3">
    <li class="nav-item ml-1">
      <a href="pages/examples/invoice.html" class="nav-link">
        <i class="ion-android-list nav-icon "></i>
        <p>Danh sách</p>
      </a>
    </li>
    <li class="nav-item ">
      <a href="#" class="nav-link">
        <i class="far ion-android-add nav-icon  "></i>
        <p>Thêm thành viên</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon far fa-calendar-alt"></i>
    <p>
      Lịch thi đấu - kết quả
      <span class="badge badge-info right">2</span>
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>
      Điều lệ giải
    </p>
  </a>
</li>


@endsection