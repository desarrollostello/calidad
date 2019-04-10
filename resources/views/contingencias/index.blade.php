@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Contingencias
@endsection
@section('main-content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Contingencias
                    <!--@can('contingencia.create') -->
                    <a href="{{ route('contingencia.create') }}"
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                    <!-- @endcan -->
                </div>
                @include('contingencias._table')
            </div>
        </div>
    </div>
</div>
@endsection
