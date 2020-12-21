
@extends('admin.layouts.index')

@section('title')
    <title>Lịch thi đấu {{$giaidau->TenGD}} </title>
@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Giải đấu: {{$giaidau->TenGD}}</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('trangchu.get')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Lịch thi đấu</li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
   

    <section class="content">
       @if (count($errors) > 0 || session('error'))
        <div class="alert alert-warning" role="alert">
            <strong>Cảnh báo!</strong><br>
            @foreach($errors->all() as $err)
            {{$err}}<br />
            @endforeach
            {{session('error')}}
            </div>
                @if (session('success'))
                <div class="alert alert-success">
                    <strong>Thành công!</strong>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <br />
                    {!! session('success')!!}
                </div>
                @endif
            <div class="row">
                @foreach($errors->all() as $err)
                    @if ($err=='Chưa đủ số lượng đội để bắt đầu giải đấu.')
                        <div class="col-md-2">
                            <a href="{{route('them-doi.get',[$giaidau->MaGD])}}"><button type="submit" class="btn btn-primary btn-block" name="themdoi">Thêm đội mới</button></a>
                        </div>
                    @endif
                @endforeach
                <div class="col-md-2">
                    <a href="{{route('ds-thanhvien.get',[$giaidau->MaGD])}}"><button type="submit" class="btn btn-primary btn-block" name="themdoi">Thêm thành viên mới</button></a>
                </div>
            </div>
    
       @else
            <h3>Lịch thi đấu</h3>
            
       @endif
       
       
       
       
        
     </section>
       

    
  </div>
  <!-- /.content-wrapper -->

@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Bạn có muốn xóa?',
        text: 'Xóa tuyển thủ khỏi đội',
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