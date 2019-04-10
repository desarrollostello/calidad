<table id="table" class="table table-responsive mdl-data-table">
    <thead>
    <tr>
         <th>Código</th>
         <th>Nombre</th>
         <th>Email</th>
         <th>Usuario</th>
        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Usuario</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($cooperativas as $td)
        <tr>
            <td>{{ $td->codigo }}</td>
            <td>{{ $td->nombre }}</td>
            <td>{{ $td->email }}</td>
            @if($td->user)
            <td>{{ $td->user->nombre }}</td>
            @else
                  <td></td>
            @endif
            <td>
                <a href="{{ route('cooperativa.edit', $td) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>

                <a href="{{ route('cooperativa.delete', $td) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
