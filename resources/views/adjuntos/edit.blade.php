@extends('adminlte::layouts.app')

@section('htmlheader_title')
    anel Proyecto
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Anexo
                  <p class="pull-right">
                    <a href="{{ route('adjunto.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                  {!! Form::model($adjunto, ['method' => 'PATCH', 'route' => ['adjunto.update', $adjunto], 'enctype' => 'multipart/form-data']) !!}
                        @include('adjuntos.form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
