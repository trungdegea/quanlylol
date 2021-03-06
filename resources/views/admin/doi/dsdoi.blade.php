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
        <div class="col-0">
            <ol class="breadcrumb float-sm-left">
             <li class="breadcrumb-item"><a href="{{route('ds-giaidau.get')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active"><a href="{{route('ds-giaidau.get')}}">Giải đấu</a></li>
              <li class="breadcrumb-item active">Đội</li>
            </ol>
        </div><!-- /.col -->
        <div class="gap-md"></div>
          <div class="col-0 t-c">
            <h1 class="m-0 ">Giải đấu: {{$giaidau->TenGD}}</h1>
         
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
        <div class="col-4 col-lg-2 float-right" style=" text-align: right;"> 
            <a class="float-right" href="{{route('them-doi.get',[$giaidau->MaGD])}}"><button type="submit" class="btn btn-primary btn-block ">Thêm Đội</button></a>
         </div>
         
           <!-- Main content -->
    <div class="gap-md"></div>
    @endif
    <section class="content">
      @if ($doi->count()>0)
      <div class="container">
        
         <?php $dem=0; ?>
         @foreach ($doi as $d)
             @if ($dem%3==0)
            <div class="row">
             @endif
             <div class="col-sm-12 col-md-5 col-lg-4 ">
                <div class="card bg-cl">
                  <div class="card-header" > {{-- In anh ho so cua doi dau --}}
                  <img src="{{asset('img/'.$d->img)}}" height="100%" width="100%" alt=""><br>
                  </div>
                  <div class="card-body">
                    <h2 class="gd-name" >Tên Đội: {{$d->TenDoi}}</h2>
                  </div>
                  <div class="card-footer" >
                  <br>
                 {{-- nút chi tiết của một giải đấu, sau khi click chuyển đến trang chi tiết của giải đấu đó --}}
                 <a href="{{route("chitiet-doi.get",[$giaidau->MaGD,$d->MaDoi])}}" class="btn btn-warning waves-light waves-effect" title="chi tiet">Thông tin Đội</i></a>
                 @if (date_parse ($giaidau->TGBD)>date_parse(date('Y-m-d H:i:s'))&&$lichthidau==0)
                 <a href="{{route('delete-doi.get',[$d->MaDoi])}}" onclick="del({{$d->MaDoi}})" class="btn btn-danger waves-light waves-effect delete-confirm " title="Xóa"> <i class="fas fa-trash-alt" style="color:white"></i></a>
                 @endif
                  </div>
                
                </div>
            </div>
        <?php $dem++; ?>
            @if ($dem%3==0)
               </div>
             @endif
          
         @endforeach
 
        
     </div>
      @endif 
     </section>
       

    
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('siderbar')
<li class="nav-header" style="text-align: center;"><h5>HỒ SƠ GIẢI ĐẤU</h5></li>
<li class="nav-item " style="color"><hr style="width:200px; background-color:white; height:1.5; "></li>
<li class="nav-item pl-1">
  <a href="{{route('chitiet-giaidau.get',[$giaidau->MaGD])}}" class="nav-link ">
    <i class="nav-icon ion-android-home"></i>
    <p>
      Trang chủ
    </p>
  </a>
</li>
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
@section('styleds')
<link rel="stylesheet" href="{{asset('css/stylegiaidau.css')}}">
@endsection
@section('script')

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Bạn có muốn xóa?',
        text: 'Xóa toàn bộ thông tin của đội bao gồm các thành viên.',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>
@endsection