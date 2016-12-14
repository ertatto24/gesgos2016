<?php require_once 'sys/url.php'; ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<?php require_once 'inc/head.php'; ?>
		<link rel="stylesheet" href="plugins/datatables/datatables.css" type="text/css" />
	</head>
	<body>

		<div class="container">

			<?php require_once 'inc/menu.php'; ?>

			<ol class="breadcrumb">
			  <li><a href="index.php">Inicio</a></li>
			  <li><a href="#">Proyectos</a></li>
			  <li><a href="#">Crear nuevo proyecto</a></li>
			  <span class="pull-right"><?php getFecha(); ?></span>
			</ol>

			<div class="panel panel-default">
			  <div class="panel-body">
			  	<h2 class="text-center">Informes</h2>
				<div class="row">
					<div class="col-md-12 table-responsive">

						<table id="listaProyectosTabla" class="table table-striped table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Proyecto</th>
									<th>Acciones</th>
								</tr>
							</thead>
						<tbody>
							<tr>
								<td>
									#1
								</td>
								<td>
									nombre proyecto 11
								</td>
								<td>
									<a class="btn btn-info btn-xs" href="#" data-id="1" class="abrirProyecto"><i class="fa fa-file-o"></i> Informe</a>
									<a class="btn btn-warning btn-xs" href="#" data-id="1" class="modificarProyecto"><i class="fa fa-file-text-o"></i> Post-Informe</a>
								</td>
							</tr>
							<tr>
								<td>
									#1
								</td>
								<td>
									nombre proyecto 11
								</td>
								<td>
									<a class="btn btn-info btn-xs" href="#"><i class="fa fa-folder-open-o"></i> Abrir proyecto</a>
									<a class="btn btn-warning btn-xs" href="#"><i class="fa fa-pencil-square-o"></i> Modificar proyecto</a>
									<a class="btn btn-danger btn-xs" href="#"><i class="fa fa-eraser"></i> Borrar proyecto</a>
								</td>
							</tr>
							<tr>
								<td>
									#1
								</td>
								<td>
									nombre proyecto 33
								</td>
								<td>
									<a class="btn btn-info btn-xs" href="#"><i class="fa fa-folder-open-o"></i> Abrir proyecto</a>
									<a class="btn btn-warning btn-xs" href="#"><i class="fa fa-pencil-square-o"></i> Modificar proyecto</a>
									<a class="btn btn-danger btn-xs" href="#"><i class="fa fa-eraser"></i> Borrar proyecto</a>
								</td>
							</tr>

						<?php //getListadoServiciosFranquicia($_SESSION['franquicia']); ?>

						</tbody>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Proyecto</th>
									<th>Acciones</th>
								</tr>
							</tfoot>
						</table>

					</div>
				</div>
			  </div>
			</div>

		</div>

		<?php require_once 'inc/js.php'; ?>
		<script type="text/javascript" src="plugins/datatables/datatables.min.js"></script>
		<script type="text/javascript">
			$("#listaProyectosTabla").DataTable();
		</script>
	</body>
</html>