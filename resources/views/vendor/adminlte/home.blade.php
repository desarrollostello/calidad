@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Calidad de Servicio y Producto Técnico
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-11">
				<div class="panel panel-default">
					<div class="panel-heading">Calidad de Servicio y Producto Técnico</div>

					<div class="panel-body">
						@foreach($cooperativa as $td)
							<center><h3>{{ $td->nombre }}</h3></center>
						@endforeach
						<center>
							<a href="{{ route('contingencia.create') }}" class="btn btn-primary pull-rigth">Nueva Contingencia</a>
						</center>

						<div id="tabs" style="margin-top: 20px;">
						  <ul>
						    <li><a href="#tabs-1">Archivos Mensuales</a></li>
						    <li><a href="#tabs-2">Archivos Semestrales</a></li>

						  </ul>
						  <div id="tabs-1">
							<div class="row">
								<div class="col-sm-12">
									<p>Aquí deberá subir los siguientes archivos Mensuales</p>
									<div style="width: 100%; height: 3px; background-color: #DDDDDD" class="form-group col-md-12 col-sm-12"></div>
									{!! Form::open(['route' => ['adjunto.store'], 'enctype' => 'multipart/form-data']) !!}
										<div class="row" style="margin-bottom: 35px;">
											<div class="form-group col-sm-4">
												<h5>Seleccione el Mes</h5>
												{!! Form::select('mes', [
													''=>'Seleccione',
													'ENERO_2018'=>'ENERO 2018',
													'FEBRERO_2018'=>'FEBRERO 2018',
													'MARZO_2018'=>'MARZO 2018',
													'ABRIL_2018'=>'ABRIL 2018',
													'MAYO_2018'=>'MAYO 2018',
													'JUNIO_2018'=>'JUNIO 2018',
													'JULIO_2018'=>'JULIO 2018',
													'AGOSTO_2018'=>'AGOSTO 2018',
													'SEPTIEMBRE_2018'=>'SEPTIEMBRE 2018',
													'OCTUBRE_2018'=>'OCTUBRE 2018',
													'NOVIEMBRE_2018'=>'NOVIEMBRE 2018',
													'DICIEMBRE_2018'=>'DICIEMBRE 2018',
													'ENERO_2019'=>'ENERO 2019',
													'FEBRERO_2019'=>'FEBRERO 2019',
													'MARZO_2019'=>'MARZO 2019',
													'ABRIL_2019'=>'ABRIL 2019',
													'MAYO_2019'=>'MAYO 2019',
													'JUNIO_2019'=>'JUNIO 2019',
													],
													null,
													['required', 'class' => 'form-control', 'id' => 'mes', 'data-live-search' => 'true', 'required']  )  !!}

											</div>
											<!--
											<div class="form-group col-sm-4">
												<h5>Seleccione el Año</h5>
												{!! Form::select('anio', [
													''=>'Seleccione',
													'2018'=>'2018',
													'2019'=>'2019',
													'2020'=>'2020',
													'2021'=>'2021',
													'2022'=>'2022',
													'2023'=>'2023',
													'2024'=>'2024',
													'2025'=>'2025',
													'2026'=>'2026',
													'2027'=>'2027',
													'2028'=>'2028',
													'2029'=>'2029',
													'2030'=>'2030',
													],
													null,
													['required', 'class' => 'form-control', 'id' => 'anio', 'data-live-search' => 'true']  )  !!}

											</div>
										-->
											<div class="form-group col-sm-4">
												<h5>Seleccione el Tipo de Archivo</h5>
												{!! Form::select('tipo_archivo', [
													''=>'Seleccione',
													'USUARIOS'=>'USUARIOS',
													'TRANSFORMADORES'=>'TRANSFORMADORES',
													'PLANOS DE LA RED'=>'PLANOS DE LA RED',
													'RECLAMOS'=>'RECLAMOS',
													'MANIOBRAS'=>'MANIOBRAS',
													'ENERGIAS'=>'ENERGIAS',
													'CRONOGRAMA DE MEDICIONES'=>'CRONOGRAMA DE MEDICIONES',
													'ARCHIVOS DE MEDICIONES'=>'ARCHIVOS DE MEDICIONES',
													'COORDENADAS DE USUARIOS'=>'COORDENADAS DE USUARIOS',
													],
													null,
													['required', 'class' => 'form-control', 'id' => 'tipo_archivo', 'data-live-search' => 'true']  )  !!}

											</div>
										</div>



										<div class="row" style="margin-bottom: 35px;">
										    	<div class="form-group col-sm-9">
												<h5>Subir Archivo</h5>
												<div class="control-group input-group" style="margin-top:5px">
											      	<input id="file" type="file" class="form-control " name="file[]" multiple required />
											  	</div>
										    	</div>
										</div>
										<div class="form-group col-md-6 col-sm-12">
										    {!! Form::submit('Subir', ['class' => 'btn btn-success']) !!}
										</div>
										<div style="width: 100%; height: 3px; background-color: #DDDDDD" class="form-group col-md-12 col-sm-12"></div>
			                                    {{ Form::close() }}

								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									Listado de Archivos

									<table id="table" class="table table-responsive mdl-data-table">
									    <thead>
									    <tr>
									        <th>Fecha</th>
									        <th>Archivo</th>
										  <th>Tipo</th>
										  <th>Mes</th>
										  <th>Año</th>
									    </tr>
									    </thead>
									    <tbody>
									    @foreach($adjuntos_m as $a)
									        <tr>
									            <td>{{ \Carbon\Carbon::parse($a->created_at)->format('d-m-Y') }}</td>
									            <!--<td>{{ $a->file }}</td>-->

												<td> <a href="{{ asset('upload/' . $codigo . '/' . $a->file) }}" class="btn btn-primary btn-xs pull-rigth" target="_blank">{{ $a->file }}</a> </td>
												<td>{{ $a->tipo_archivo }}</td>
												<td>{{ $a->mes }}</td>
												<td>{{ $a->anio }}</td>
												<td><a href="{{ route('adjunto.delete', $a)}}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')"
    class="btn btn-danger">Eliminar</a></td>

									        </tr>
									    @endforeach
									    </tbody>
									</table>
								</div>
							</div>
						</div><!-- Fin TABS -->
						<div id="tabs-2">
							  <div class="row">
  								<div class="col-sm-12">
  									<p>Aquí deberá subir los siguientes archivos SEMESTRALES</p>
									<div style="width: 100%; height: 3px; background-color: #DDDDDD" class="form-group col-md-12 col-sm-12"></div>


  									{!! Form::open(['route' => ['adjunto.store'], 'enctype' => 'multipart/form-data']) !!}
  										<div class="row" style="margin-bottom: 35px;">
  											<div class="form-group col-sm-4">
  												<h5>Seleccione Semestre</h5>
  												{!! Form::select('semestre', [
  													''=>'Seleccione',
  													'32'=>'32',
  													'33'=>'33',
  													'34'=>'34',
  													'35'=>'35',
  													'36'=>'36',
  													'37'=>'37',
  													'38'=>'38',
  													'39'=>'39',
  													'40'=>'40',
  													'41'=>'41',
  													],
  													null,
  													['required', 'class' => 'form-control', 'id' => 'semestre', 'data-live-search' => 'true']  )  !!}

  											</div>
											<div class="form-group col-sm-4">
												<h5>Seleccione el Tipo de Archivo</h5>
												{!! Form::select('tipo_archivo_s', [
													''=>'Seleccione',
													'ALTAS'=>'ALTAS',
													'BAJAS'=>'BAJAS',
													'SUSPENSIONES Y REHABILITACIONES'=>'SUSPENSIONES Y REHABILITACIONES',
													'ENERGIAS'=>'ENERGIAS',
													],
													null,
													['required', 'class' => 'form-control', 'id' => 'tipo_archivo_s', 'data-live-search' => 'true']  )  !!}

											</div>
										</div>


  										<div class="row" style="margin-bottom: 35px;">
  										    	<div class="form-group col-sm-9">
  												<h5>Subir Archivo SEMESTRAL</h5>
  												<div class="control-group input-group" style="margin-top:5px">
  											      	<input id="file_semestral" type="file" class="form-control " name="file_semestral[]" multiple required />
  											  	</div>
  										    	</div>
  										</div>
  										<div class="form-group col-md-6 col-sm-12">
  										    {!! Form::submit('Subir', ['class' => 'btn btn-success']) !!}
  										</div>
										<div style="width: 100%; height: 3px; background-color: #DDDDDD" class="form-group col-md-12 col-sm-12"></div>

  			                                    {{ Form::close() }}

  								</div>
  							</div>
  							<div class="row">
  								<div class="col-sm-12">
  									Listado de Archivos Semestrales

  									<table id="table" class="table table-responsive mdl-data-table">
  									    <thead>
  									    <tr>
  									        <th>Fecha</th>
  									        <th>Archivo</th>
  										  <th>Tipo</th>
  										  <th>Semestre</th>
  										  <th>Año</th>
											
  									    </tr>
  									    </thead>
  									    <tbody>
  									    @foreach($adjuntos_s as $a)
  									        <tr>
  									            <td>{{ \Carbon\Carbon::parse($a->created_at)->format('d-m-Y') }}</td>
  									            <!--<td>{{ $a->file }}</td>-->
												<td> <a href="{{ asset('upload/' . $codigo . '/' . $a->file) }}" class="btn btn-primary btn-xs pull-rigth" target="_blank">{{ $a->file }}</a> </td>
  											<td>{{ $a->tipo_archivo }}</td>
  											<td>{{ $a->semestre }}</td>
  											<td>{{ $a->anio }}</td>
											  <td><a href="{{ route('adjunto.delete', $a)}}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')"
    class="btn btn-danger">Eliminar</a></td>
  									        </tr>
  									    @endforeach
  									    </tbody>
  									</table>
  								</div>
  							</div>
					      </div><!-- Fin TAB Semestral-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
