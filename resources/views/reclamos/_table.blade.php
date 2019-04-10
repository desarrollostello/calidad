<table id="table" class="table table-responsive mdl-data-table">
    <thead>
    <tr>
         <th>Fecha Hora</th>
         <th>Usuario</th>
         <th>Motivo</th>
         <th>Contingencia</th>
         <th>Direccion</th>

        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
         <th>Fecha Hora</th>
         <th>Usuario</th>
         <th>Motivo</th>
         <th>Contingencia</th>
         <th>Direccion</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($reclamos as $td)
        <tr>
            <td>{{ $td->fecha_hora }}</td>
            <td>{{ $td->usuario->nombre }}</td>
            <td>{{  $td->motivo->nombre }}</td>
            @if($td->contingencia_id == 1)
                  <td></td>
            @else
                  <td>{{ $td->contingencia->fecha_hora_apertura }}</td>
            @endif
            <td>{{  $td->usuario->direccion }}</td>

            <td>
                <a href="{{ route('reclamo.edit', $td) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>
                <a href="{{ route('reclamo.delete', $td) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
                <button class="btn btn-info btn-xs pull-rigth" data-id={{$td->id}} data-toggle="modal" data-target="#edit_reclamo">Asociar</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="modal fade" id="edit_reclamo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Asociar Contingencia</h4>
      </div>
      <form action="{{route('reclamo.updateContingencia','test')}}" method="post">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="id" id="id" value="">
                        <div class="form-group">
                              <div class="form-group col-sm-4">
                                  {!! Form::label('contingencia_id', 'Contingencia') !!}
                                  {!! Form::select('contingencia_id', $contingencias, null, ['placeholder'=>'Seleccione', 'class' => 'form-control', 'id' => 'select_contingencias', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
                              </div>
                        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Guardar cambios</button>
	      </div>
      </form>
    </div>
  </div>
</div>
