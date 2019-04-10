@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Reclamos
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Reclamo
                  <p class="pull-right">
                    <a href="{{ route('reclamo.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'reclamo.store']) }}
                        @include('reclamos.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
