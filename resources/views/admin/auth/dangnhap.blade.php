<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
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
			height: 420px;
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
<body class="hold-transition login-page" >

<div class="login-box">
  <img src="{{asset('img/user.jpg')}}" class="user-log" alt="">
  <h1>Login Here</h1>
  <form action="{{route('dangnhap.post')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
   <p>Email</p>
    <input type="email" placeholder="Enter Email" name="email">
    <p>Password</p>
    <input type="password"  placeholder="Enter Password" name="password">
    <div class="col-md-4">
      <button type="submit" class="btn btn-primary btn-block">Login</button>
    </div>
    <a href="#" >Lost your password?</a><br>
    <a href="{{asset ('dangky')}}">Dont have an account?</a>
  </form>
</div>


</body>
</html>
