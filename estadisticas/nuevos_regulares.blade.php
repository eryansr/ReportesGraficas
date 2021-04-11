@extends('layouts.dace')
	@section('content')

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2 class="page-header">Gráficos y Estadisticas de Estudiantes Nuevos / Regulares</h2>
      </div>
    </div>
 
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br>
        <div class="panel panel-primary">
          <div class="panel-heading" style="background: #1e2147;"></div>
          <div class="panel-body">
            <!-- buscardor de lapso academico  -->
            <form name="programa" role="form" method="POST" action="">
                  <div class="form-group col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <label for="cod_nuc">Lapso <span class="glyphicon glyphicon-asterisk text-danger" style="font-size:9px;"></span></label>
                    {{ Form::select('lapso', $lapso, 'NULL', $attributes =array('class' => 'form-control', 'id'=>'lapso', 'required'=>'required', 'placeholder'=>'2014-II')) }} 
                  </div>
                  <div class="form-group col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <label>Total Regulares</label>
                    <input type="text" class="form-control" readonly="true" value="{{$regulares}}">
                  </div>
                  <div class="form-group col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <label>Total Nuevos</label>
                    <input type="text" id="new" class="form-control" readonly="true" value="{{$nuevos}}">
                  </div>
                  <div class="card-body">
                    <label></label><br>
                    <a href="#modal1" type="button" class="btn btn-info btn-sx" data-toggle="modal">Graficar</a>
                  </div>  
            </form>
            <!-- fin buscardor de lapso academico  -->  
            
          </div>
        </div>
      </div>
    </div>

    <div class="row">
    	<div class="col-lg-4">
          <!-- Example Pie Chart Card-->   
          <div class="container">
            <!-- Modal -->
              <div class="modal fade" id="modal1" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Gráfica Nuevos / Regulares</h4>
                    </div>
                    <div class="modal-body">
                       <div class="row">
                        <canvas id="pie-chart" width="600" height="450"></canvas>
                        <script type="text/javascript">
                          var nuevos = parseInt('{{$nuevos}}');
                          var regulares = parseInt('{{$regulares}}');
                          var chart = new Chart(document.getElementById("pie-chart"), {
                                  type: 'pie',
                                  data: {
                                    labels: ["Regulares", "Nuevos"],
                                    datasets: [{
                                      label: "Population (millions)",
                                      backgroundColor: ["#eb8d5e", "#1e2147"],
                                      data: [regulares,nuevos]
                                    }]
                                  },
                                  options: {
                                    title: {
                                      display: true,
                                      text: 'Estadísticas de Nuevos / Regulares'
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
                </div>
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
          url :  "{{URL::action('DaceController@postEstadisticasestudiantes')}}",
          data: $('#lapso').serialize(),
          dataType    : 'json',
          success: function(response){
            console.log(response);
            chart.data.datasets[0].data = [response.regulares,response.seleccionar]
            chart.update();

            $('#new').val(response.seleccionar)
          }
        })
      })
    });
  </script>

@stop
