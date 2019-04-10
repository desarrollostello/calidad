
<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('fecha_hora', 'Fecha y Hora del Reclamo') !!}
        {!! Form::text('fecha_hora', null, ['class' => 'form-control datetimepicker', 'required', 'minlength' =>'4', 'maxlength' =>'20'])
        !!}
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('motivo_reclamo_id', 'Motivo del Reclamo') !!}
        {!! Form::select('motivo_reclamo_id', $motivosReclamos, null, ['placeholder'=>'Seleccione', 'class' => 'form-control', 'required', 'id' => 'select_motivo_reclamo', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>

</div>

<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('usuario_id', 'Usuario') !!}
        {!! Form::select('usuario_id', $usuarios, null, ['placeholder'=>'Seleccione', 'class' => 'form-control', 'required', 'id' => 'select_usuarioo', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('contingencia_id', 'Contingencia') !!}
        {!! Form::select('contingencia_id', $contingencias, null, ['placeholder'=>'Seleccione', 'class' => 'form-control', 'id' => 'select_contingencias', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>

</div>


<div class="row">
      <div class="form-group col-sm-10">
          {!! Form::label('observaciones', 'Observaciones') !!}
          {!! Form::text('observaciones', null, ['class' => 'form-control', 'minlength' =>'4', 'maxlength' =>'200'])
          !!}
      </div>
</div>
<br /><br />
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::submit('GUARDAR', ['class' => 'btn btn-success']) !!}
    </div>
</div>
