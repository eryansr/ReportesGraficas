@extends('layouts.dace')
  @section('content')

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br>
        <h2 class="page-header">Estadisticas de Inscritos </h2>
  				<div class="panel panel-primary">
  					<div class="panel-heading" style="background: #1e2147;"></div>
              <div class="panel-body">
              <form name="programa" role="form" method="POST" action="">
                  <div class="form-group col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <label for="cod_nuc">Lapso <span class="glyphicon glyphicon-asterisk text-danger" style="font-size:9px;"></span></label>
                    {{ Form::select('lapso', $anios, 'NULL', $attributes =array('class' => 'form-control', 'id'=>'lapso', 'required'=>'required', 'placeholder'=>'2014-II')) }} 
                  </div> 
                  <div class="form-group col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <label>Inscritos año: </label>
                    <input type="text" id="anio_inscri" class="form-control" readonly="true" value="{{$lapsoI + $lapsoII + $lapsoIII}}">
                  </div>
                  <div class="form-group col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <label>Total Inscritos</label>
                    <input type="text" class="form-control" readonly="true" value="{{$inscri}}">
                  </div>  
              </form>
                <canvas id="bar-chart-grouped" width="460" height="250"></canvas>
                  <script type="text/javascript">
                    var lapsoI = parseInt('{{$lapsoI}}');
                    var lapsoII = parseInt('{{$lapsoII}}'); 
                    var lapsoIII = parseInt('{{$lapsoIII}}');  
                    var chart = new Chart(document.getElementById("bar-chart-grouped"), {
                        type: 'bar',
                        data: {
                          labels: [document.getElementById('lapso').value,],
                          datasets: [
                            {
                              label: "Período I",
                              backgroundColor: "#3e95cd",
                              data: [lapsoI]
                            }, {
                              label: "Período II",
                              backgroundColor: "#8e5ea2",
                              data: [lapsoII]
                            }, {
                              label: "Período III",
                              backgroundColor: "#cc4141",
                              data: [lapsoIII]
                            }
                          ]
                        },
                        options: {
                          title: {
                            display: true,
                            text: 'Gráfica de Inscritos por Períodos'
                          }
                        }
                    }); 
                  </script>
  						</div>
  				</div>
  		</div>
  	</div>

@stop

@section('postscript')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#lapso").change(function lapso(consulta){
        consulta.preventDefault();
        $.ajax({
          type: 'POST',
          url :  "{{URL::action('DaceController@postEstadisticasinscritos')}}",
          data: $('#lapso').serialize(),
          success: function(response){
            console.log(response)
            chart.data.datasets[0].data = [response.lapsoI]
            chart.data.datasets[1].data = [response.lapsoII]
            chart.data.datasets[2].data = [response.lapsoIII]
            chart.data.labels = [$("#lapso").val(),]
            chart.update();

            $('#anio_inscri').val(response.lapsoI + response.lapsoII + response.lapsoIII)
          }
        })
      })
    });
  </script>

@stop
