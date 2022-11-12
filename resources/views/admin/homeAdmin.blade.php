@extends('layouts/layoutAdmin')

@section('title', 'Home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homeAdmin.css') }}">
@endsection

@section('scriptHeader')
    <script src="{{ asset('js/chart.js') }}"></script>
@endsection

@section('contenido')
    <div class="contenedor">
        {{-- <div class="contador">
            <div>
                <p class="p-contador">Contador de visitas</p>
            </div>
            <div class="contenedor-contador">
                <a href="https://www.cerotec.net/estadisticas-135438/flammashop.com" title="visitas"><img
                        src="https://www.cerotec.net/contador.php?t=5&s=9&i=135438" alt=""></a>
            </div>
        </div> --}}
        <br/>
        <div class="grafico">
            <h3>Gráfico de Ingresos</h3>
            <canvas id="myChart"></canvas>
            <script src="chart.js"></script>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                            'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        datasets: [{
                            label: 'Ingresos',
                            backgroundColor: '#06266F',
                            borderColor: 'gray',
                            data: [7, 8, 5, 2, 8, 10, 7, 7, 4, 9, 8, 5]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            </script>
        </div>
    </div>
@endsection
