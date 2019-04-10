<!DOCTYPE html>

<html>

<head>

    <title>Sistema Calidad - Notificacion</title>

</head>

<body>

<h2>Sistema Calidad - Notificación de subida de un Archivo</h2>
<br>

El presente email se ha generado debido a que se  ha subido un nuevo archivo al sistema<br><br>

Cooperativa: {{  $data->cooperativa->nombre }} - Código: {{ $data->cooperativa->codigo }} <br>
Usuario:     {{ $data->user->name }}<br>
E-mail del usuario: {{ $data->user->email }}<br>
Archivo:     <a href="http://www.gesis.com.ar/calidad/upload/{{ $data->cooperativa->codigo }}/{{ $data->file }}"> {{ $data->file }} </a> (click derecho - guardar enlace como para descargarlo)<br>

Fechay hora de subida:  {{ $data->updated_at  }}<br>

@if ($data->mensual == 1)
    Periodo: {{ $data->mes }}<br>
    Año: {{ $data->anio }}<br>
@else
    Trimestre: {{ $data->trimestre }}<br>

@endif

Tipo archivo: {{  $data->tipo_archivo }}<br>

</body>

</html>