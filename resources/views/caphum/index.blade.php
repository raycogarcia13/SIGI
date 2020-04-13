@extends('template.base')

@section('title') Config | Empresa @stop

@section('styles')
{{--    Styles here--}}
@stop

@section('current_section')
<img src="{{asset('images/iconos/generales/SVG_CUPET_Btn_On_RRHH.svg')}}" width="40" height="40" style="position:absolute;margin-left: -70px;margin-top: 0px;">
@stop

@section('menuh')
<div class="mh">
    <a href="{{url('/caphum')}}" class="active-link-sidebar f"><div class="mark"></div>Inicio</a>
</div>
@stop

@section('content')

<section class="container" style="margin-top: 2%;">
    <h1>
        Capital Humano
    </h1>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- div class="box-header with-border">
                    <h3 class="box-title">Plazas por dirección y UEB</h3>
                </div --->
                <div class="row">
                    <div class="col-md-5">
                        <div class="p-0">
                            <fieldset>
                                <legend>Cumpleaños:</legend>
                                <div class="overflow-auto" style="height: 180px;">
                                    @if ($cumpleanos)
                                    <p>Del día <b>(25/01/2020)</b>:</p>
                                    <u>
                                        <li>Rolando Quiñero Sabón, 36 años.</li>
                                        <li>Fernanda Sabedra Carpiño, 46 años.</li>
                                    </u>
                                    <p>De la semana <b>(25/01/2020 a 1/02/2020)</b>:</p>
                                    <u>
                                        <li>Marchos Hernández López, 25 años, 27/01/2020.</li>
                                        <li>Fernanda Sabedra Carpiño, 40 años, 29/01/202.</li>
                                    </u>
                                    @else
                                    <br>No hay cumpleaños en este mes.
                                    @endif
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="p-0">
                            <fieldset>
                                <legend>Capacitación:</legend>
                                <div class="overflow-auto" style="height:180px;">
                                    @if ($capacitacion)
                                    <p><b>Del mes (enero 2020)</b>:</p>
                                    <ul>
                                        <li>(26/01/2020 a 31/01/2020) Curso de Administración de Redes, Desoft IJ.</li>
                                    </ul>
                                    <p><b>Del trimestre (enero - marzo)</b>:</p>
                                    <ul>
                                        <li>(17/02/2020  a 21/02/2020) Cursos de Invierno, Univerisad de Ciencias Informáticas.</li>
                                    </ul>
                                    @else
                                    <p>Para le trimestre (enero - marzo, 2019) no han sido planificado acciones de capacitación.</p>
                                    <p>
                                        <blockquote class="blockquote">
                                            <p class="mb-0"></p>
                                            <footer class="blockquote-footer"><cite title="Source Title">"La capacitación de la fuerza laboral es vital pra la obtención de mejores resultados"</cite></footer>
                                        </blockquote>
                                    </p>
                                    @endif
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <br>
                </div>
                <br>

                <fieldset>
                    <legend>Trabajadores por:</legend>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="">
                                <canvas id="catgo" width="668" class="chartjs-render-monitor" style="display: block;"></canvas>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <canvas id="raza" width="668" class="chartjs-render-monitor" style="display: block;"></canvas>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <canvas id="sexo" width="668" class="chartjs-render-monitor" style="display: block;"></canvas>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="box-body">
                </fieldset>
                <br>
                <div class="box-body">
                    <fieldset>
                        <legend>Plazas por Áreas:</legend>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="chart">
                                    <canvas id="barChart" style="height:300px"></canvas>
                                </div>
                                <div class="edit-select text-left" data-id="plazasPorArea" data-name="example_name" edit-current-value="0" data="0|1|2|3|4|5|6|7|8|9" label="Todos las Areas|Area 1|Area 2|Area 3|Area 4|Area 5|Area 6|Area 7|Area 8|Area 9"></div>
                            </div>
                            <div class="col-md-3" style="padding-right:15px;">
                                <div class="align-items-start h-100 text-right">

                                    <h5 class="text-capitalize text-dark" style="text-decoration: underline;font-weight:bold;">Totales Generales</h5>

                                    <div class="align-middle"><b>Aprobadas :</b> 25</div>
                                    <div class="align-middle"><b>Ocupadas :</b> 25</div>
                                    <div class="align-middle"><b>Desocupadas :</b> 25</div>
                                    <div class="align-middle"><b>% de ocupación :</b> 25</div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection

