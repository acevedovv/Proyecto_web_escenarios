<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Reserva</title>
    
    <!-- Importar FullCalendar CSS y JS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <!-- Estilos personalizados para ajustar el tamaño del calendario -->
    <style>
        #calendar {
            max-width: 600px;
            height: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>Agregar Reserva</h1>

    @if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

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
        const calendarEl = document.getElementById('calendar');
        const fechaResInput = document.getElementById('fecha_res');
        const horaResInput = document.getElementById('hora_res');

        // Cargar reservas desde el backend
        const reservasExistentes = @json($reservas).map(reserva => ({
            title: 'Reservado', // Texto que aparecerá en el calendario
            start: `${reserva.fecha_res}T${reserva.hora_res}`, // Fecha y hora de inicio
            end: `${reserva.fecha_res}T${reserva.hora_fin}`, // Fecha y hora de fin
            backgroundColor: 'red', // Color de fondo
            borderColor: 'darkred', // Color del borde
        }));

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            events: reservasExistentes, // Cargar las reservas
            select: function(info) {
                // Comprobar si la selección se solapa con algún evento existente
                const isOverlapping = reservasExistentes.some(reserva => {
                    return (
                        (info.start >= new Date(reserva.start) && info.start < new Date(reserva.end)) ||
                        (info.end > new Date(reserva.start) && info.end <= new Date(reserva.end)) ||
                        (info.start <= new Date(reserva.start) && info.end >= new Date(reserva.end))
                    );
                });

                if (isOverlapping) {
                    alert('Este rango de tiempo ya está reservado.');
                } else {
                    const selectedDate = info.startStr.split('T')[0];
                    const selectedTime = info.startStr.split('T')[1]?.slice(0, 5) || '00:00';
                    fechaResInput.value = selectedDate;
                    horaResInput.value = selectedTime;
                }
            },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
        });

        calendar.render(); // Renderizar el calendario
    });
</script>


</body>
</html>
