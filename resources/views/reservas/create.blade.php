<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Reserva</title>
    
    <!-- Importar Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Importar FullCalendar CSS y JS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Agregar Reserva</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div id="calendar"></div>

        <form action="{{ route('reservas.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="fecha_res">Fecha de Reserva:</label>
                <input type="date" name="fecha_res" id="fecha_res" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="hora_res">Hora de Inicio:</label>
                <input type="time" name="hora_res" id="hora_res" class="form-control" required>
            </div>

            @if(auth()->user()->role->nombre_rol === 'administrador')
                <div class="form-group">
                    <label for="user_id">Usuario:</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->nombre_usu }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="form-group">
                <label for="id_esc">Escenario Deportivo:</label>
                <select name="id_esc" id="id_esc" class="form-control" required>
                    @foreach($escenariosDeportivos as $escenario)
                        <option value="{{ $escenario->id_esc }}">{{ $escenario->nombre_esc }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const fechaResInput = document.getElementById('fecha_res');
        const horaResInput = document.getElementById('hora_res');
        const escenarioSelect = document.getElementById('id_esc');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            events: [],
            select: function(info) {
                const selectedDate = info.startStr.split('T')[0];
                const selectedTime = info.startStr.split('T')[1]?.slice(0, 5) || '00:00';
                fechaResInput.value = selectedDate;
                horaResInput.value = selectedTime;
            },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            }
        });

        function loadReservations(escenarioId) {
            fetch(`/reservas/eventos/${escenarioId}`)
                .then(response => response.json())
                .then(reservas => {
                    calendar.removeAllEvents();
                    reservas.forEach(reserva => {
                        calendar.addEvent({
                            title: 'Reservado',
                            start: `${reserva.fecha_res}T${reserva.hora_res}`,
                            end: `${reserva.fecha_res}T${reserva.hora_fin}`,
                            backgroundColor: 'red',
                            borderColor: 'darkred',
                        });
                    });
                })
                .catch(error => console.error('Error al cargar reservas:', error));
        }

        loadReservations(escenarioSelect.value);

        escenarioSelect.addEventListener('change', function() {
            loadReservations(this.value);
        });

        calendar.render();
    });
    </script>
</body>
</html>
