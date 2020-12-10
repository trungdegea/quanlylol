

@extends('admin.layouts.index')

@section('title')
    <title>Thêm giải đấu</title>
@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm giải đấu mới</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('trangchu.get')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active"><a href="{{route('ds-giaidau.get')}}">Giải đấu</a></li>
              <li class="breadcrumb-item active">Thêm</li>
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
    <section class="content pl-5 pr-5">
      <table class="table table-hover">
      <form action="{{route('them-giaidau.get')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <tbody>
          <tr>
      
            <td>
              
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Tên Giải Đấu:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="tengiai" placeholder="Tên giải đấu">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Số Lượng Đội:</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="sldoi" placeholder="số lượng đội tham gia">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Số Lượng Vé:</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="slve" placeholder="số lượng vé">
                  </div>
                </div>
                
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Thời Gian Bắt Đầu:</label>
                    <div class="col-sm-4">
                      <input type="datetime-local" class="form-control" name="tgbd" placeholder="Thời gian bắt đầu">
                    </div>

                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Thời Gian Kết thúc:</label>
                  <div class="col-sm-4">
                    <input type="datetime-local" class="form-control" name="tgkt" placeholder="Thời gian kết thúc">
                  </div>

                </div>
              
            </td>
            <td>
              <div style="border:2px solid rgb(206, 203, 203);; height:400px; width:500px; text-align: center;" class="float-right">
                <label for="inputEmail3" class="col-sm-8 col-form-label">Chọn ảnh giải đấu</label>
                <div style="height: 300px; width:450px; text-align: center;"><img src="" id="avatar" height="200" alt="Image preview..."></div>
              <input type="file" name="imageshs" onchange="previewFile()">
                </div>
                
                
              <script type="text/javascript">
                function previewFile() {
                var preview = document.querySelector('#avatar');
                var file    = document.querySelector('input[type=file]').files[0];
                var reader  = new FileReader();
              
                reader.onloadend = function () {
                  preview.src = reader.result;
                }
              
                if (file) {
                  reader.readAsDataURL(file);
                } else {
                  preview.src = "";
                }
              }
              </script>
            </td>
          
          </tr>
         <tr>
           
           <td rowspan="2">
             <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Thêm</button>
          </div>
        </td>
         </tr>
        </tbody>
       
      </form>
      </table>
        
    </section>
    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection