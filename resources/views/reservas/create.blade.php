<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Reserva</title>
    

    <!-- Importar FullCalendar JS (eliminar defer para garantizar la carga correcta) -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
</head>
<body>
    <h1>Agregar Reserva</h1>

    <div id="calendar"></div>

    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf
        <label for="fecha_res">Fecha de Reserva:</label>
        <input type="date" name="fecha_res" id="fecha_res" required>
        <br>
        
        <label for="hora_res">Hora de Inicio:</label>
        <input type="time" name="hora_res" id="hora_res" required>
        <br>

        <label for="user_id">Usuario:</label>
        <select name="user_id" id="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->nombre_usu }}</option>
            @endforeach
        </select>
        <br>

        <label for="id_esc">Escenario Deportivo:</label>
        <select name="id_esc" id="id_esc" required>
            @foreach($escenariosDeportivos as $escenario)
                <option value="{{ $escenario->id_esc }}">{{ $escenario->nombre_esc }}</option>
            @endforeach
        </select>
        <br>

        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('reservas.index') }}">Volver a la lista</a>


        <script>

        document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar')
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        })
        calendar.render()
        })

        </script>
  
    
    <div id='calendar'></div>
</body>
</html>
