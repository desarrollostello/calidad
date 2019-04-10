@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Líneas de Crédito
@endsection
@section('main-content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Líneas de Crédito

                    <a href="{{ route('lineacredito.create') }}"
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                
                </div>
                @include('lineacreditos._table')
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
