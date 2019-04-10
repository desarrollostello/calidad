<table id="table" class="table table-responsive mdl-data-table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>CP</th>
        
        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Nombre</th>
        <th>CP</th>
        
    </tr>
    </tfoot>
    <tbody>
    @foreach($localidades as $td)
        <tr>
            <td>{{ $td->nombre }}</td>
            <td>{{ $td->cp }}</td>
            <td>
                <a href="{{ route('localidad.edit', $td) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>

                <a href="{{ route('localidad.delete', $td) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
