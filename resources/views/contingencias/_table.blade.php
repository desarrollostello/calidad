<!-- <table id="table" class="table table-responsive mdl-data-table"> -->
<table id="table" class="table table-responsive">
    <thead>
    <tr>
         <th>Tipo Elemento</th>
         <th>Fecha Apertura</th>
         <th>Hora Apertura</th>
         <th>Fecha Cierre</th>
         <th>Hora Cierre</th>
         <th>Causa</th>
        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contingencias as $td)
        <tr>
            <td>{{ $td->tipo->nombre }}</td>
            @if($td->fecha_apertura)
                <td>{{  \Carbon\Carbon::parse($td->fecha_apertura)->format('d-m-Y') }}</td>
            @else
            <td></td>
            @endif
            <td>{{ $td->hora_apertura }}</td>
            @if($td->fecha_cierre)
                <td>{{  \Carbon\Carbon::parse($td->fecha_cierre)->format('d-m-Y') }}</td>
            @else
                <td></td>
            @endif
            @if($td->hora_cierre)
                <td>{{ $td->hora_cierre }}</td>
            @else
            <td></td>
            @endif
            <td>{{ $td->causa->nombre }}</td>
            <td>
                <a href="{{ route('contingencia.edit', $td) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>

                <a href="{{ route('contingencia.delete', $td) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
