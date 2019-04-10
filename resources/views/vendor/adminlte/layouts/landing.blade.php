<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Calidad de Servicio y Producto Técnico ">
    <meta name="author" content="Desarrollos TELLO - www.desarrollostello.com">

    <meta property="og:title" content="Calidad de Servicio" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Calidad de Servicio y Producto Técnico" />
    <meta property="og:url" content="http://23.88.113.122/calidad" />
    <!--
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />
-->
    <title>Calidad de Servicio y Producto Técnico</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<div id="app">
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b></b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="https://www.desarrollostello.com" target="_blank" style="font-size: 60%">Desarrollos Tello</a></li>
                      <!--  <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>-->
                    @else
                        <li><a href="{{url('/home')}}">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>


    <section id="home" name="home">
          <div class="row">
                <div class="col-md-10">
                      <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                              <!--<li><a href="{{ route('login') }}">Ingresar</a></li> -->
                              <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                              <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                      {{ Auth::user()->name }} <span class="caret"></span>
                                 </a>

                                 <ul class="dropdown-menu">
                                      <li>
                                          <a href="{{ route('logout') }}"
                                              onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                              Salir
                                          </a>

                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
                                      </li>
                                 </ul>
                              </li>
                        @endguest
                      </ul>
               </div>

               @if (session('info'))
               <div class="container">
                   <div class="row">
                       <div class="col-md-8 col-md-offset-2">
                           <div class="alert alert-success">
                               {{ session('info') }}
                           </div>
                       </div>
                   </div>
               </div>
               @endif

               @yield('content')
          </div>
   </section>
    <div class="row">
        <div class="col-md-12 center">
            <center><h3>Calidad de Servicio y Producto Técnico</h3></center>
            <center><h2><a href="{{ url('/login') }}">Ingresar</a></h2></center>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/smoothscroll.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
