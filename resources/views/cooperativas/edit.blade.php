@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Cooperativas
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Cooperativa
                  <p class="pull-right">
                    <a href="{{ route('cooperativa.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                  {!! Form::model($cooperativa, ['method' => 'PATCH', 'route' => ['cooperativa.update', $cooperativa]]) !!}
                        @include('cooperativas.form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
