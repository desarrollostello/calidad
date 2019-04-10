@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Adjuntos
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Adjunto
                  <p class="pull-right">
                    <a href="{{ route('adjunto.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                    {!! Form::open(['route' => ['adjunto.store'], 'enctype' => 'multipart/form-data']) !!}
                        @include('adjunto.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
