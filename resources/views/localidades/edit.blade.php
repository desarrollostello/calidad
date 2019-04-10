@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Localidades
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Localidad
                  <p class="pull-right">
                    <a href="{{ route('localidad.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                  {!! Form::model($localidad, ['method' => 'PATCH', 'route' => ['localidad.update', $localidad]]) !!}
                        @include('localidades.form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
