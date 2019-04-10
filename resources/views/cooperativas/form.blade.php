<div class="row">
    <div class="form-group col-sm-8">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' =>'form-control'] ) !!}
    </div>
    <div class="form-group col-sm-2">
        {!! Form::label('codigo', 'Código') !!}
        {!! Form::text('codigo', null, ['class' =>'form-control', 'minlength' =>'4', 'maxlengh' => '4'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label('localidad_id', 'Localidad') !!}
        {!! Form::select('localidad_id', $localidades, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_localidades', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>
    <div class="form-group col-sm-5">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['class' =>'form-control', 'minlength' =>'2'] ) !!}
    </div>
</div>
<div class="row">
      <div class="form-group col-sm-10">
          {!! Form::label('domicilio', 'Domicilio') !!}
          {!! Form::text('domicilio', null, ['class' =>'form-control', 'minlength' =>'2'] ) !!}
      </div>
</div>
<br /><br />
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::submit('GUARDAR', ['class' => 'btn btn-success']) !!}
    </div>
</div>
