
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
            <h1 class="m-0">Giải đấu: {{$giaidau->TenGD}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('ds-giaidau.get')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active"><a href="{{route('ds-doi.get',[$giaidau->MaGD])}}">Đội tuyển</a></li>
              <li class="breadcrumb-item active">Chi tiết</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
   

    <section class="content">
        {{-- Tên đội tuyển --}}
        <h3>Thông tin đội: {{$doi->TenDoi}}</h3> 
        {{-- Ảnh đại diện của đội --}}
        <img src="{{asset('img/'.$doi->img)}}" alt="anh dai dien" height="200px">
        
        {{-- bảng các thành viên của đội, hiện thị tên thành viên, vị trí --}}
        <table></table>
        
        <h5>Trận thắng: {{$thanhtich[0]->TranThang}}</h5>
        <h5>Trận thua: {{$thanhtich[0]->TranThua}} </h5>
        <h5>Tổng điểm: {{$thanhtich[0]->Diem}}</h5>
        
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
       
       
        <div class="form-them">
          <h3>Thêm thành viên mới:</h3>
          <form  method="post" action="{{route('them-thanhviendoi.post',[$giaidau->MaGD,$doi->MaDoi])}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class=" row">
              <div class="col-md-6">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Tên thành viên:</label>
                <input type="text" class="" name="tentv" placeholder="Tên thành viên">
              </div>
              
              <div class="col-md-4">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Vị trí:</label>
               <select name="vitri" id="">
                 <option value="Top">Top</option>
                 <option value="Jungle">Jungle</option>
                 <option value="Mid">Mid</option>
                 <option value="ADC">ADC</option>
                 <option value="Support">Support</option>
               </select>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block " name="themTV" >Thêm thành viên</button>
              </div>
            </div>
          </form>
         
            
        </div>
     
       <form action="{{route('sua-thanhvien-doi.post',[$giaidau->MaGD,$doi->MaDoi])}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title mb-4 font-size-16">Danh sách thành viên:</h4>
                <div class="card-box table-responsive dvData">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Vị trí</th>
                        <th>Hanh dong</th>
                      </tr>
                    </thead>
        
                    <tbody>
                      @php
                          $dem=1;
                      @endphp
                      @foreach($thanhvien as $i => $tv)
                      <tr>
                        <td>{{$dem}}
                          
                        </td>
                        <td>
                          <input type="text" class="" name="tentv{{$tv->MaTV}}" value="{{old('tentv',$tv->TenTV)}}">
                        </td>
                        <td>
                          <select name="vitri{{$tv->MaTV}}" id="">
                            <option value="Top">Top</option>
                            <option value="Jungle">Jungle</option>
                            <option value="Mid">Mid</option>
                            <option value="ADC">ADC</option>
                            <option value="Support">Support</option>
                            <option value="{{$tv->ViTri}}" selected>{{$tv->ViTri}}</option>
                          </select>
                        </td>
                        <td>
                         
                          
                          &nbsp;
                          &nbsp;
                          &nbsp;
                          <a href="{{route('delete-thanhvien-doi.get',[$tv->MaTV])}}" class="button delete-confirm">Delete</a>
        
                        </td>
                      </tr>
                      @php
                          $dem++;
                      @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="col-md-2">
                  <button type="submit" class="btn btn-primary btn-block " name="themTV" >Update</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
       
        
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
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
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
<li class="nav-header" style="text-align: center;"><h5>HỒ SƠ GIẢI ĐẤU</h5></li>
<li class="nav-item " style="color"><hr style=" width:200px; background-color:white; height:1.5; "></li>
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