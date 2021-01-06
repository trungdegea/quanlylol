@extends('admin.layouts.index')

@section('title')
    <title>Chi tiết giải đấu</title>
@endsection

@section('content')
<style>
  * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

  input[type=number] {
    width: 50px;
    border: none;
    border-bottom: 2px solid rgb(0, 0, 0);
    background-color:transparent;
    text-align: center;
    
}
    .day{
      text-align: center;
      background-color: indianred;
      color: white;
      font-size: 20px;
      font-weight: 600;
    }
    td{
      text-align: center;
    }
    

 .countdown {
  align-items: center;
  background-color: #ffffff;
  display: flex;
  border-radius: 2em;
  border: 2mm solid #000000;
  font-family: -apple-system, 
    BlinkMacSystemFont, 
    "Segoe UI", 
    Roboto, 
    Oxygen-Sans, 
    Ubuntu, 
    Cantarell, 
    "Helvetica Neue", 
    sans-serif;
 
}

.container {
  color: #333;
  margin: 0 auto;
  text-align: center;
}

h3 {
  font-weight: normal;
  letter-spacing: .125rem;
  text-transform: uppercase;
}

#countdown li {
  display: inline-block;
  font-size: 1em;
  font-weight: 600;
  list-style-type: none;
  padding: 1em;
  text-transform: uppercase;
}

li span {
  display: block;
  font-size: 2rem;
}

.message {
  font-size: 4rem;
}

#content {
  display: none;
  padding: 1rem;
}

.emoji {
  padding: 0 .25rem;
}

