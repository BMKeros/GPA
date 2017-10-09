<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/user.png')}}" alt=""> {{ ucfirst(Auth::user()->name) }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        <li>
                        @if(Auth::user()->profile)
                            <a href="{{ route('profile.show', Auth::user()->profile->id) }}"> Perfil</a>
                        @else
                            <a href="{{ route('profile.create') }}"> Perfil</a>
                        @endif
                        </li>
                        <li>
                            <a href="javascript:;">Ajustes</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out pull-right">  </i> Salir
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-shopping-cart cart"></i>
                        <span class="badge bg-green">
                            @php
                                $cart = \Session::get('cart');
                                $elems = \Session::get('elems');
                            @endphp

                            {{ $elems or '0' }}
                      
                        </span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">

                            @if(count($cart)>0)
                                @foreach($cart as $item)
                                    <li>
                                        <a style="cursor: pointer;" href="{{ url('user/cart/show')}}">
                                            <span class="image">
                                                <img src="{{ asset('images/user.png')}}" alt="Profile Image" />
                                            </span>
                                            <span>
                                                <span>{{ $item->quantity." ".$item->name }}</span>
                                                <span class="time">hace 3 min</span>
                                            </span>
                                            <span class="message">
                                                 agregado al carrito
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <span class="message">
                                        No tiene ningun producto agregado al carrito
                                    </span>
                                </li>
                            @endif

                        <li>
                            <div class="text-center">
                                <a href="{{ url('user/cart/show') }}">
                                    <strong>Mostrar carrito</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
      <!-- /top navigation -->
