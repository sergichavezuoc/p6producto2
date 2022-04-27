@extends('layouts.app')
@section('main-content')

@foreach($notas as $nota)
<h1>{{$nota->clase}}</h1>
<b>Exámenes:</b><br />
@foreach($notas_examenes as $notas_examen)
@if ($notas_examen->identificador_clase==$nota->identificador_clase)
{{$notas_examen->nombre}}: {{$notas_examen->nota_examen}} <br /> 
@endif
@endforeach
<b>Trabajos:</b><br />
@foreach($notas_trabajos as $notas_trabajo)
@if ($notas_trabajo->identificador_clase==$nota->identificador_clase)
{{$notas_trabajo->nombre}}: {{$notas_trabajo->nota_trabajo}} <br /> 
@endif
@endforeach
<b>Media examenes:</b> {{$nota->media_examenes}}<br />
<b>Media trabajos:</b> 
@if ($nota->media_trabajos=="")
Sin trabajos evaluados
@else
{{$nota->media_trabajos}}
@endif
<br />

@endforeach
  
@endsection




