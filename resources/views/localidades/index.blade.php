@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Localidades
@endsection
@section('main-content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Localidades
                   
                    <a href="{{ route('localidad.create') }}"
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                   
                </div>
                @include('localidades._table')
            </div>
        </div>
    </div>
</div>
@endsection