@media all and (max-width: 768px) {
  h1 {
    font-size: 1.5rem;
  }
  
  li {
    font-size: 1.125rem;
    padding: .75rem;
  }
  
  li span {
    font-size: 3.375rem;
  }
}
</style>
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('ds-giaidau.get')}}">Trang chủ</a></li>
             
              <li class="breadcrumb-item active">Chi tiết</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content pl-5 pr-5">
      <div class="container-fluid">
        <div class="row">
         <div class="card">
          <div class="col-md-6 ">
            <img src="{{asset('img/'.$giaidau->img)}}" height="400" width="600" alt=""><br>
          </div>
         </div>
         <div class="card">
           
         </div>
          <div class="col-md-5 pl-4">
            <h2 class="m-0 pb-4"><b>Giải đấu:</b> {{$giaidau->TenGD}}</h2>
            <h5><b>Thông tin giải đấu:</b></h5>
            <p>Số lượng đội tham gia: {{$giaidau->SLdoi}} đội.</p>
            <p>Thời gian bắt đầu: {{$giaidau->TGBD}}</p>
            <p>Thời gian kết thúc:{{$giaidau->TGKT}} </p>
            <div class="row">
              <div class="col-md-5"> Giá vé: <label for="" style="background-color: rgb(224, 44, 44); color:white"> 50.000 vnd</label></div>
              <div class="col-md-3.5"> Số vé còn lại: <label for="" style="background-color: rgb(83, 241, 123); color:white"> {{$giaidau->SLve}}</label></div>
            </div>
            <div class="row countdown">
              <div class="container">
                
                <div id="countdown">
                  <h1 style="color:red;font-weight: 600; font-size:30px;" >GIẢI ĐẤU KHỞI TRANH SAU: </h1>
                  <ul>
                    <li><span id="days"></span>days</li>
                    <li><span id="hours"></span>Hours</li>
                    <li><span id="minutes"></span>Minutes</li>
                    <li><span id="seconds"></span>Seconds</li>
                  </ul>
                </div>
                <div class="message">
                  <div id="content">
                      <h1 style="color:red;font-weight: 600; font-size:30px;">GIẢI ĐẤU ĐÃ BẮT ĐẦU</h1>
                  </div>
                </div>
              </div>
             
          </div>
            <br>
            
          
            
            <ul style="text-align:right;">
              <a style="border: 3px solid;" href="{{route("sua-giaidau.get",[$giaidau->MaGD])}}" class="btn btn-warning waves-light waves-effect" title="Sửa">Sửa giải đấu  <i class="fas fa-pencil-alt" ></i></a>
            </ul>
            
          </div>
          
        </div>
        @if ($lichthidau->count()>0)
        <div class="card">
          <div class="card-body">
              
              <div class="row mb-3">
                  <div class="col-md-10">
                    <h4>Lịch thi đấu:</h4>
                  </div>
                    
              </div>
              <div class="card-box table-responsive dvData">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Đội 1</th>
                      <th>Đội 2</th>
                      <th>Kết Quả</th>
                      <th>Thời gian</th>
                    </tr>
                </thead>
                  @php
                      $i=0;
                  @endphp
                <tbody>
                  @foreach($lichthidau as $lich)
                      @php
                              $thoigian=date_parse($lich->ThoiGian);
                      @endphp
                    @if ($i%4==0)
                        <tr>
                          <td colspan="5" class="day" >{{$thoigian['day']}}/{{$thoigian['month']}}/{{$thoigian['year']}}</td>
                        </tr>
                    @endif
                  <tr>
                    <td>{{$i+1}}
                    </td>
                    <td>
                     {{$tenDoi[$lich->MaDoi1]}}
                    </td>
                    <td>
                      {{$tenDoi[$lich->MaDoi2]}}
                    </td>
                    <td>
                      @if ($lich->KQ1===NULL)
                        <label >______--______</label>
                      @else
                        {{$lich->KQ1}} -- 
                        {{$lich->KQ2}} 
                      
                      @endif
                      
                    </td>
                    <td>
                        <p>{{$thoigian['hour']}}:00 h</p>
                    </td>
                  </tr>
                  @php
                      $i++;
                  @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          
        </div>
      </div>
      @endif
        @if ($bxh->count()>0)
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h4>Bảng xếp hạng:</h4>
                <div class="card-box table-responsive dvData">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tên đội</th>
                        <th>Điểm</th>
                        <th>Trận thắng</th>
                        <th>Trận thua</th>
                        <th>Hiệu số</th>
                       
                        
                      </tr>
                    </thead>
        
                    <tbody>
                      @foreach($bxh as $i=>$b)
                      <tr>
                        <td>
                          {{$i+1}}
                        </td>
                        <td>
                          {{$tenDoi[$b->MaDoi]}}
                        
                        </td>
                        <td>
                         {{$b->Diem}}
                         
                        </td>
                        <td>
                          {{$b->TranThang}}
                        </td>
                        <td>
                          {{$b->TranThua}}
                        </td>
                        <td>
                          {{$b->HieuSo}}
                        </td>
                       
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                @if ($doi->count()<$giaidau->SLdoi)
                  <div class="col-1.5 float-right" style=" text-align: right;"> 
                    <a href="{{route('them-doi.get',[$giaidau->MaGD])}}"><button type="submit" class="btn btn-primary btn-block ">Thêm đội</button></a>
                  </div>
                @endif
                
              </div>
            </div>
          </div>
        </div>  
        @endif
        
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h4>Danh sách đội:</h4>
                <div class="card-box table-responsive dvData">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên đội</th>
                        <th>Số lượng</th>
                        <th>Chi tiết</th>
                        
                      </tr>
                    </thead>
        
                    <tbody>
                      @foreach($doi as $i=>$d)
                      <tr>
                        <td>
                          {{$i+1}}
                        </td>
                        <td>
                          {{$d->TenDoi}}
                        
                        </td>
                        <td>
                         {{$arrSl[$d->MaDoi]}}
                         
                        </td>
                        <td>
                          <a href="{{route("chitiet-doi.get",[$giaidau->MaGD,$d->MaDoi])}}" class="btn btn-warning waves-light waves-effect" title="chi tiet"><i class="ion-eye"></i></i></a>
                        </td>
                       
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                @if ($doi->count()<$giaidau->SLdoi)
                  <div class="col-1.5 float-right" style=" text-align: right;"> 
                    <a href="{{route('them-doi.get',[$giaidau->MaGD])}}"><button type="submit" class="btn btn-primary btn-block ">Thêm đội</button></a>
                  </div>
                @endif
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
 <script>
  (function () {
  const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

  let tgbd = "<?php echo $giaidau->TGBD;?>";
      countDown = new Date(tgbd).getTime(),
      x = setInterval(function() {    

        let now = new Date().getTime(),
            distance = countDown - now;

        document.getElementById("days").innerText = Math.floor(distance / (day)),
          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        if (distance < 0) {
          let headline = document.getElementById("headline"),
              countdown = document.getElementById("countdown"),
              content = document.getElementById("content");

         
          countdown.style.display = "none";
          content.style.display = "block";

          clearInterval(x);
        }
        //seconds
      }, 0)
  }());
 </script>

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
  <a href="pages/gallery.html" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>
      Điều lệ giải
    </p>
  </a>
</li>


@endsection