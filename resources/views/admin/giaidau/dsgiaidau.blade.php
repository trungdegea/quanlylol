

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
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
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
        
        <button type="submit" class="btn btn-primary btn-block ">Thêm</button>
      </div>
    <!-- Main content -->
   
    <section class="content">
        <?php
        $dem=0;
        ?>
      <div class="container-fluid">
          <?php
            $dem=0;
            ?>
        <table class=" col-10">
            @foreach ($dsgiaidau as $gd)
                @if ($dem%4==0)
                    <tr ></tr>
                @endif
                <td>
                <div class="giaidau" style="background-image: url('img\{{$gd->img}}')">{{$gd}}</div>
                <?php
                   

                    
                ?>
                <img src="#" height="200" width="100px" alt="">
                </td>
                <?php
                $dem++;
                
                ?>
            @endforeach
        </table>
      </div>
     
  </div>
  <!-- /.content-wrapper -->
  <link rel="stylesheet" href="{{asset('css/style-giaidau.css')}}">


@endsection