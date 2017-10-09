<div class="col-md-3 left_col">

    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            @if(Auth::user()->role->id === 1)
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

                <span>Bienvenido,</span>

                <h2>{{ ucfirst(Auth::user()->name) }}</h2>

            </div>

        </div>
        <!-- /menu prile quick info -->

        <br/>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">

                <h3 style="margin-left: 0px">{{ Auth::user()->role->name }}</h3>
                <ul class="nav side-menu">

                @yield('menu')
                <!--menu list <li><a><i class="fa fa-home"></i> Home</a></li> -->

                    <li><a><i class="fa fa-home"></i>Productos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{ route('categories.index') }}">Categorias</a>
                            </li>
                            <li><a href="{{ route('products.index') }}">Productos</a>
                            </li>
                            <li><a href="{{ route('inventory.index') }}">Inventario</a>
                            </li>

                        </ul>
                    <li><a><i class="fa fa-venus-mars"></i>Referidos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{ route('referred.create') }}">Nuevo Referido</a>
                            </li>

                        </ul>

            </div>

        </div>
    </div>
</div>