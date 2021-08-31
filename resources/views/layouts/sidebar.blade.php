<nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="../assets/img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">@if(session()->has('user_name'))
                            {{session()->get('user_name')}}
                          @else
                            Guest
                          @endif  
            </h2><span>Web Developer</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="{{route('dashboard')}}"> <i class="icon-home"></i>Dashboard</a></li>
            <li><a href="{{route('student.index')}}"> <i class="icon-form"></i>Student</a></li>
            <li><a href="{{route('companies.store')}}"> <i class="icon-form"></i>Compnay</a></li>
            <li><a href="{{route('employee.store')}}"> <i class="icon-form"></i>Employee</a></li>
            <!-- <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Example dropdown </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li> -->
          </ul>
        </div>
       
      </div>
    </nav>