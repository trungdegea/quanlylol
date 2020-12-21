@extends('admin.layouts.index')

@section('title')
    <title>Thêm đội tuyển giải đấu {{$giaidau->TenGD}} </title>
@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Giải đấu {{$giaidau->TenGD}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('trangchu.get')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active"><a href="{{route('ds-doi.get',[$giaidau->MaGD])}}">Đội</a></li>
              <li class="breadcrumb-item active">Thêm</li>
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
   

    <!-- Main content -->
    <section class="content pl-5 pr-5">
      <table class="table table-hover">
      <form action="{{route('them-doi.get',[$giaidau->MaGD])}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <tbody>
          <tr>
      
            <td>
              
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Tên Đội Tuyển:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="tendoi" placeholder="Tên Đội">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Số Lượng Thành Viên:</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="sltv" id="sltv" placeholder="số lượng Thành viên" value="5">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-4 col-form-label">Thêm Thành Viên:</label>
                </div>
                  <div class="form-group row">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="col-md-6">
                          <input type="text" class="" name="tentv" id="tentv"  placeholder="Tên thành viên">
                        </div>
                        <div class="col-md-4">
                         <select name="vitri" id="vitri"  style="height: 30px;" >
                           <option value="Top" >Top</option>
                           <option value="Jungle">Jungle</option>
                           <option value="Mid">Mid</option>
                           <option value="ADC">ADC</option>
                           <option value="Support">Support</option>
                         </select>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="btn btn-primary btn-block " onclick="addThanhvien()" name="themTV" style="line-height: 20px;">Thêm</button>
                        </div>
                  </div>
                  <div class="form-group row" >
                    <div class="card-box table-responsive dvData">
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Họ tên</th>
                            <th>Vị trí</th>
                            <th>Xóa</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
            </td>
            <td>
              <div style="border:2px solid rgb(206, 203, 203);; height:400px; width:500px; text-align: center;" class="float-right">
                <label for="inputEmail3" class="col-sm-8 col-form-label">Chọn ảnh đội</label>
                <div style="height: 300px; width:450px; text-align: center;"><img src="" id="avatar" height="200" alt="Image preview..."></div>
              <input type="file" name="imageshs" onchange="previewFile()">
                </div>
                
                
              <script type="text/javascript">
                function removeTv(x)
                {
                  let table=document.getElementById('datatable-responsive');
                  var a= $(x).parent().parent().index()-1;
                  table.deleteRow(a);
                  
                  
                }
               function addThanhvien() {
                  var sltv=document.getElementById('sltv').value;
                  var oRows=document.getElementById('datatable-responsive').getElementsByTagName('tr').length-1;
                 
                  if(sltv>oRows)
                  {
                    let table=document.getElementById('datatable-responsive');
                    var tentv=document.getElementById('tentv').value;
                    var vitri=document.getElementById('vitri').value;
                    if(tentv!=='')
                    { 
                        
                        var row = document.createElement("tr");
                        let html='<td><input type="text"  name="ten"   value="'+tentv+'"></td>'+
                                '<td> <select name="VT" value="'+vitri+'" id="vitri"  style="height: 30px;" >'+                          
                                '<option value="Top" >Top</option>'+
                                '<option value="Jungle">Jungle</option>'+
                                '<option value="Mid">Mid</option>'+
                                '<option value="ADC">ADC</option>'+
                                '<option value="Support">Support</option></select></td>'+
                                '<td><button type = "button" class = "btn btn-danger" style=" line-height:20px;" onclick="removeTv(this)" >Xóa</button></td>';
                        row.innerHTML = html;
                        table.appendChild(row);
                                   
                    }
                  }
                  else
                  {
                    alert('Đã thêm đủ thành viên vào đội!');
                  }                 
              }
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
            <button type="submit" class="btn btn-primary btn-block" name="themdoi">Thêm</button>
          </div>
        </td>
         </tr>
        </tbody>
       
      </form>
      </table>
        
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
      <a href="{{route('ds-doi.get',[$giaidau->MaGD])}}" class="nav-link">
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