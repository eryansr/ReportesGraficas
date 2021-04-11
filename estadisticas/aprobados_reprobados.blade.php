@extends('layouts.dace')
  @section('content')

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h2 class="page-header">Graficos de Estudiantes Aprobados / Reprobados</h2>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br>
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #1e2147;"><h4>Aprobados / Reprobados </h4></div>
              <div class="panel-body">
                <form name="programa" role="form" method="POST" action="">
                  <div class="form-group col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <label for="cod_nuc">Lapso <span class="glyphicon glyphicon-asterisk text-danger" style="font-size:9px;"></span></label>
                    {{ Form::select('lapso', $lapso, 'NULL', $attributes =array('class' => 'form-control', 'id'=>'lapso', 'required'=>'required', 'placeholder'=>'2014-II')) }} 
                  </div>
                  <div class="form-group col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <label>Total Aprobados</label>
                    <input type="text" class="form-control" readonly="true" id="apro" value="">
                  </div>
                  <div class="form-group col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <label>Total Reprobados</label>
                    <input type="text" class="form-control" readonly="true" id="repro" value="">
                  </div>  
                </form>
                <form name="" role="form" method="POST" action="#" target="_blank">  
                  <div class="card-body">
                    <label for="cod_nuc"><span  style="font-size:9px;"></span></label><br>
                    <a href="#modal1" type="button" class="btn btn-info btn-sx" data-toggle="modal">Graficar</a>
                  </div>
                </form> 
              </div>
            </div>
        </div>  
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modal1" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Grafica Aprobados / Reprobados</h4>        
        </div>
         <!--  modal con la grafica  -->
          <div class="modal-body">
            <div class="row">
                <canvas id="myChart" width="500" height="400"></canvas>
                <script>
                  var  aprobados = parseInt('{{$aprobados}}'); 
                  var  reprobados = parseInt('{{$reprobados}}'); 
                  var ctx = document.getElementById('myChart');
                  var myChart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: ['Aprobados', 'Reprobados'],
                          datasets: [{
                              label: 'Estudiantes',
                              data: [aprobados, reprobados],
                              backgroundColor: [
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 99, 132, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 99, 132, 1)'
                              ],
                              borderWidth: 1
                          }]
                      },
                      options: {
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero: true
                                  }
                              }]
                          }
                      }
                  });
                </script>
            </div>    
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
      </div>
    </div>s
  </div>

@stop


@section('postscript')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#lapso").change(function lapso(consulta){
        consulta.preventDefault();
        $.ajax({
          type: 'POST',
          url :  "{{URL::action('DaceController@postEstadisticasaprobados')}}",
          data: $('#lapso').serialize(),
          success: function(response){
            console.log(response);
            myChart.data.datasets[0].data = [response.aprobados,response.reprobados]
            myChart.update();

            $('#apro').val(response.aprobados)
            $('#repro').val(response.reprobados)
            
          }
        })
      })
    });
  </script>

@stop


