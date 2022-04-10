@extends('layouts.app')
@section('main-content')
<html>
<head>
<meta charset='utf-8' />
  <style>

    html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

    #calendar {
      max-width: 1100px;
      margin: 40px auto;
    }

  </style>



<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>

  






  
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      selectable:true,
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      events: [
        @foreach ($calendario as $evento)
        {
          title: '{{$evento->CURSO}} - {{$evento->NOMBRE}}',
          start: '{{$evento->day}}T{{$evento->time_start}}',
          end: '{{$evento->day}}T{{$evento->time_end}}',
          backgroundColor: '{{$evento->COLOR}}'
        },
        @endforeach
        
      ],
      
    });

    calendar.render();
  });

</script>

</head>
<body>


  <div id='calendar'></div>
</body>

</html>
@endsection




