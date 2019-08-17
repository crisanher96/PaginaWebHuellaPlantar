@extends('plantilla.principal')
@section('titulo','Gestion de Informes')
@section('contenido')
<?php 
use \HuellaPlantar\Http\Controllers\DeporteController;
use \HuellaPlantar\Http\Controllers\CategoriaDeportivaController;
use \HuellaPlantar\Http\Controllers\ProfesionController;
?>
<script src="/code/highcharts.js"></script>
<script src="/code/highcharts-3d.js"></script>
<script src="/code/modules/exporting.js"></script>
<script src="/code/modules/export-data.js"></script>


<div class="container">
    <p><h3>Gestión de informes: </h3></p>
    <br>
     <hr />
    <form class="form-group" method="POST" action="/fil-informe">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <select name="id_deporte" class="form-control">
                        <?php $data_temp=DeporteController::showactives();?>
                        <option value="0">All</option>
                        @foreach ($data_temp as $deporte)
                            <option value="{{$deporte->id_deporte}}">{{$deporte->nombre_deporte}}</option>
                        @endforeach
                    </select>  
                </div>
                 <div class="col">
                    <select name="id_cat_dep" class="form-control">
                        <?php $data_temp=CategoriaDeportivaController::showactives();?>
                        <option value="0">All</option>
                        @foreach ($data_temp as $categoria)
                            <option value="{{$categoria->id_cat_dep}}">{{$categoria->nombre_cat_dep}}</option>
                        @endforeach
                    </select>            
                </div>
                 <div class="col">
                    <select name="id_profesion" class="form-control">
                        <?php $data_temp=ProfesionController::showactives();?>
                        <option value="0">All</option>
                        @foreach ($data_temp as $profesion)
                            <option value="{{$profesion->id_profesion}}">{{$profesion->nombre_profesion}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" style="background-color: #0E6655">Filtrar</button>
                </div>

                
            </div>
        </div>
    </form>
    <hr />
    <br>
    <div class="row">
        <div class="col text-center">
            <div id="gra_izq" ></div>  
        </div>
        <div class="col text-center">
            <table class="table text-left">
                <thead>
                    <tr>
                        <th scope="col">Clasificación</th>
                        <th scope="col">Numero de Pacientes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Plano</td>
                        <td>{{$data['pl_izq']}}</td>
                    </tr>
                    <tr>
                       <td>Plano/Normal</td>
                        <td>{{$data['plno_izq']}}</td>
                    </tr>
                    <tr>
                        <td>Normal</td>
                        <td>{{$data['no_izq']}}</td>
                    </tr>
                    <tr>
                        <td>Normal/Cavo</td>
                        <td>{{$data['noca_izq']}}</td>
                    </tr>
                    <tr>
                        <td>Cavo</td>
                        <td>{{$data['ca_izq']}}</td>
                    </tr>
                    <tr>
                        <td>Cavo/Fuerte</td>
                        <td>{{$data['cafu_izq']}}</td>
                    </tr>
                    <tr>
                        <td>Cavo/Extremo</td>
                        <td>{{$data['caex_izq']}}</td>
                    </tr>
                    <tr>
                        <?php $total_izq=$data['pl_izq']+$data['plno_izq']+$data['no_izq']+$data['noca_izq']+$data['ca_izq']+$data['cafu_izq']+$data['caex_izq']; ?>
                        <th scope="row">Total</th>
                        <td>{{$total_izq}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col text-center">
             <div id="gra_der" ></div>
        </div>
        <div class="col text-center">
            <table class="table text-left">
                <thead>
                    <tr>
                        <th scope="col">Clasificación</th>
                        <th scope="col">Numero de Pacientes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Plano</td>
                        <td>{{$data['pl_der']}}</td>
                    </tr>
                    <tr>
                       <td>Plano/Normal</td>
                        <td>{{$data['plno_der']}}</td>
                    </tr>
                    <tr>
                        <td>Normal</td>
                        <td>{{$data['no_der']}}</td>
                    </tr>
                    <tr>
                        <td>Normal/Cavo</td>
                        <td>{{$data['noca_der']}}</td>
                    </tr>
                    <tr>
                        <td>Cavo</td>
                        <td>{{$data['ca_der']}}</td>
                    </tr>
                    <tr>
                        <td>Cavo/Fuerte</td>
                        <td>{{$data['cafu_der']}}</td>
                    </tr>
                    <tr>
                        <td>Cavo/Extremo</td>
                        <td>{{$data['caex_der']}}</td>
                    </tr>
                    <tr>
                        <?php $total_der=$data['pl_der']+$data['plno_der']+$data['no_der']+$data['noca_der']+$data['ca_der']+$data['cafu_der']+$data['caex_der']; ?>
                        <th scope="row">Total</th>
                        <td>{{$total_der}}</td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <div id="col_izq" ></div>  
        </div>
         <div class="col text-center">
            <div id="col_der" ></div>  
        </div>
    </div>
</div>



<script type="text/javascript">
Highcharts.setOptions({
    colors: ['#3498DB', '#FF8C00', '#32CD32', '#E74C3C', '#FFFF00', '#008B8B','#9400D3']
});

Highcharts.chart('gra_izq', {
    chart: {
        backgroundColor: 'rgba(0,0,0,0)',
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 60,
            beta: 0
        }
    },
    credits: {
      enabled: false
    },
    title: {
        text: 'Clasificación de la Huella Plantar - Pie Izquierdo'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 40,
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    exporting: {
    	buttons: {
            contextButton: {
                menuItems: ['printChart','downloadPNG','downloadJPEG','downloadPDF','downloadCSV']

            }
        }
    },
    lang: {
    printChart: 'Imprimir Grafico',
    downloadPNG: 'Descargar PNG',
    downloadJPEG: 'Descargar JPEG',
    downloadPDF: 'Descargar PDF',
    downloadCSV: 'Descargar CSV',
    contextButtonTitle: 'Menu',
	},
    series: [{
        name: 'Porcentaje',
        colorByPoint: true,
        data: [
        {
            name: 'Plano',
            y: {{$data['pl_izq']}}
        }, 
        {
            name: 'Plano/Normal',
            y: {{$data['plno_izq']}}
        }, 
        {
            name: 'Normal',
            y: {{$data['no_izq']}}
        }, 
        {
            name: 'Normal/Cavo',
            y: {{$data['noca_izq']}}
        }, 
        {
            name: 'Cavo',
            y: {{$data['ca_izq']}}
        }, 
        {
            name: 'Cavo Fuerte',
            y: {{$data['cafu_izq']}}
        }, 
        {
            name: 'Cavo Extremo',
            y: {{$data['caex_izq']}}
        }
        ]
    }]
});


Highcharts.chart('gra_der', {
    chart: {
        backgroundColor: 'rgba(0,0,0,0)',
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 60,
            beta: 0
        }
    },
    credits: {
      enabled: false
    },
    title: {
        text: 'Clasificación de la Huella Plantar - Pie Derecho'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 40,
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    exporting: {
        buttons: {
            contextButton: {
                menuItems: ['printChart','downloadPNG','downloadJPEG','downloadPDF','downloadCSV']

            }
        }
    },
    lang: {
    printChart: 'Imprimir Grafico',
    downloadPNG: 'Descargar PNG',
    downloadJPEG: 'Descargar JPEG',
    downloadPDF: 'Descargar PDF',
    downloadCSV: 'Descargar CSV',
    contextButtonTitle: 'Menu',
    },
    series: [{
        name: 'Porcentaje',
        colorByPoint: true,
        data: [
        {
            name: 'Plano',
            y: {{$data['pl_der']}}
        }, 
        {
            name: 'Plano/Normal',
            y: {{$data['plno_der']}}
        }, 
        {
            name: 'Normal',
            y: {{$data['no_der']}}
        }, 
        {
            name: 'Normal/Cavo',
            y: {{$data['noca_der']}}
        }, 
        {
            name: 'Cavo',
            y: {{$data['ca_der']}}
        }, 
        {
            name: 'Cavo Fuerte',
            y: {{$data['cafu_der']}}
        }, 
        {
            name: 'Cavo Extremo',
            y: {{$data['caex_der']}}
        }
        ]
    }]
});


Highcharts.chart('col_izq', {
    chart: {
         backgroundColor: 'rgba(0,0,0,0)',
        type: 'column'
    },
    credits: {
      enabled: false
    },
    title: {
        text: 'Clasificación de la Huella Plantar - Pie Izquierdo'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'sans-serif'
            }
        }
    },
     exporting: {
        buttons: {
            contextButton: {
                menuItems: ['printChart','downloadPNG','downloadJPEG','downloadPDF','downloadCSV']

            }
        }
    },
    lang: {
    printChart: 'Imprimir Grafico',
    downloadPNG: 'Descargar PNG',
    downloadJPEG: 'Descargar JPEG',
    downloadPDF: 'Descargar PDF',
    downloadCSV: 'Descargar CSV',
    contextButtonTitle: 'Menu',
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Numero de Pacientes'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Numero de Pacientes: <b>{point.y:.1f}</b>'
    },
    series: [{
        name: 'Population',
        data: [
            ['Plano', {{$data['pl_izq']}}],
            ['Normal/Plano', {{$data['plno_izq']}}],
            ['Normal', {{$data['no_izq']}}],
            ['Normal/Cavo', {{$data['noca_izq']}}],
            ['Cavo', {{$data['ca_izq']}}],
            ['Cavo Fuerte', {{$data['cafu_izq']}}],
            ['Cavo Extremo', {{$data['caex_izq']}}]
        ],
        color: '#32CD32'
    }]
});

