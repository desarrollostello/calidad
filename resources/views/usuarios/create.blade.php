@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Usuarios
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Usuario
                  <p class="pull-right">
                    <a href="{{ route('usuario.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'usuario.store']) }}
                        @include('usuarios.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
