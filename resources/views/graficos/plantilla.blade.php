<h3>Cantidad de Plazas</h3>
<br>
<!-- div class="container">
    <div class="row">
        <div class="text-center"><h4>Categorías Ocupacionales</h4></div>
        <div class="col-sm">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Etiqueta de final</th>
                        <th scope="col">Cant</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>T</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Total General</td>
                        <td>9</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm">
            <canvas id="cateOcupaGraf" width="40" height="40"></canvas>
        </div>
    </div>
</div -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Categorías ocupacionales</h3>
        </div>
        <div class="clearfix"></div>
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Etiqueta de final</th>
                        <th scope="col">Cant</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>T</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Total General</td>
                        <td>9</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            <canvas id="cateOcupaGraf" width="40" height="40"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Niveles Educacionales</h3>
        </div>
        <div class="clearfix"></div>
        <div class="col"> Tabla </div>
        <div class="col"> Gráfico </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Grupos Escalas</h3>
        </div>
        <div class="col"> Tabla </div>
        <div class="col"> Gráfico </div>
    </div>

</div>


<script>
//$("#contenidoJs").html('Aqui contenido cargado con javascript, este es, está en: <br /><strong>resources/view/graficos/ejemplo.blade.php</strong>')
</script>

<script>
// Las URL
var urlPath1 = 'http://' + window.location.hostname + ':8000/caphum/getGraficos';


// llamadas a la funcion con sus URL, el nombre del id del canvar y el tipo de grafico a formar
ajaxGet(urlPath1, 'cateOcupaGraf', 'pie');

// Funcion de llamado a la URL para obtener los datos y pasarselos al Chartjs
function ajaxGet(urlPath, ID, TipoGrafico){
    var request = $.ajax({
         method: 'GET',
         url: urlPath,
         dataType : "JSON",
     });

   request.done(function(response){
    crearCharjs(response, ID, TipoGrafico);
});
}

// Funcion  para crear el Chartjs según los valores enviados y el id a usar
function crearCharjs(response, id, TipoGrafico){
    console.log(response.sexos);

    var ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
        type: TipoGrafico,
        data: {
            labels: response.sexos,
            datasets: [{
                data: response.valores,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.3)',
                    'rgba(54, 162, 235, 0.3)',
                    'rgba(255, 206, 86, 0.3)',
                    'rgba(75, 192, 192, 0.3)',
                    'rgba(153, 102, 255, 0.3)',
                    'rgba(255, 159, 64, 0.3)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                borderAlign: 'inner'
            }]
        },
        options: {
            responsive: true,
            animation: {
                animateRotate: true,
                animateScale: true
            },
            legend: {
                display: false

            }
        }
    });

}


</script>
