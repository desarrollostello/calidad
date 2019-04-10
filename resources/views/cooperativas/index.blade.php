@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Cooperativas
@endsection
@section('main-content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sector
                    <!--@can('localidad.create') -->
                    <a href="{{ route('cooperativa.create') }}"
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                    <!-- @endcan -->
                </div>
                @include('cooperativas._table')
            </div>
        </div>
    </div>
</div>
@endsection
