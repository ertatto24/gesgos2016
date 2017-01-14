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
			  <li><a href="#">Listar proyectos</a></li>
			  <span class="pull-right"><?php getFecha(); ?></span>
			</ol>

			<div class="panel panel-default">
			  <div class="panel-body">
			  	<h2 class="text-center">Listar proyectos</h2>
				<div class="row">
					<div class="col-md-12 table-responsive">

						<table id="listaProyectosTabla" class="table table-striped table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Proyecto</th>
									<th width="15%">Acciones</th>
								</tr>
							</thead>
						<tbody>

							<?php

							require 'sys/conexion.php';
							$db = getConexion();

							$stmt = $db->prepare("SELECT id, nombre FROM proyecto WHERE usuario = ?");
							$stmt->bindParam(1, $_SESSION['usuario']);
							$stmt->execute();
							$proyecto = $stmt->fetchAll(PDO::FETCH_ASSOC);

							$mensaje = "";

							foreach ($proyecto as $p) {
								$mensaje .= "<tr><td>#".$p['id']."</td><td>".$p['nombre']."</td>";
								$mensaje .= "<td><a class='btn btn-info btn-xs' href='abrir-proyecto.php?id=".$p['id']."' data-id='".$p['id']."' data-toggle='tooltip' data-placement='top' title='Abrir el proyecto'><i class='fa fa-folder-open-o'></i></a>";
								$mensaje .= " <a class='btn btn-success btn-xs' href='crear-riesgo.php?id=".$p['id']."' data-id='".$p['id']."' data-toggle='tooltip' data-placement='top' title='Crear riesgos y asociar'><i class='fa fa-warning'></i></a>";
								$mensaje .= " <a class='btn btn-primary btn-xs' href='linea-corte.php?id=".$p['id']."' data-id='".$p['id']."' data-toggle='tooltip' data-placement='top' title='Definir línea de corte del proyecto'><i class='fa fa-random'></i></a>";
								$mensaje .= " <a class='btn btn-warning btn-xs' href='#' data-id='".$p['id']."' data-toggle='tooltip' data-placement='top' title='Editar el proyecto'><i class='fa fa-pencil-square-o'></i></a>";
								$mensaje .= " <a class='btn btn-danger btn-xs' href='#' data-id='".$p['id']."' data-toggle='tooltip' data-placement='top' title='Eliminar el proyecto'><i class='fa fa-eraser'></i></a></td></tr>";
							}

							echo $mensaje;

							?>

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