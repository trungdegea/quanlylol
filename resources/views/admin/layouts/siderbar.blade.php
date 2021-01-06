  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('ds-giaidau.get')}}" class="brand-link">
      <img src="{{asset('adminlte/dist/img/trophy_icon_by_papillonstudio_d9dtwte-fullview.png')}}" alt="your logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">YOUR LEAGUE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="background-color: white;" src="{{asset('adminlte/dist/img/0c3b3adb1a7530892e55ef36d3be6cb8.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p class="ml-2" style="color:white">{{Auth::User()->Username}}</p>
        </div>
      </div>

    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item">
            <a href="{{route('ds-giaidau.get')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh sách giải đấu
               
              </p>
            </a>
          </li>
      
        @yield('siderbar')
          
        </ul>
      </nav>
    
    </div>
  
  </aside>
   
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->