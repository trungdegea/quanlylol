<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>
  <style>
    /* CSS Document */
 
   *{
       padding: 0;
       margin: 0;
     }
     body, html{
       height: 100%;
       font-family:  sans-serif;
       background-image: url({{asset('img/background.jpg')}});
       
       background-position: center;
       background-repeat: no-repeat;
       background-size: cover;
     }
     
     .login-box{
       background-color:rgb(0, 0, 0, 0.8) ;
       color: white;
       height: 525px;
       width: 350px;
       margin: 50px auto;
       border-radius: 20px;
       position: absolute;
       top: 40%;
       left: 50%;
       transform: translate(-50%,-50%);
       box-sizing: border-box;
       padding: 70px 30px
     }
     .user-log{
       height: 100px;
       width: 100px;
       border-radius: 50%;
       position: absolute;
       top:-10%;
       left: calc(50% - 50px);
     }
     h1{
       margin: 0;
       padding: 0;
       text-align: center;
       font-size: 30px;
       padding: 20px;
     }
     .login-box p{
       font-weight: bold;
       padding-bottom: 5px;
     }
     .login-box input{
       width: 100%;
       margin-bottom: 20px;
     }
     .login-box button{
       width: 100%;
       margin-bottom: 20px;
     }
     .login-box input[type="text"], input[type="password"], input[type="email"]{
       border: none;
       border-bottom: 1px solid #fff;
       background: transparent;
       outline: none;
       height: 30px;
       color: white;
     }
     .login-box button[type="submit"]{
       border:none;
       outline: none;
       background: #fd2525;
       height: 40px;
       color: white;
       font-size: 18px;
       border-radius: 20px;
     }
     .login-box button[type="submit"]:hover{
       corsor:pointer;
       color:#000;
       background: #ffc107;
     }
     .login-box a{
       text-decoration: none;
       color: darkgrey;
       line-height: 20px;
       font-size: 12px;
       
     }
     .login-box a:hover{
       
       color: #ffc107;
       
       
     }
  </style>
 
</head>
<body class="hold-transition register-page">
{{-- <div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Your</b>LEAGUE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      @if (count($errors)>0)
          <div class="alert alert-danger">
            @foreach ($errors-all() as  $err)
                {{$err}} <br>
            @endforeach
          </div>
      @endif
      <form action="dangky" method="post">
          <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder=" Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="repassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a href="{{asset('dangnhap')}}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div> --}}


<div class="login-box">
  
  <img src="{{asset('img/user.jpg')}}" class="user-log" alt="">
  <h1>Your League</h1>
  <form action="{{route('dangky.post')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <p>UserName</p>
    <input type="text" class="form-control" placeholder=" Username" name="username">
   <p>Email</p>
    <input type="email" placeholder="Enter Email" name="email">
    <p>Password</p>
    <input type="password"  placeholder="Enter Password" name="password">
    <p>Retype Password</p>
    <input type="password" class="form-control" placeholder="Retype password" name="repassword">
    <div class="col-md-4">
      <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
    </div>
    <a href="{{asset('dangnhap')}}" class="text-center">I already have a membership</a>
  </form>
</div>
{{-- @if (count($errors)>0)
         <script type="text/javascript">
           
           alert(rors);
         </script>
      @endif --}}




</body>
</html>
