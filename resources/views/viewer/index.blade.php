<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
        margin-bottom: 100px;
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
        .danhsach{
        
        margin: -7px 30px 0px;
        border-radius: 6px;
        box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
        }
    
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
   <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
 
  <div class="carousel-inner w-50">
    @foreach( $dsgiaidau as $giaidau )
        <div class="carousel-item w-50 h-50 {{ $loop->first ? 'active' : '' }}">
        <img class="d-block w-100 h-50" src="{{asset('img/'.$giaidau->img)}}" >
    </div>
    @endforeach
  </div>
 
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only" style="color: rgb(184, 14, 14)">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" style="color: rgb(190, 42, 42)" aria-hidden="true"></span>
    <span class="sr-only" >Next</span>
  </a>
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