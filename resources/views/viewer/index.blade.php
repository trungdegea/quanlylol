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
    <title>Trang chủ YourLeague</title>
    <link rel="icon" href="{{ asset('adminlte/dist/img/trophy_icon_by_papillonstudio_d9dtwte-fullview.png') }}"
        type="image/x-icon">
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

        a:hover {
            text-decoration: none;
            color:yellow;
        }

    </style>

</head>

<body>
    <!-- Navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="{{ route('trangchu.get') }}">
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
    <div class="container ">
        <div class="gap-md"></div>
        <h1>Giải Đấu đang diễn ra</h1>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="3000">
                    <img src="..\public\img\poster.jpg" class="w-100 h-100" alt="anh poster">
                </div>
                @php
                $dem=0;
                @endphp
                @foreach ($giaidauCurrent as $giaidau)
                    <div class="carousel-item" data-interval="5000">
                        <a href="{{ route('chitietGD.get', [$giaidau->MaGD]) }}" target="_blank"><img
                                src="{{ asset('img/' . $giaidau->img) }}" class="w-100 h-100" alt="anh giai dau"
                                title="Click để xem chi tiết"></a>
                        <div class="text">
                            <a href="{{ route('chitietGD.get', [$giaidau->MaGD]) }}">{{ $giaidau->TenGD }}</a>
                        </div>
                    </div>
                    @php
                    if($dem==4)
                    {
                    break;
                    }
                    $dem++;
                    @endphp
                @endforeach


                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>


            </div>
            <div class="fulture">
                <span data-target="#carouselExampleCaptions" data-slide-to="0" class="active">
                    <img class="" src="..\public\img\poster.jpg" alt="." width="100px" height="100px">
                </span>

                @php
                $dem=1;
                @endphp
                @foreach ($giaidauCurrent as $giaidau)
                    <span data-target="#carouselExampleCaptions" data-slide-to="{{ $dem }}" class="active">
                        <img class="" src="{{ asset('img/' . $giaidau->img) }}" alt="." width="100px" height="100px">
                    </span>
                    @php
                    if($dem==4)
                    {
                    break;
                    }
                    $dem++;
                    @endphp
                @endforeach

            </div>
        </div>

        <div class="gap-md"></div>

        <h1>Giải Đấu sắp khởi tranh</h1>
        <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="3000">
                    <img src="..\public\img\poster2.jpg" class="w-100 h-100" alt="anh poster">
                </div>
                @php
                $dem1=0;
                @endphp
                @foreach ($giaidauAlready as $giaidau)
                    <div class="carousel-item" data-interval="5000">
                        <a href="#" target="_blank"><img src="{{ asset('img/' . $giaidau->img) }}" class="w-100 h-100"
                                alt="anh giai dau" title="Click để xem chi tiết"></a>
                        <div class="text">
                            {{ $giaidau->TenGD }} </br>Khởi tranh : {{ $giaidau->TGBD }}
                        </div>
                    </div>
                    @php
                    if($dem1==4)
                    {
                    break;
                    }
                    $dem1++;
                    @endphp
                @endforeach


                <a class="carousel-control-prev" href="#carouselExampleCaptions1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>


            </div>
            <div class="fulture">
                <span data-target="#carouselExampleCaptions1" data-slide-to="0" class="active">
                    <img class="" src="..\public\img\poster2.jpg" alt="." width="100px" height="100px">
                </span>

                @php
                $dem1=1;
                @endphp
                @foreach ($giaidauAlready as $giaidau)
                    <span data-target="#carouselExampleCaptions1" data-slide-to="{{ $dem1 }}" class="active">
                        <img class="" src="{{ asset('img/' . $giaidau->img) }}" alt="." width="100px" height="100px">
                    </span>
                    @php
                    if($dem1==4)
                    {
                    break;
                    }
                    $dem1++;
                    @endphp
                @endforeach


            </div>
        </div>
    </div>

    <div class="gap-md"></div>
    <div style="position: relative">
        <footer style="width: 100%">
            <div class="row">
                <div class="col-md-4">Email: yourleague@gmail.com</br>Address: University of Information Technology
                </div>
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

</html>

@section('styleview')
    <link rel="stylesheet" href="{{ asset('css/style-view.css') }}">
@endsection
