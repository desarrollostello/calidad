
<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('causaContingencia_id', 'Causa de la Contingencia') !!}
        {!! Form::select('causaContingencia_id', $causaContingencia, null, ['placeholder'=>'Seleccione', 'class' => 'form-control', 'required', 'id' => 'select_causa_contingencia', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('tipoElemento_id', 'Tipo de Elemento') !!}
        {!! Form::select('tipoElemento_id', $tipoElemento, null, ['placeholder'=>'Seleccione', 'class' => 'form-control', 'required', 'id' => 'select_tipo_elemento', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('codigo_elemento', 'Código Elemento') !!}
        {!! Form::text('codigo_elemento', null, ['class' => 'form-control', 'minlength' =>'2', 'maxlength' =>'20'])
        !!}
        <!--
        {!! Form::label('codigoElemento_id', 'Código Elemento') !!}
        {!! Form::select('codigoElemento_id', $codigoElemento, null, ['placeholder'=>'Seleccione', 'class' => 'form-control', 'required', 'id' => 'select_codigo_elemento', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}-->
    </div>

</div>


<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('fecha_apertura', 'Fecha Apertura') !!}
        {!! Form::text('fecha_apertura', null, ['class' => 'form-control', 'minlength' =>'4', 'maxlength' =>'20', 'required'])
        !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('hora_apertura', 'Hora Apertura (HH:MM)') !!}
        {!! Form::text('hora_apertura', null, ['class' => 'form-control', 'minlength' =>'4', 'maxlength' =>'20'])
        !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('fecha_cierre', 'Fecha Cierre') !!}
        {!! Form::text('fecha_cierre', null, ['class' => 'form-control','minlength' =>'4', 'maxlength' =>'20'])
        !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('hora_cierre', 'Hora Cierre (HH:MM)') !!}
        {!! Form::text('hora_cierre', null, ['class' => 'form-control', 'minlength' =>'4', 'maxlength' =>'20'])
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

@section('javascript')

<script>
var hora_apertura = document.getElementById("hora_apertura");
var im = new Inputmask("99:99");
im.mask(hora_apertura);

var hora_cierre = document.getElementById("hora_cierre");
im.mask(hora_cierre);
</script>    
@endsection