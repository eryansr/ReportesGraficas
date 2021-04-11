<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>{{ $title }} - Zona DACE UBA</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		{{ HTML::style('css/normalize.css')}}
		{{ HTML::style('css/main.css')}}
		{{ HTML::style('css/custom-min.css')}}
		{{ HTML::style('css/prettyPhoto.css')}}
		{{ HTML::style('css/bootstrap.min.css')}}
		{{ HTML::style('css/bootstrap.css')}}
		{{ HTML::style('css/panel/metisMenu.css')}}
		{{ HTML::style('css/panel/timeline.css')}}
		{{ HTML::style('css/panel/sb-admin-2.css')}}
		{{ HTML::style('css/estilo.css')}}
		{{ HTML::style('css/font-awesome/css/font-awesome.css')}}
		{{ HTML::script('js/Chart.min.js')}}
		{{ HTML::script('js/Chart.js')}}

		@yield('css')
		<style type="text/css" media="screen">
			a{
				color: #ffffff;
			}
		</style>
		<link rel="shortcut icon" href="{{ URL::to('images/favicon.ico')}}">
	</head>

	<body>
		<div id="wrapper">
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
						<a class="navbar-brand" href="{{ URL::to('dace/inicio') }}"><img src="{{ URL::to('/images/uba.png') }}" width="40px" style="margin-top: -10px; display: inline"> Zona D.A.C.E. - UBA</a>
				</div>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #1e2147;">
							<i class="fa fa-user fa-fw"></i> {{ Session::get('nombre') }}  {{ Session::get('apellido') }} <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<!--<li>
								<a href="{{ URL::to('dace/datosusuario') }}"><i class="fa fa-user fa-fw"></i> Perfil</a>
							</li>-->
							<li>
								<a href="{{ URL::to('dace/password') }}"><i class="fa fa-cog fa-fw"></i> Cambiar Contrase&ntilde;a</a>
							</li>
							@if(Session::get('tipo_usuario')==0 || Session::get('tipo_usuario')==1)
							<li>
								<a href="{{ URL::to('dace/auditoria') }}"><i class="fa fa-info fa-fw"></i> Auditoría</a>
							</li>
							@endif
							<li class="divider"></li>
							<li>
								<a href="{{ URL::to('dace/exit') }}"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
							</li>
						</ul>
					</li>
				</ul>

				<div class="navbar-default sidebar" role="navigation" style="background: #1e2147;">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">

							<li>
								<a href="" style="background: #1e2147;"> <strong>Lapso Activo =</strong>  <span class="rojo">{{DB::table('tbl_configuraciones')->pluck('lapso_activo')}}</span></a>
							</li>

							<li><a href="{{ URL::to('dace/inicio') }}"style="background: #1e2147;"><strong><i class="fa fa-home fa-fw"></i> Inicio</strong></a></li>
							@if(Session::has('sesion_info_dace') && Session::get('sesion_info_dace')==true)
								<li>
									<a href="#"><i class="fa fa-info-circle fa-fw"></i> Inform&aacute;tica <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li><a href="{{ URL::to('informatica/usuarios') }}">Usuarios</a></li>
									</ul>
								</li>

							@endif

							@if(Session::get('tipo_usuario')==0 || Session::get('tipo_usuario')==1)
								
								<li>
									<a href="#" style="background: #1e2147;"><strong><i class="fa fa-search fa-fw"></i> Consultas <span class="fa arrow"></span></strong></a>
									<ul class="nav nav-second-level">
										<li>
											<a href="{{ URL::to('dace/buscarparticipante') }}">Participante</a>
										</li>

										<li>
											<a href="{{URL::to('dace/buscarfacilitador') }}">Facilitador</a>
										</li>

										<li>
											<a href="{{URL::to('dace/consultascalificaciones') }}">Calificaciones</a>
										</li>
										<li>
											<a href="{{ URL::to('dace/estudiantesreinscritos') }}">Horario</a>
										</li>
									</ul>
								</li>

								<li>
									<a href="#" style="background: #1e2147;"><strong><i class="fa fa-cogs fa-fw"></i> Procesos Academicos<span class="fa arrow"></span></strong></a>
									<ul class="nav nav-second-level">
										<li>
											<a href="{{ URL::to('dace/estudiantespreinscritos') }}">Preinscripciones</a>
										</li>
										<li>
											<a href="{{ URL::to('dace/preinscripcionparticipante') }}">Preinscribir Participante</a>
										</li>
										<li>
											<a href="#" style="background: #1e2147;">Ratificaci&oacute;n <span class="fa arrow"></span></a>
											<ul>
												<li style="padding: 5px;">
													<a href="{{ URL::to('dace/inscripcionparticipante') }}">Por Participantes</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="{{ URL::to('dace/ofertaacademica') }}">Oferta Acad&eacute;mica</a>
										</li>
										<li>
											<a href="{{ URL::to('dace/cargadocente') }}">Carga Docente</a>
										</li>
										<li>
											<a href="#">Convalidación <span class="fa arrow"></span></a>
											<ul>
												<li style="padding: 5px;">
													<a href="{{ URL::to('dace/convalidacion') }}">Individual</a>
												</li>
											</ul>
										</li>
										<li>
											<li style="padding: 5px;">
												<a href="{{ URL::to('dace/solicitudeserviciosacademicos') }}">Solicitudes de Servicios Acádemicos</a>
											</li>
										</li>
										</ul>
									</li>
									<li>
										<a href="#" style="background: #1e2147;" ><strong><i class="fa fa-list-alt fa-fw"></i> Base de Datos <span class="fa arrow"></span></strong></a>
										<ul class="nav nav-second-level"> 
											<li>
												<a href="{{ URL::to('dace/creacionprogramas') }}">Cargar Programas</a>
											</li>
											<li>
												<a href="{{ URL::to('dace/pensum') }}">Cargar Pensum</a>
											</li>
											<li>
												<a href="{{ URL::to('dace/creacionmateria') }}">Cargar Materias</a>
											</li>
											<li>
												<a href="{{ URL::to('dace/cargarprofesores') }}">Cargar Facilitador</a>
											</li>
											<li>
												<a href="{{ URL::to('informatica/usuarios') }}">Cargar Usuarios</a>
											</li>
											<li>
												<a href="{{ URL::to('dace/periodo') }}">Configuraci&oacute;n del Periodo</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#" style="background: #1e2147;"><strong><i class="fa fa-file-text fa-fw"></i> Reportes <span class="fa arrow"></span></strong></a>
										<ul class="nav nav-second-level">
											<li>
												<a href="#">Graficas / Estadisticas <span class="fa arrow"></span></a>
												<ul>
													<li style="padding: 5px;">
														<a href="{{ URL::to('dace/estadisticasestudiantes') }}">Nuevos / Regulares</a>
													</li>
													<li style="padding: 5px;">
														<a href="{{ URL::to('dace/estadisticasinscritos') }}">Inscritos</a>
													</li>
													<li style="padding: 5px;">
														<a href="{{ URL::to('dace/estadisticasaprobados') }}">Aprobados / Reprobados</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="{{ URL::to('dace/estudiantesinscritos') }}">Reporte Ratificados</a>
											</li>
											<li>
												<a href="{{ URL::to('dace/buscartotalpreins') }}">Reportes Preinscritos</a>
											</li>
											<li>
												<a href="{{ URL::to('dace/buscarpensum') }}">Reporte Pensum</a>
											</li>
											<li>
												<a href="{{ URL::to('dace/estadisticasreinscritos') }}">Estadisticas de Ratificaciones</a>
											</li>
											<li>
												<a href="{{ URL::to('dace/constanciasdeestudio') }}">Servicios Acad&eacute;micos</a>
											</li>
										</ul>
									</li>
										
								<!--
							<li>
									<a href="#" style="background: #1e2147;"><strong><i class="fa fa-list-alt fa-fw"></i> Admisi&oacute;n <span class="fa arrow"></span></strong></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/estudiantespreinscritos') }}">Preinscripciones</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/reportesadmision') }}">Reportes</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/carnetizacion') }}">Carnetización</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="#" style="background: #1e2147;" ><strong><i class="fa fa-list-alt fa-fw"></i> Base de Datos <span class="fa arrow"></span></strong></a>
								<ul class="nav nav-second-level">
									 <li>
										<a href="{{ URL::to('dace/estudiantesinscritos') }}">Estudiante <span class="fa arrow"></span></a>
										<ul>
										<li style="padding: 5px;"><a href="#">Datos Personales</a></li>
										<li style="padding: 5px;"><a href="#">Inscripciones</a></li>
										<li style="padding: 5px;"><a href="#">Calificaciones</a></li>
									</ul>
									</li> 
									<li>
										<a href="{{ URL::to('dace/creacionprogramas') }}">Cargar Programas</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/pensum') }}">Cargar Pensum</a>
									</li>
									 <li>
										<a href="{{ URL::to('dace/creacionmateria') }}">Cargar Materias</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/cargarprofesores') }}">Cargar Facilitador</a>
									</li>
									<li>
										<a href="{{ URL::to('informatica/usuarios') }}">Cargar Usuarios</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/matrizconvalidacion') }}">Matrices de Validac&oacute;n</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" style="background: #1e2147;"><strong><i class="fa fa-pencil-square fa-fw"></i> Periodos Acad&eacute;micos <span class="fa arrow"></span></strong></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/ofertaacademica') }}">Oferta Acad&eacute;mica</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/periodo') }}">Configuraci&oacute;n del Periodo</a>
									</li>
									<li>
										<a href="#">Oferta de Secciones</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/solvencia') }}">Solvencia de documentos</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" style="background: #1e2147;"><strong><i class="fa fa-cogs fa-fw"></i> Procesos Academicos<span class="fa arrow"></span></strong></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="#" style="background: #1e2147;">Ratificaci&oacute;n <span class="fa arrow"></span></a>
									<ul>
										<li style="padding: 5px;">
											<a href="{{ URL::to('dace/inscripcionparticipante') }}">Por Participantes</a>
										</li>
										<li style="padding: 5px;">
											<a href="{{ URL::to('dace/ratificaciongrupal') }}">Grupal</a>
										</li>

									</ul>
									</li>

									<li>
										<a href="{{ URL::to('dace/estudiantesreinscritos') }}">Horario</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/acreditacion') }}">Acreditación</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/emisiondeacta') }}">Emisión de Acta</a>
									</li>

									<li>
										<a href="{{ URL::to('dace/cargadocente') }}">Carga Docente</a>
									</li>

									<li>
										<a href="#">Convalidación <span class="fa arrow"></span></a>
										<ul>
											<li style="padding: 5px;">
												<a href="{{ URL::to('dace/convalidacion') }}">Individual</a>
											</li>
											<li style="padding: 5px;">
												<a href="{{ URL::to('dace/convalidaciongrupal') }}">Grupal</a>
											</li>

										</ul>
									</li>
									<li>
										<a href="{{ URL::to('dace/matriculacionparticipante') }}">Matriculaci&oacute;n de Participantes</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/crearmovimiento') }}">Crear Movimientos</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/vermovimientos') }}">Ver Movimientos</a>
									</li>
									
									<li>
										<a href="{{ URL::to('dace/estudiantesautorizado') }}">Autorizar Estudiantes</a>
									</li> 
									<li style="padding: 5px;">
										<a href="{{ URL::to('dace/ratificaciongrupal') }}">Grupal</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" style="background: #1e2147;"><strong><i class="fa fa-file-text fa-fw"></i> Reportes <span class="fa arrow"></span></strong></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/estudiantesinscritos') }}">Reporte Ratificados</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/buscarpensum') }}">Reporte Pensum</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/calificacionesreporte') }}">S&aacute;bana de Calificaciones</a>
									</li>
									
									<li>
										<a href="{{ URL::to('dace/estadisticasconvenios') }}">Estadisticas de Convenios</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/estadisticasreinscritos') }}">Estadisticas de Ratificaciones</a>
									</li>
									<li>
										<a href="#">Provisional-Asistencia</a>
									</li>
									<li>
										<a href="#">Activos-Inactivos-Egresados</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" style="background: #1e2147;"><strong><i class="fa fa-search fa-fw"></i> Consultas <span class="fa arrow"></span></strong></a>
								<ul class="nav nav-second-level">
										<li >
											<a href="{{ URL::to('dace/buscarparticipante') }}">Participante</a>
										</li>

									<li>
										<a href="{{URL::to('dace/buscarfacilitador') }}">Facilitador</a>
									</li>

									 <li>
										<a href="{{URL::to('dace/consultascalificaciones') }}">Calificaciones</a>
									</li>
									<li>
									<li>
										<a href="{{URL::to('dace/cargarprofesores') }}">Agregar Profesor</a>
									</li>

										<a href="{{ URL::to('dace/graduandosdefinitivos') }}">Graduandos Definitivos</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/reporteegresados') }}">Egresados</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/emisionservicios') }}">Emisi&oacute;n de Servicios</a>
									</li>

								</ul>
							</li>
							<li>
								<a href="#" style="background: #1e2147;"><strong><i class="fa fa-user fa-fw"></i> Aula Virtual <span class="fa arrow"></span></strong></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/generarcodigo') }}">Codificación</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/matriculacion') }}">Matriculaci&oacute;n General</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{ URL::to('dace/constanciasdeestudio') }}"><strong><i class="fa fa-folder fa-fw"></i> Servicios Acad&eacute;micos</strong></a>
							</li>
							<li>
								<a href="#" style="background: #1e2147;"><strong><i class="fa fa-archive fa-fw"></i> Archivos Originales <span class="fa arrow"></span></strong></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/creaciondocumento') }}">Codificaci&oacute;n Documentos</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/controldocumento') }}">Control de Documentos</a>
									</li>
									 <li>
										<a href="{{ URL::to('dace/solvenciaarchivosoriginales') }}">Emisión de Solvencia</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/preinscripcionparticipante') }}">Preinscripcion Participantes</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/busquedapreinscritos') }}">Datos Participantes </a>
									</li>

									<li>
										<a href="{{ URL::to('dace/buscartotalpreins') }}">Imprimir Reportes </a>
									</li>

									<li>
										<a href="#">Reporte de Participantes con Relaci&oacute;n Documentos</a>
									</li>
									<li>
										<a href="#">Reporte de Participantes Parametrizados</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" style="background: #1e2147;"><strong><i class="fa fa-graduation-cap fa-fw"></i> Unidad de Grado <span class="fa arrow"></span></strong></a>
								<ul class="nav nav-second-level">
								  <li>
									<a href="{{ URL::to('dace/serviciosgraduandos') }}">Servicios Academicos</a>
								  </li>
									<li>
										<a href="{{ URL::to('dace/graduandos') }}">Listado de Graduandos</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/egresados') }}">Listado de Egresados</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/acomodarposicion') }}">Actualizar Graduandos</a>
									</li>
									
									<li>
										<a href="{{ URL::to('dace/listadoestudiantestesis') }}">Listado Estudiantes Tesis</a>
									</li> 
								</ul>
							</li>-->

							@endif

							   @if(Session::get('tipo_usuario')==2)
							<li>
								<a href="#"><i class="fa fa-list-alt fa-fw"></i> Base de Datos <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									 <li>
										<a href="{{ URL::to('dace/estudiantesinscritos') }}">Estudiante <span class="fa arrow"></span></a>
										<ul>
										<li style="padding: 5px;"><a href="#">Datos Personales</a></li>
										<li style="padding: 5px;"><a href="#">Inscripciones</a></li>
										<li style="padding: 5px;"><a href="#">Calificaciones</a></li>
									</ul>
									</li> -->
									<li>
										<a href="{{ URL::to('dace/creacionprogramas') }}">Cargar Programas</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/pensum') }}">Cargar Pensum</a>
									</li>
									 <li>
										<a href="{{ URL::to('dace/creacionmateria') }}">Cargar Materias</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-pencil-square fa-fw"></i> Periodos Acad&eacute;micos <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/ofertaacademica') }}">Oferta Acad&eacute;mica</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/periodo') }}">Configuraci&oacute;n del Periodo</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="#"><i class="fa fa-cogs fa-fw"></i> Procesos <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">

									<li>
										<a href="{{ URL::to('dace/estudiantesreinscritos') }}">Horario</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/acreditacion') }}">Acreditación</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/emisiondeacta') }}">Emisión de Acta</a>
									</li>
									<li>
										<a href="#">Convalidación <span class="fa arrow"></span></a>
										<ul>
											<li style="padding: 5px;">
												<a href="{{ URL::to('dace/convalidacion') }}">Individual</a>
											</li>
											<li style="padding: 5px;">
												<a href="{{ URL::to('dace/convalidaciongrupal') }}">Grupal</a>
											</li>

										</ul>
									</li>
									
									<li>
										<a href="{{ URL::to('dace/estudiantesautorizado') }}">Autorizar Estudiantes</a>
									</li>-->
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-file-text fa-fw"></i> Reportes <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/estudiantesinscritos') }}">Reporte Ratificados</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/buscarpensum') }}">Reporte Pensum</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/calificacionesreporte') }}">S&aacute;bana de Calificaciones</a>
									</li>
									
									<li>
										<a href="{{ URL::to('dace/estadisticasconvenios') }}">Estadisticas de Convenios</a>
									</li> -->
									<li>
										<a href="{{ URL::to('dace/estadisticasreinscritos') }}">Estadisticas de Ratificaciones</a>
									</li>
									<li>
										<a href="#">Provisional-Asistencia</a>
									</li>
									<li>
										<a href="#">Activos-Inactivos-Egresados</a>
									</li>-->
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-search fa-fw"></i> Consultas <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
										<li>
											<a href="{{ URL::to('dace/buscarparticipante') }}">Participantes</a>
										</li>
									
									<li>
										<a href="{{URL::to('dace/consultasfaci') }}">Facilitador</a>
									</li>-->

									<li>
										<a href="{{URL::to('dace/buscarfacilitador') }}">Facilitador</a>
									</li>

									 <li>
										<a href="{{URL::to('dace/consultascalificaciones') }}">Calificaciones</a>
									</li>
									<li>
									<li>
										<a href="{{URL::to('dace/cargarprofesores') }}">Agregar Profesor</a>
									</li>

										<a href="{{ URL::to('dace/graduandosdefinitivos') }}">Graduandos Definitivos</a>
									</li>-->
									<li>
										<a href="{{ URL::to('dace/reporteegresados') }}">Egresados</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/emisionservicios') }}">Emisi&oacute;n de Servicios</a>
									</li>-->

								</ul>
							</li>

							<li>
								<a href="#"><i class="fa fa-database fa-fw"></i> Administraci&oacute;n de Datos <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="#">Carreras-Programas</a>
									</li>

									<li>
										<a href="#">Materias</a>
									</li>-->
									<li>
										<a href="{{ URL::to('dace/matrizconvalidacion') }}">Matrices de Validac&oacute;n</a>
									</li>

									<li>
										<a href="#">Ratificaci&oacute;n <span class="fa arrow"></span></a>
									<ul>
										<li style="padding: 5px;">
											<a href="{{ URL::to('dace/inscripcionparticipante') }}">Por Participantes</a>
										</li>
										<li style="padding: 5px;">
											<a href="{{ URL::to('dace/ratificaciongrupal') }}">Grupal</a>
										</li>

									</ul>
									</li>

									<li>
										<a href="{{ URL::to('dace/busquedapreinscritos') }}">Datos Participantes </a>
									</li>
									<li>
										<a href="{{ URL::to('dace/matriculacionparticipante') }}">Matriculaci&oacute;n de Participantes</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{ URL::to('dace/constanciasdeestudio') }}"><i class="fa fa-folder fa-fw"></i> Servicios Acad&eacute;micos</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-archive fa-fw"></i> Archivos Originales <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/controldocumento') }}">Control de Documentos</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-graduation-cap fa-fw"></i> Unidad de Grado <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
								  <li>
									<a href="{{ URL::to('dace/serviciosgraduandos') }}">Servicios Academicos</a>
								  </li>
									<li>
										<a href="{{ URL::to('dace/graduandos') }}">Listado de Graduandos</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/egresados') }}">Listado de Egresados</a>
									</li>
								</ul>
							</li>

							@endif

							   @if(Session::get('tipo_usuario')==3)
							<li>
								<a href="#"><i class="fa fa-archive fa-fw"></i> Archivos Originales <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/creaciondocumento') }}">Codificaci&oacute;n Documentos</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/controldocumento') }}">Control de Documentos</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/solvencia') }}">Solvencia de documentos</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/preinscripcionparticipante') }}">Preinscripcion Participantes</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/busquedapreinscritos') }}">Datos Participantes Lapso activo</a>
									</li>
									<li >
										<a href="{{ URL::to('dace/buscarparticipante') }}">Datos general de Participantes</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/solvenciaarchivosoriginales') }}">Emisión de Solvencia</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/buscartotalpreins') }}">Imprimir Reportes </a>
									</li>
									<!--<li>
										<a href="#">Reporte de Participantes con Relaci&oacute;n Documentos</a>
									</li>
									<li>
										<a href="#">Reporte de Participantes Parametrizados</a>
									</li>-->
								</ul>
							</li>

							@endif


							   @if(Session::get('tipo_usuario')==4)

							<li>
								<a href="#"><i class="fa fa-list-alt fa-fw"></i> Base de Datos <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/creacionprogramas') }}">Cargar Programas</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="#"><i class="fa fa-file-text fa-fw"></i> Reportes <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/estudiantesinscritos') }}">Reporte Ratificados</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/buscarpensum') }}">Reporte Pensum</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/calificacionesreporte') }}">S&aacute;bana de Calificaciones</a>
									</li>
									<!--<li>
										<a href="#">Provisional-Asistencia</a>
									</li>
									<li>
										<a href="#">Activos-Inactivos-Egresados</a>
									</li>-->
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-search fa-fw"></i> Consultas <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
										<li>
											<a href="{{ URL::to('dace/buscarparticipante') }}">Participante</a>
										</li>
									
									<!--<li>
										<a href="{{URL::to('dace/consultasfaci') }}">Facilitador</a>
									</li>-->

									<li>
										<a href="{{URL::to('dace/buscarfacilitador') }}">Facilitador</a>
									</li>

									 <li>
										<a href="{{URL::to('dace/consultascalificaciones') }}">Calificaciones</a>
									</li>
									<!--<li>
									<li>
										<a href="{{URL::to('dace/cargarprofesores') }}">Agregar Profesor</a>
									</li>

										<a href="{{ URL::to('dace/graduandosdefinitivos') }}">Graduandos Definitivos</a>
									</li>-->
									<li>
										<a href="{{ URL::to('dace/reporteegresados') }}">Egresados</a>
									</li>
									<!--<li>
										<a href="{{ URL::to('dace/emisionservicios') }}">Emisi&oacute;n de Servicios</a>
									</li>-->

								</ul>
							</li>

							@endif

							@if(Session::get('tipo_usuario')==5)
							<li>
								<a href="#"><i class="fa fa-file-text fa-fw"></i> Reportes <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/estudiantesinscritos') }}">Reporte Ratificados</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/buscarpensum') }}">Reporte Pensum</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/calificacionesreporte') }}">S&aacute;bana de Calificaciones</a>
									</li>
									<!--<li>
										<a href="#">Provisional-Asistencia</a>
									</li>
									<li>
										<a href="#">Activos-Inactivos-Egresados</a>
									</li>-->
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-search fa-fw"></i> Consultas <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
										<li>
											<a href="{{ URL::to('dace/buscarparticipante') }}">Participante</a>
										</li>
									<!--<li>
										<a href="{{URL::to('dace/consultasfaci') }}">Facilitador</a>
									</li>-->

									<li>
										<a href="{{URL::to('dace/buscarfacilitador') }}">Facilitador</a>
									</li>

									 <li>
										<a href="{{URL::to('dace/consultascalificaciones') }}">Calificaciones</a>
									</li>
									<!--<li>
									<li>
										<a href="{{URL::to('dace/cargarprofesores') }}">Agregar Profesor</a>
									</li>

										<a href="{{ URL::to('dace/graduandosdefinitivos') }}">Graduandos Definitivos</a>
									</li>-->
									<li>
										<a href="{{ URL::to('dace/reporteegresados') }}">Egresados</a>
									</li>
									<!--<li>
										<a href="{{ URL::to('dace/emisionservicios') }}">Emisi&oacute;n de Servicios</a>
									</li>-->

								</ul>
							</li>
							@endif
							@if(Session::get('tipo_usuario')==7)
							<li>
								<a href="#"><i class="fa fa-file-text fa-fw"></i> Reportes <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/estudiantesinscritos') }}">Reporte Ratificados</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/buscarpensum') }}">Reporte Pensum</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/calificacionesreporte') }}">S&aacute;bana de Calificaciones</a>
									</li>
									<!--<li>
										<a href="#">Provisional-Asistencia</a>
									</li>
									<li>
										<a href="#">Activos-Inactivos-Egresados</a>
									</li>-->
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-search fa-fw"></i> Consultas <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
										<li>
											<a href="{{ URL::to('dace/buscarparticipante') }}">Participante</a>
										</li>
									
									<!--<li>
										<a href="{{URL::to('dace/consultasfaci') }}">Facilitador</a>
									</li>-->

									<li>
										<a href="{{URL::to('dace/buscarfacilitador') }}">Facilitador</a>
									</li>

									 <li>
										<a href="{{URL::to('dace/consultascalificaciones') }}">Calificaciones</a>
									</li>
									<!--<li>
									<li>
										<a href="{{URL::to('dace/cargarprofesores') }}">Agregar Profesor</a>
									</li>

										<a href="{{ URL::to('dace/graduandosdefinitivos') }}">Graduandos Definitivos</a>
									</li>-->
									<li>
										<a href="{{ URL::to('dace/reporteegresados') }}">Egresados</a>
									</li>
									<!--<li>
										<a href="{{ URL::to('dace/emisionservicios') }}">Emisi&oacute;n de Servicios</a>
									</li>-->

								</ul>
							</li>

							@endif
							@if(Session::get('tipo_usuario')==8)

							<li>
								<a href="#"><i class="fa fa-list-alt fa-fw"></i> Admisi&oacute;n <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/estudiantespreinscritos') }}">Preinscripciones</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/reportesadmision') }}">Reportes</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="#"><i class="fa fa-file-text fa-fw"></i> Reportes <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/estudiantesinscritos') }}">Reporte Ratificados</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/buscarpensum') }}">Reporte Pensum</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/calificacionesreporte') }}">S&aacute;bana de Calificaciones</a>
									</li>

									<li>
										<a href="{{ URL::to('dace/preinscripcionparticipante') }}">Preinscripcion Participantes</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/buscartotalpreins') }}">Imprimir Reportes </a>
									</li>

								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-search fa-fw"></i> Consultas <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
										<li>
											<a href="{{ URL::to('dace/buscarparticipante') }}">Participante</a>
										</li>
									
									<!--<li>
										<a href="{{URL::to('dace/consultasfaci') }}">Facilitador</a>
									</li>-->

									<li>
										<a href="{{URL::to('dace/buscarfacilitador') }}">Facilitador</a>
									</li>

									 <li>
										<a href="{{URL::to('dace/consultascalificaciones') }}">Calificaciones</a>
									</li>
									<!--<li>
									<li>
										<a href="{{URL::to('dace/cargarprofesores') }}">Agregar Profesor</a>
									</li>

										<a href="{{ URL::to('dace/graduandosdefinitivos') }}">Graduandos Definitivos</a>
									</li>-->
									<li>
										<a href="{{ URL::to('dace/reporteegresados') }}">Egresados</a>
									</li>
									<!--<li>
										<a href="{{ URL::to('dace/emisionservicios') }}">Emisi&oacute;n de Servicios</a>
									</li>-->

								</ul>
							</li>

							@endif
							@if(Session::get('tipo_usuario')==10)

							<li>
								<a href="#"><i class="fa fa-database fa-fw"></i> Administraci&oacute;n de Datos <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">

									<li>
										<a href="{{ URL::to('dace/inscripcionparticipante') }}">Por Participantes</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="#"><i class="fa fa-search fa-fw"></i> Consultas <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
										<li>
											<a href="{{ URL::to('dace/buscarparticipante') }}">Participante</a>
										</li>
									
									<!--<li>
										<a href="{{URL::to('dace/consultasfaci') }}">Facilitador</a>
									</li>-->

									<li>
										<a href="{{URL::to('dace/buscarfacilitador') }}">Facilitador</a>
									</li>

									 <li>
										<a href="{{URL::to('dace/consultascalificaciones') }}">Calificaciones</a>
									</li>
									<!--<li>
									<li>
										<a href="{{URL::to('dace/cargarprofesores') }}">Agregar Profesor</a>
									</li>

										<a href="{{ URL::to('dace/graduandosdefinitivos') }}">Graduandos Definitivos</a>
									</li>-->
									<li>
										<a href="{{ URL::to('dace/reporteegresados') }}">Egresados</a>
									</li>
									<!--<li>
										<a href="{{ URL::to('dace/emisionservicios') }}">Emisi&oacute;n de Servicios</a>
									</li>-->

								</ul>
							</li>

							@endif
							@if(Session::get('tipo_usuario')==11)
							<li>
								<a href="#"><i class="fa fa-list-alt fa-fw"></i> Admisi&oacute;n <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/carnetizacion') }}">Carnetización</a>
									</li>
								</ul>
							</li>
							@endif
							@if(Session::get('tipo_usuario')==12)
							<li>
								<a href="#"><i class="fa fa-list-alt fa-fw"></i> Educación a Distancia <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
								  <li>
									  <a href="{{ URL::to('dace/matriculacionparticipante') }}">Matriculaci&oacute;n de Participantes</a>
								  </li>
								</ul>
							</li>
							@endif
							@if(Session::get('tipo_usuario') == 13)
							  <li>
								  <a href="#"><i class="fa fa-list-alt fa-fw"></i> Base de Datos <span class="fa arrow"></span></a>
								  <ul class="nav nav-second-level">
									  <li>
										  <a href="{{ URL::to('dace/cargarprofesores') }}">Cargar Facilitador</a>
									  </li>
								  </ul>
							  </li>
							  <li>
								  <a href="#"><i class="fa fa-list-alt fa-fw"></i>Admisión<span class="fa arrow"></span></a>
								  <ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/preinscripcionparticipante') }}">Preinscripción de Participantes</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/buscartotalpreins') }}">Imprimir reportes</a>
									</li>
								  </ul>
							  </li>
							  <li>
								  <a href="#"><i class="fa fa-cogs fa-fw"></i> Procesos Academicos<span class="fa arrow"></span></a>
								  <ul class="nav nav-second-level">
									<li>
										<a href="#">Ratificaci&oacute;n <span class="fa arrow"></span></a>
									<ul>
										<li style="padding: 5px;">
											<a href="{{ URL::to('dace/inscripcionparticipante') }}">Por Participantes</a>
										</li>
										<li style="padding: 5px;">
											<a href="{{ URL::to('dace/ratificaciongrupal') }}">Grupal</a>
										</li>

									</ul>
									</li>
									  <li>
										  <a href="{{ URL::to('dace/emisiondeacta') }}">Emisión de Acta</a>
									  </li>
								  </ul>
							  </li>
							   <li>
									<a href="#"><i class="fa fa-file-text fa-fw"></i> Reportes <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
											<a href="{{ URL::to('dace/buscarpensum') }}">Reporte Pensum</a>
										</li>
									</ul>
								</li>
							  <li>
								  <a href="#"><i class="fa fa-pencil-square fa-fw"></i>Periodos Acad&eacute;micos <span class="fa arrow"></span></a>
								  <ul class="nav nav-second-level">
									  <li>
										  <a href="{{ URL::to('dace/ofertaacademica') }}">Oferta Acad&eacute;mica</a>
									  </li>
								  </ul>
							  </li>
							  <li>
								  <a href="#"><i class="fa fa-search fa-fw"></i> Consultas <span class="fa arrow"></span></a>
								  <ul class="nav nav-second-level">
										  <li>
											  <a href="{{ URL::to('dace/buscarparticipante') }}">Participante</a>
										  </li>
										  <li>
											<a href="{{URL::to('dace/consultascalificaciones') }}">Calificaciones</a>
										  </li>

								  </ul>
							  </li>
							@endif

							@if(Session::get('tipo_usuario') == 14)

							<li>
								<a href="#"><i class="fa fa-cogs fa-fw"></i> Procesos Academicos<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/estudiantesreinscritos') }}">Horario</a>
									</li>
									
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-file-text fa-fw"></i> Reportes <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/estudiantesinscritos') }}">Reporte Ratificados</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/buscarpensum') }}">Reporte Pensum</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-user fa-fw"></i> Aula Virtual <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ URL::to('dace/generarcodigo') }}">Codificación</a>
									</li>
									<li>
										<a href="{{ URL::to('dace/matriculacion') }}">Matriculaci&oacute;n General</a>
									</li>
								</ul>
							</li>
							@endif

						</ul>
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>
			<div class="row">
					@section('contenido')

					@show
			</div>

			<div id="page-wrapper">
				<!-- /.row -->
				@yield('content')
				<!-- /.row -->
			</div>
		</div>
		<!-- /#wrapper -->

		<!--/. Copyrights -->
		{{ HTML::script('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}
		{{ HTML::script('js/vendor/jquery-1.10.1.min.js')}}
		{{ HTML::script('js/jquery.js')}}
		{{ HTML::script('js/bootstrap.min.js')}}
		{{ HTML::script('js/plugins/jquery.hoverIntent.minified.js')}}
		{{ HTML::script('js/main.js')}}
		{{ HTML::script('js/jquery.isotope.min.js')}}
		{{ HTML::script('js/jquery.flexslider-min.js')}}
		{{ HTML::script('js/plugins/Chart.min.js')}}
		{{ HTML::script('js/plugins/skrollr-min.js')}}
		{{ HTML::script('js/plugins/easing-min.js')}}
		{{ HTML::script('js/panel/metisMenu.js')}}
		{{ HTML::script('js/panel/sb-admin-2.js')}}
		
		
		@yield('postscript')
	</body>
</html>
