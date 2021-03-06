<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>KP</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Khai Pham</b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <img src="{{ asset('assets/vendor/adminlte/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ $me->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('assets/vendor/adminlte/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                <p>
                  {{ $me->name }}
                </p>
              </li>
                <div class="pull-right">
                    <form action="{{ route('post.logout') }}" method="POST">
                         {{ csrf_field() }}
                        <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                    </form>
                </div>
              </li>
            </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
