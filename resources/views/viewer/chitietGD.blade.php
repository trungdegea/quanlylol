<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Document</title>
    <link rel = "icon" href =  "{{ asset('adminlte/dist/img/trophy_icon_by_papillonstudio_d9dtwte-fullview.png') }}" type = "image/x-icon"> 
    
    <style>
        header {
            text-align: center;
            padding: 0;
        }

        footer {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 20px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .gap-md {
            display: block;
            height: 50px;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Verdana, sans-serif;
            margin: 0;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */

        .container {
            position: relative;
            margin: auto;
        }

        .carousel-item {
            height: calc(100vw * 0.3);
        }

        .carousel-item img {
            height: 100%;
        }

        .text {
            color: white;
            font-size: 30px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
            background-color: #5d5a5a;
        }

        .gap-md {
            display: block;
            height: 100px;
            margin: 0;
            padding: 0;
        }

        .fulture {
            margin-top: 5px;
        }

        a {
            color: inherit;
        }
        h1 {
            text-align: center;
        }
    </style>

</head>

<body>
    <!-- Navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="{{route('trangchu.get')}}">
                <img src="{{ asset('adminlte/dist/img/trophy_icon_by_papillonstudio_d9dtwte-fullview.png') }}"
                    alt="your logo" class="brand-image img-circle elevation-3" style="opacity: .8" height="40px"
                    width="40px">
                YourLeague</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dangnhap.get') }}">Đăng Nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dangky.get') }}">Đăng Ký</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
   <div class="container-wrapper">
    <div class="container">
        <div class="gap-md"></div>
        <div class="row">
            <div class="card">
             <div class="col-md-6 ">
               <img src="{{asset('img/'.$giaidau->img)}}" height="400" width="600" alt=""><br>
             </div>
            </div>
            <div class="card">
              
            </div>
            
             <div class="col-md-5 pl-4">
               <h2 class="m-0 pb-4" id="top"><b>Giải đấu:</b> {{$giaidau->TenGD}}</h2>
               <h5><b>Thông tin giải đấu:</b></h5>
               <p>Số lượng đội tham gia: {{$giaidau->SLdoi}} đội.</p>
               @php
                $thoigian=date_parse($giaidau->TGBD);
                $thoigian1=date_parse($giaidau->TGKT);
                @endphp

               <p>Thời gian bắt đầu: {{$thoigian['hour']}}:{{$thoigian['minute']}}     ngày: {{$thoigian['day']}}-{{$thoigian['month']}}-{{$thoigian['year']}}  </p>
               <p>Thời gian kết thúc: {{$thoigian1['hour']}}:{{$thoigian1['minute']}}     ngày: {{$thoigian1['day']}}-{{$thoigian1['month']}}-{{$thoigian1['year']}}   </p>
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
            <div class="col-md-10">
              @if ($giaidau->SLve>0)
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Đặt vé</button>
         
            @endif
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nhập thông tin đặt vé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('datve.post',[$giaidau->MaGD])}}" method="post" id="form1">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Họ Tên:</label>
                        <input type="text" class="form-control" name="tenkhach">
                    </div>
                    <div class="form-group">
                        <label for="Sdt" class="col-form-label">SĐT:</label>
                        <input type="text" class="form-control" name="sdt">
                    </div>
                    <div class="form-group">
                        <label for="sove" class="col-form-label">Số vé:</label>
                        <input type="number" class="form-control" name="sove" id="sove" onchange="TinhTien()" >
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Giá:</label>
                        <span id="gia"></span>
                    </div>
                    
                   
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" form="form1" >Gửi</button>
                    
                </div>
                </div>
            </div>
            </div>
            </div>
               
             </div>
             
           </div>
           <br>
           <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   <h4> Danh sách đội</h4>
                  </button>
                </h5>
              </div>
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  @if ($lichthidau->count()>0)
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
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo{{$d->MaDoi}}">Xem thành viên</button>
                            <div id="demo{{$d->MaDoi}}" class="collapse">
                              @foreach ($thanhvien[$d->MaDoi] as $tv)
                                  Tên: {{$tv->TenTV}} <label>-----</label> Vị trí: {{$tv->ViTri}} <br>
                              @endforeach
                            </div>
                          </td>
                         
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                 
                  
                  @endif
                  </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h4>Lịch thi đấu</h4>
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  @if ($lichthidau->count()>0)
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
                  @endif
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h4>Bảng xếp hạng</h4>
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    @if ($bxh->count()>0)
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
                    @endif
                </div>
              </div>
            </div>
          </div>
        
 </div>
   </div>

 <div class="gap-md"></div>

 <div style="position: relative">
    <footer style="width: 100%">
        <div class="row">
            <div class="col-md-4">Email: yourleague@gmail.com</br>Address: University of Information Technology</div>
            <div class="col-md-4">
                <p>Copyright &copy; <script>
                        document.write(new Date().getFullYear());
    
                    </script>, YourLeague Ltd.</p>
            </div>
            <div class="col-md-4">
                <a href="https://www.youtube.com/channel/UCXF4WjTCUQSmGapnNEZzbYw" target="_blank"><i
                        class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100022445736782" target="_blank"><i
                        class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                <a href="#" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                <a href="#" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
            </div>
        </div>
    </footer>   
 </div>

</body>
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
  function TinhTien()
  {
      var sove=document.getElementById('sove').value;
      var gia=sove*50000;
      document.getElementById('gia').innerHTML=gia+' VND';
  }
 
</script>
</html>

@section('styleview')
    <link rel="stylesheet" href="{{ asset('css/style-view.css') }}">
@endsection
