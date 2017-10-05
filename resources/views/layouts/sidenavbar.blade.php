<div class="col-md-3 left_col">

  <div class="left_col scroll-view">

    <div class="navbar nav_title" style="border: 0;">

      <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>GPA</span></a>

    </div>

    <div class="clearfix"></div>
          <!-- menu prile quick info -->
    <div class="profile">

      <div class="profile_pic">

        <img src="{{ asset('images/user.png')}} " alt="..." class="img-circle profile_img">

      </div>

      <div class="profile_info">

        <span>Bienvenido,</span>

        <h2>{{ Auth::user()->name }}</h2>

      </div>

    </div>
          <!-- /menu prile quick info -->

    <br />
          <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

      <div class="menu_section">

        <h3>Rol -> {{ Auth::user()->rol->name }}</h3>

        <ul class="nav side-menu">

            @yield('menu')
            <!--menu list <li><a><i class="fa fa-home"></i> Home</a></li> -->
               
        </ul>

      </div>
      
    </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
  </div>
</div>