Highcharts.chart('col_der', {
    chart: {
         backgroundColor: 'rgba(0,0,0,0)',
        type: 'column'
    },
    credits: {
      enabled: false
    },
    title: {
        text: 'Clasificación de la Huella Plantar - Pie Derecho'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'sans-serif'
            }
        }
    },
     exporting: {
        buttons: {
            contextButton: {
                menuItems: ['printChart','downloadPNG','downloadJPEG','downloadPDF','downloadCSV']

            }
        }
    },
    lang: {
    printChart: 'Imprimir Grafico',
    downloadPNG: 'Descargar PNG',
    downloadJPEG: 'Descargar JPEG',
    downloadPDF: 'Descargar PDF',
    downloadCSV: 'Descargar CSV',
    contextButtonTitle: 'Menu',
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Numero de Pacientes'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Numero de Pacientes: <b>{point.y:.1f}</b>'
    },
    series: [{
        name: 'Population',
        data: [
            ['Plano', {{$data['pl_der']}}],
            ['Normal/Plano', {{$data['plno_der']}}],
            ['Normal', {{$data['no_der']}}],
            ['Normal/Cavo', {{$data['noca_der']}}],
            ['Cavo', {{$data['ca_der']}}],
            ['Cavo Fuerte', {{$data['cafu_der']}}],
            ['Cavo Extremo', {{$data['caex_der']}}]
        ],
        color: '#FF8C00'
    }]
});
</script>


@endsection('contenido')