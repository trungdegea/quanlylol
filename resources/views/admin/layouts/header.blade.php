  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
   
    
   
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
  
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <i class="ion-android-person"> </i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('adminlte/dist/img/0c3b3adb1a7530892e55ef36d3be6cb8.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @if (Auth::check())
        <span class="d-none d-xl-inline-block ml-1">{{Auth::User()->Username}}</span>
        @endif
      </div>
    </div>
    
    <a class="dropdown-item" href="{{route('dangxuat.get')}}">
      <p class="text-center">Logout</p>
    </a>
  </div>
</div>
    </nav>
  <!-- /.navbar -->