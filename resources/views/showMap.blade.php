@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gráfico de Reservas por Barrio</h1>
        <div id="myDiv" style="width:100%;height:400px;"></div> <!-- Contenedor para el gráfico -->
        
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script> <!-- Inclusión de la librería Plotly -->

        <script>
            // Variables para almacenar los datos
            var barrios = [];
            var conteo = {}; // Para contar las reservas por barrio

            // Consumo de la API
            fetch('https://www.datos.gov.co/resource/rdwb-5qc2.json')
                .then(datos_obtenidos => datos_obtenidos.json())
                .then(function transformar(datos_obtenidos) {
                    // Iteramos sobre cada dato
                    datos_obtenidos.forEach(function agregar(datos_obtenidos) {
                        var barrio = datos_obtenidos.barrio_escenario;

                        // Verificamos si ya existe el barrio en el conteo
                        if (conteo[barrio]) {
                            conteo[barrio]++;
                        } else {
                            conteo[barrio] = 1; // Si no existe, inicializamos en 1
                        }
                    });

                    // Extraemos las claves (barrios) y valores (conteo de reservas)
                    barrios = Object.keys(conteo);
                    var reservas = Object.values(conteo);

                    // Definir el gráfico
                    var grafico = {
                        y: reservas,
                        x: barrios,
                        type: 'bar',
                    };

                    var datosGraficas = [grafico];

                    // Estilos de la gráfica
                    var layout = {
                        title: 'Cantidad de Reservas por Barrio',
                        xaxis: {
                            title: 'Barrio'
                        },
                        yaxis: {
                            title: 'Número de Reservas'
                        }
                    };
                    
                    Plotly.newPlot('myDiv', datosGraficas, layout);
                });
        </script>

        <!-- Botón para volver a home -->
        <div class="mt-3">
            <a href="{{ url('/') }}" class="btn btn-primary">Volver a Inicio</a>
        </div>
    </div>
@endsection
