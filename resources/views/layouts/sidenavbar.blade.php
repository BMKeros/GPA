<div class="col-md-3 left_col">

    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            @if(\Auth::user()->hasRole('ADMIN'))
                <a href="{{ route('admin.dashboard') }}" class="site_title"><i class="fa fa-paw"></i>
                    <span>GPA</span></a>
            @else
                <a href="{{ route('user.dashboard') }}" class="site_title"><i class="fa fa-paw"></i>
                    <span>GPA</span></a>
            @endif
        </div>

        <div class="clearfix"></div>
        <!-- menu prile quick info -->
        <div class="profile">

            <div class="profile_pic">

                <img src="{{ asset('images/user.png')}} " alt="..." class="img-circle profile_img">

            </div>

            <div class="profile_info">

                <span>Bienvenido</span>

                <h2>{{ ucfirst(Auth::user()->name) }}</h2>

            </div>

        </div>
        <!-- /menu prile quick info -->

        <br/>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section" style="margin-top:30%;">

         
                <ul class="nav side-menu">
                    @yield('menu')
                </ul>
            </div>
        </div>
    </div>
</div>