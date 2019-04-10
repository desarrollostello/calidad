@push('styles')
.user-image {
    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px;
}
@endpush
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel" style="height: 65px">
                <div class="pull-left image">

                  @if(Auth::user()->profile)
                    <img src="{{ asset(Auth::user()->profile->avatar) }}" width="50" class="user-image img-circle" alt="Imagen de Perfil"/>
                  @else
                    <img src="{{ Gravatar::get($user->email) }}" class="user-image img-circle" alt="Imagen de Perfil"/>
                  @endif
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>

            <li class="active"><a href="{{ url('contingencia/listado') }}"><i class='fa fa-link'></i> <span>Contingencias</span></a></li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Tablas Anexas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('causaContingencia')}}">Causas de las Contingencias</a></li>
                    <li><a href="{{url('tipoElemento')}}">Tipo de Elemento</a></li>
                    <li><a href="{{url('codigoElemento')}}">Código del Elemento</a></li>
                    <!-- <li><a href="{{url('motivoReclamo')}}">Motivo del Reclamo</a></li> -->
                </ul>
            </li>

<!--
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>OTRO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="#">Usuarios</a></li>
                  <li><a href="#">Roles</a></li>
                  <li><a href="#">Permisos</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Usuarios y Roles</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                  <li><a href="{{ route('roles.index') }}">Roles</a></li>
                  <li><a href="{{ route('permisos.index') }}">Permisos</a></li>
                </ul>
            </li>
-->

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
