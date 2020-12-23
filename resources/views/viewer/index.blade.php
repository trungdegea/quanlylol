<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">

    <title>Document</title>
    
    <style>
      body {
        background-color: #f1f1f1;
        position: relative;
        padding-bottom: 58px;
        min-height: 100vh;
      }
      header {
      text-align: center;
      padding: 50px;
    }
    main {
      width: 90vw;
      margin: 0 auto;
      padding: 30px 20px;
      /* min-height: calc(100vh - 211px - 58px); */
    }
    footer {
      text-align: center;
      background-color: #333;
      color: #fff;
      padding: 20px;
      position: absolute;
      bottom: 0;
      width: 100%;
      /* position: fixed;
      z-index: 1; */
    }
    .col-md-4 i {
      font-size: 2em;
      padding: 5px;
    }
    .col-lg-6{
      max-width: 45%;
      margin: -7px 30px 0px;
      border-radius: 6px;
      box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
    }
    .col-lg-6 .leftside{ float: left;}
    .col-lg-6 .rightside {float: right;}
    .col-lg-6 h2{
      text-align: center;
      padding-bottom: 20px;
      border-bottom: solid 1px black;
    }

    </style>
</head>
<body>
     <!-- Navigation -->
  <header> 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#"> 
          <img src="{{asset('adminlte/dist/img/trophy_icon_by_papillonstudio_d9dtwte-fullview.png')}}" alt="your logo" class="brand-image img-circle elevation-3" style="opacity: .8" height="40px" width="40px">
          YourLeague</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dangnhap.get')}}">Đăng Nhập</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('dangky.get')}}">Đăng Ký</a>
          </li>
        </ul>
      </div>
  </nav>
  </header>
<main>
    <div class="row">
      <div class="col-lg-6 col-xs-12 leftside">
        <h2><strong> Danh sách giải đấu </strong></h2>
        <div class="container">
          @if (count($dsgiaidau)>0)
          <?php $dem=0; ?>
          @foreach ($dsgiaidau as $giaidau)
              @if ($dem%3==0)
                <div class="row">
              @endif
              <div class="col-sm-4">
                  <div class="card-deck">
                    <div class="card">
                      <img class="card-img-top" src="{{asset('img/'.$giaidau->img)}}" height="150" width="150px" style="display: block; margin: 0 auto;" alt="">
                      <div class="card-body">
                        <h5 class="card-title">{{$giaidau->TenGD}}</h5>
                        <p class="card-text">Số lượng đội: {{$giaidau->SLdoi}}</p>
                      </div>
                      <div class="card-footer">
                         {{-- nút chi tiết của một giải đấu, sau khi click chuyển đến trang chi tiết của giải đấu đó --}}
                        <a href="{{route("chitiet-giaidau.get",[$giaidau->MaGD])}}" class="btn btn-warning waves-light waves-effect" title="chi tiet">Chi tiết</i></a>
                      </div>
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
        </div>
      <div class="col-lg-6 col-xs-12 rightside">
        <h2><strong> Lịch thi đấu </strong></h2>
      </div>
    </div>
</main>
<footer>
  <div class="row">
      <div class="col-md-4">Email: yourleague@gmail.com</br>Address: University of Information Technology</div>
      <div class="col-md-4"> 
          <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>, YourLeague Ltd.</p>
      </div>
      <div class="col-md-4">
          <i class="fa fa-youtube-play" aria-hidden="true"></i>
          <i class="fa fa-facebook-square" aria-hidden="true"></i>
          <i class="fa fa-instagram" aria-hidden="true"></i>
          <i class="fa fa-linkedin" aria-hidden="true"></i>
      </div>
  </div>  
</footer>
</body>
</html>