
<div class="row">
    <div class="form-group col-sm-10">
        {!! Form::label('nombre', 'Nombre y Apellido') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control datetimepicker', 'required', 'minlength' =>'4', 'maxlength' =>'20'])
        !!}
    </div>
</div>
<div class="row">
      <div class="form-group col-sm-5">
          {!! Form::label('domicilio_calle', 'Domicilio - Calle') !!}
          {!! Form::text('domicilio_calle', null, ['class' => 'form-control datetimepicker', 'required', 'minlength' =>'2', 'maxlength' =>'200'])
          !!}
      </div>
      <div class="form-group col-sm-2">
          {!! Form::label('domicilio_altura', 'Altura') !!}
          {!! Form::text('domicilio_altura', null, ['class' => 'form-control datetimepicker', 'required', 'minlength' =>'1', 'maxlength' =>'20'])
          !!}
      </div>
      <div class="form-group col-sm-4">
          {!! Form::label('cooperativa_id', 'Cooperativa') !!}
          {!! Form::select('cooperativa_id', $cooperativas, null, ['placeholder'=>'Seleccione', 'class' => 'form-control', 'required', 'id' => 'select_tipo_elemento', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
      </div>
</div>

<div class="row">
      <div class="form-group col-sm-8">
          {!! Form::label('ubicacion', 'Ubicacion') !!}
          {!! Form::text('ubicacion', null, ['class' => 'form-control datetimepicker', 'minlength' =>'4', 'maxlength' =>'200'])
          !!}
      </div>
      <div class="form-group col-sm-3">
          {!! Form::label('telefono', 'Teléfono') !!}
          {!! Form::text('telefono', null, ['class' => 'form-control datetimepicker', 'minlength' =>'4', 'maxlength' =>'20'])
          !!}
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
