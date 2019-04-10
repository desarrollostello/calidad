
<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Calidad de Servicio</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->

                    <ul class="dropdown-menu">
                        <li class="header"></li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <!-- User Image -->

                                            @if(Auth::user()->profile)
                                              <img src="{{ asset(Auth::user()->profile->avatar) }}" width="50" class="img-circle" alt="Imagen de Perfil"/>
                                            @else
                                              <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="Imagen de Perfil"/>
                                            @endif

                                        </div>

                                        <p>{{ trans('adminlte_lang::message.awesometheme') }}</p>
                                    </a>
                                </li><!-- end message -->
                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><a href="#">c</a></li>
                    </ul>
                </li><!-- /.messages-menu -->


                @if (Auth::guest())
                    <!-- <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>-->
                    <li><a href="{{ url('/login') }}">Ingresar</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->

                            @if(Auth::user()->profile)
                              <img src="{{ asset(Auth::user()->profile->avatar) }}" width="50" class="user-image" alt="Imagen de Perfil"/>
                            @else
                              <img src="{{ Gravatar::get($user->email) }}" class="user-image" alt="Imagen de Perfil"/>
                            @endif

                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                              @if(Auth::user()->profile)
                              <img style="float: inherit; margin:0" src="{{ asset(Auth::user()->profile->avatar) }}" class="user-image" alt="Imagen de Perfil"/>
                            @else
                                <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="Imagen de Perfil" />
                            @endif
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>{{ Auth::user()->email }}</small>
                                </p>

                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    @if(Auth::user()->profile)
                                    <a href="{{ route('profile.edit', Auth::user()->profile)  }}" class="btn btn-default btn-flat">Perfil</a>
                                    @endif
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            -->
            </ul>
        </div>
    </nav>
</header>
