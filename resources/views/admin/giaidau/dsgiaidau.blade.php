

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
            <ol class="breadcrumb ">
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

    <div>
    <div class="col-sm-6">
            <h1 id="h1">Danh sách giải đấu</h1>
          </div><!-- /.col -->
    </div>
    <div class="col-4 col-lg-2 float-right">
        
        <a href="{{route('them-giaidau.get')}}"><button type="submit" class="btn btn-primary btn-block ">Thêm giải</button></a>
    </div>


    <!-- Main content -->
    <div class="gap-md"></div>
    
    
    <section class="content">
     @if (count($dsgiaidau)>0)
     <div class="container">
        <?php $dem=0; ?>
        @foreach ($dsgiaidau as $giaidau)
            @if ($dem%3==0)
              <div class="row">
            @endif
            <div class="col-sm-12 col-md-5 col-lg-4 ">
                <div class="card bg-cl">
                  <div class="card-header" > {{-- In anh ho so cua giai dau --}}
                    <img src="{{asset('img/'.$giaidau->img)}}" height="100%" width="100%" alt="">
                  </div>
                  <div class="card-body">
                    <h2 class="gd-name">{{$giaidau->TenGD}}</h2>
                  </div>
                  <div class="card-footer">
                    {{-- nút chi tiết của một giải đấu, sau khi click chuyển đến trang chi tiết của giải đấu đó --}}
                    <a href="{{route("chitiet-giaidau.get",[$giaidau->MaGD])}}" class="btn btn-warning waves-light waves-effect" title="chi tiet">Chi tiết</i></a>
                  </div>
                
                </div>
            </div>
           
            <?php $dem++; ?>
            @if ($dem%3==0)
               </div>
             @endif
        @endforeach

       </table>
    
     
    </div>
     @endif 
    </section>
    
  </div>
  <!-- /.content-wrapper -->
  


@endsection
@section('styleds')
<link rel="stylesheet" href="{{URL::asset('css/stylegiaidau.css')}}"  type="text/css">
@endsection