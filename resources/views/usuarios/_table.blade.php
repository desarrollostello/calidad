<table id="table" class="table table-responsive mdl-data-table">
    <thead>
    <tr>
         <th>Nombre</th>
         <th>Domicilio</th>
         <th>Teléfono</th>

        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
         <th>Nombre</th>
         <th>Domicilio</th>
         <th>Teléfono</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($usuarios as $td)
        <tr>
            <td>{{ $td->nombre }}</td>
            <td>{{ $td->domicilio_calle }}{{ $td->domicilio_altura }}</td>
            <td>{{  $td->telefono }}</td>

            <td>
                <a href="{{ route('usuario.edit', $td) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>

                <a href="{{ route('usuario.delete', $td) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
