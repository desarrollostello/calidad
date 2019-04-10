<table id="table" class="table table-responsive mdl-data-table">
    <thead>
    <tr>
        <th>Fecha</th>
        <th>Archivo</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Fecha</th>
        <th>Archivo</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($adjuntos as $p)
        <tr>
            <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
            <td>{{ $p->file }}</td>
            <td>
                <a href="{{ route('adjunto.edit', $p) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>
                <a href="{{ route('adjunto.show', $p) }}" class="btn btn-info btn-xs pull-rigth">Ver</a>
                <a href="{{ route('adjunto.delete', $p) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
