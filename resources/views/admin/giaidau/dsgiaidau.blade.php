

@extends('admin.layouts.index')

@section('title')
    <title>Danh sách giải đấu</title>
@endsection

@section('content')
        <!-- Content Wrapper. Contains page content -->
    
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Danh sách giải đấu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('trangchu.get')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">giải đấu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
    <div class="col-2" style=" text-align: right;">
        
        <a href="{{route('them-giaidau.get')}}"><button type="submit" class="btn btn-primary btn-block ">Thêm</button></a>
      </div>
    <!-- Main content -->
      
    <section class="content">
     @if (count($dsgiaidau)>0)
     <div class="container">
       <table class="DS-giaidau">
        <?php $dem=0; ?>
        @foreach ($dsgiaidau as $giaidau)
            @if ($dem%3==0)
              <tr></tr>
            @endif
            <td>
                {{-- In anh ho so cua giai dau --}}
                <img src="{{asset('img/'.$giaidau->img)}}" height="200" width="200px" alt=""><br>
                {{-- in thông tin của cả giải đấu 
                    in tên giải đấu {{$giaidau->TenGD}}

                  --}}
                {{$giaidau}}
                <br>
                {{-- nút chi tiết của một giải đấu, sau khi click chuyển đến trang chi tiết của giải đấu đó --}}
                <a href="{{route("chitiet-giaidau.get",[$giaidau->MaGD])}}" class="btn btn-warning waves-light waves-effect" title="chi tiet">Chi tiết</i></a>
            </td>
            <?php $dem++; ?>
        @endforeach

       </table>
    
     
    </div>
     @endif 
   
      
  </div>
  <!-- /.content-wrapper -->
  <link rel="stylesheet" href="{{asset('css/style-giaidau.css')}}">


@endsection