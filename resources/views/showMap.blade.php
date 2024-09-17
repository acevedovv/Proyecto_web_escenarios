@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gráfico de Escenarios Deportivos</h1>
        <div id="myDiv" style="width:100%;height:400px;"></div> <!-- Contenedor para el gráfico -->
        
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script> <!-- Inclusión de la librería Plotly -->

        <script>
            // JavaScript para consumir la API y crear el gráfico
            var nombres = [];
            var barrios = [];  // Si quieres añadir más detalles al gráfico
            var conteo = [];   // Puedes contar cuántos escenarios hay por barrio o por tipo, por ejemplo

            // Consumo de la API
            fetch('https://www.datos.gov.co/resource/i5z5-qhf8.json') // Reemplaza con tu URL de datos
                .then(datos_obtenidos => datos_obtenidos.json())
                .then(function transformar(datos_obtenidos) {
                    // Para este ejemplo, simplemente contaremos la cantidad de escenarios
                    var escenarioConteo = {};

                    datos_obtenidos.forEach(function(escenario) {
                        var barrio = escenario.barrio || 'No disponible';
                        if (escenarioConteo[barrio]) {
                            escenarioConteo[barrio]++;
                        } else {
                            escenarioConteo[barrio] = 1;
                        }
                    });

                    // Transformar el objeto en arrays para Plotly
                    for (var barrio in escenarioConteo) {
                        if (escenarioConteo.hasOwnProperty(barrio)) {
                            barrios.push(barrio);
                            conteo.push(escenarioConteo[barrio]);
                        }
                    }

                    // Variables para las gráficas
                    var graf1 = {
                        x: barrios,
                        y: conteo,
                        type: 'bar',
                    };

                    var datosGraficas = [graf1];

                    // Estilos de la gráfica
                    var layout = {
                        title: 'Número de Escenarios Deportivos por Barrio',
                        xaxis: {
                            title: 'Barrio'
                        },
                        yaxis: {
                            title: 'Número de Escenarios'
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