@section('scripts')

<script src='{{ url("vendor/template/libs/charts/chartjs.js") }}'></script>
<script src='{{ url("vendor/chart.js/dist/Chart.bundle.js") }}'></script>
<script src='{{ url("vendor/chart.js/src/plugins/plugin-datalabels.js") }}'></script>
<script src='{{ url("js/utils.js") }}'></script>
<script src='{{ url("js/select.js") }}'></script>

<script>

    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    let colorHex = ['#FB3640', '#EFCA08', '#43AA8B', '#253D5B'];

    var config_catgo = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                ],
                backgroundColor: [
                '#5185c3',
                '#c7524f',
                '#a0c15b',
                '#8467a7',
                '#4db2cd',
                ],
                label: 'Categoría ocupacional'
            }],
            labels: [
            'Administrativos',
            'Dirigentes',
            'Obreros',
            'Servicios',
            'Técnicos'
            ]
        },
        options: {
    responsive: true,
    aspectRatio: false,
    legend: {
      position: 'right'
    },
    plugins: {
      datalabels: {
        color: '#fff',
        anchor: 'end',
        align: 'start',
        offset: 0,
        borderWidth: 2,
        borderColor: '#fff',
        borderRadius: 25,
        backgroundColor: (context) => {
          return context.dataset.backgroundColor;
        },
        font: {
          weight: 'bold',
          size: '10'
        },
        formatter: (value) => {
          return value + ' %';
        }
      }
    }
  }
    };

    var config_raza = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
                ],
                backgroundColor: [
                '#5185c3',
                '#c7524f',
                '#a0c15b',
                ],
                label: 'Raza'
            }],
            labels: [
            'Blanco',
            'Mestizo',
            'Negro',
            ]
        },
        options: {
    responsive: true,
    aspectRatio: false,
    legend: {
      position: 'right'
    },
    plugins: {
      datalabels: {
        color: '#fff',
        anchor: 'end',
        align: 'start',
        offset: 0,
        borderWidth: 2,
        borderColor: '#fff',
        borderRadius: 25,
        backgroundColor: (context) => {
          return context.dataset.backgroundColor;
        },
        font: {
          weight: 'bold',
          size: '10'
        },
        formatter: (value) => {
          return value + ' %';
        }
      }
    }
  }
    };

    var config_sexo = {
  type: 'pie',
  data: {
    datasets: [{
      data: [
          randomScalingFactor(),
          randomScalingFactor(),
      ],
      backgroundColor: [
          '#c7524f',
          '#5185c3',
      ]
    }],
    labels: [
         'Mujeres',
         'Hombres',
    ]
  },
  options: {
    responsive: true,
    aspectRatio: false,
    legend: {
      position: 'right'
    },
    plugins: {
      datalabels: {
        color: '#fff',
        anchor: 'end',
        align: 'start',
        offset: 0,
        borderWidth: 2,
        borderColor: '#fff',
        borderRadius: 25,
        backgroundColor: (context) => {
          return context.dataset.backgroundColor;
        },
        font: {
          weight: 'bold',
          size: '10'
        },
        formatter: (value) => {
          return value + ' %';
        }
      }
    }
  }
};


    window.onload = function() {
        var catgo = document.getElementById("catgo");
        window.myPie = new Chart(catgo, config_catgo);
        var raza = document.getElementById("raza");
        window.myPie = new Chart(raza, config_raza);
        var sexo = document.getElementById("sexo");
        window.myPie = new Chart(sexo, config_sexo);
    };


    // var areaChartData = {
        //     labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
        //     datasets: [
        //         {
            //             label: "Electronics",
            //             fillColor: "rgba(210, 214, 222, 1)",
            //             strokeColor: "rgba(210, 214, 222, 1)",
            //             pointColor: "rgba(210, 214, 222, 1)",
            //             pointStrokeColor: "#c1c7d1",
            //             pointHighlightFill: "#fff",
            //             pointHighlightStroke: "rgba(220,220,220,1)",
            //             data: [65, 59, 80, 81, 56, 55, 40]
            //         },
            //         {
                //             label: "Digital Goods",
                //             fillColor: "rgba(60,141,188,0.9)",
                //             strokeColor: "rgba(60,141,188,0.8)",
                //             pointColor: "#3b8bba",
                //             pointStrokeColor: "rgba(60,141,188,1)",
                //             pointHighlightFill: "#fff",
                //             pointHighlightStroke: "rgba(60,141,188,1)",
                //             data: [28, 48, 40, 19, 86, 27, 90]
                //         }
                //     ]
                // };

                // var barChartCanvas = $("#barChart").get(0).getContext("2d");
                // var barChart = new Chart(barChartCanvas);
                // var barChartData = areaChartData;
                // barChartData.datasets[1].fillColor = "#00a65a";
                // barChartData.datasets[1].strokeColor = "#00a65a";
                // barChartData.datasets[1].pointColor = "#00a65a";
                // var barChartOptions = {
                    //   //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                    //   scaleBeginAtZero: true,
                    //   //Boolean - Whether grid lines are shown across the chart
                    //   scaleShowGridLines: true,
                    //   //String - Colour of the grid lines
                    //   scaleGridLineColor: "rgba(0,0,0,.05)",
                    //   //Number - Width of the grid lines
                    //   scaleGridLineWidth: 1,
                    //   //Boolean - Whether to show horizontal lines (except X axis)
                    //   scaleShowHorizontalLines: true,
                    //   //Boolean - Whether to show vertical lines (except Y axis)
                    //   scaleShowVerticalLines: true,
                    //   //Boolean - If there is a stroke on each bar
                    //   barShowStroke: true,
                    //   //Number - Pixel width of the bar stroke
                    //   barStrokeWidth: 2,
                    //   //Number - Spacing between each of the X value sets
                    //   barValueSpacing: 5,
                    //   //Number - Spacing between data sets within X values
                    //   barDatasetSpacing: 1,
                    //   //String - A legend template
                    //   legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                    //   //Boolean - whether to make the chart responsive
                    //   responsive: true,
                    //   maintainAspectRatio: true
                    // };
                    //
                    // barChartOptions.datasetFill = false;
                    // barChart.Bar(barChartData, barChartOptions);

                    // Bar Chart Example
                    var ctx = document.getElementById("barChart");
                    var myBarChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                            datasets: [
                            {
                                label: "Usuarios",
                                backgroundColor: "#4ac4df",
                                hoverBackgroundColor: "#45c3d9",
                                borderColor: "#35d0df",
                                data: [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],
                            },
                            {
                                label: "Invitados",
                                backgroundColor: "#65df8a",
                                hoverBackgroundColor: "#81d992",
                                borderColor: "#5adf82",
                                data: [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],
                            },
                            ],
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 25,
                                    bottom: 0
                                },
                                responsive: true
                            },
                            scales: {
                                xAxes: [{
                                    time: {
                                        unit: 'month'
                                    },
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    },
                                    maxBarThickness: 25,
                                }],
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                        padding: 10,
                                        // Include a dollar sign in the ticks
                                        callback: function(value, index, values) {
                                            return value;
                                        }
                                    },
                                    gridLines: {
                                        color: "rgb(234, 236, 244)",
                                        zeroLineColor: "rgb(234, 236, 244)",
                                        drawBorder: false,
                                        borderDash: [2],
                                        zeroLineBorderDash: [2]
                                    }
                                }],
                            },
                            legend: {
                                display: true,
                                position : 'bottom'
                            },
                            tooltips: {
                                titleMarginBottom: 10,
                                titleFontColor: '#6e707e',
                                titleFontSize: 14,
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                                callbacks: {
                                    label: function(tooltipItem, chart) {
                                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                        return datasetLabel + ': ' + tooltipItem.yLabel;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: 'Plazas por Áreas',
                                position : 'bottom'
                            },
                            plugins: {
      datalabels: {
        color: '#333333',
        anchor: 'end',
        align: 'start',
        offset: 0,
        borderWidth: 0,
        borderRadius: 25,
        font: {
          weight: 'bold',
          size: '10'
        },
        formatter: (value) => {
          return (value>7)?value:'';
        }
      }
    }
                        }
                    })

                    // $(document).ready(function () {
                    //     setInterval(function(){
                    //         $("#plazasPorArea").off().on('change',function () {
                    //             alert($(this).val())
                    //         })
                    //     },1000)
                    // })

                </script>
                @endsection
