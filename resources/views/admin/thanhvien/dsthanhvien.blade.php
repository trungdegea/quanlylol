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
            <h1 class="m-0">{{$giaidau->TenGD}}</h1>
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
        <img src="{{asset('img/'.$giaidau->img)}}" height="200" width="200px" alt=""><br>
        {{$giaidau}}
        {{-- nút chi tiết của một giải đấu, sau khi click chuyển đến trang chi tiết của giải đấu đó --}}
        <a href="{{route("sua-giaidau.get",[$giaidau->MaGD])}}" class="btn btn-warning waves-light waves-effect" title="Sửa"><i class="fas fa-pencil-alt"></i></a>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
  <a href="#" class="nav-link ">
    <i class="nav-icon ion-android-person"></i>
    <p>
      Tuyển thủ
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview pl-3">
    <li class="nav-item ml-1">
      <a href="#" class="nav-link">
        <i class="ion-android-list nav-icon "></i>
        <p>Danh sách</p>
      </a>
    </li>
    <li class="nav-item ">
      <a href="pages/examples/profile.html" class="nav-link">
        <i class="far ion-android-add nav-icon  "></i>
        <p>Thêm thành viên</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a href="pages/calendar.html" class="nav-link">
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