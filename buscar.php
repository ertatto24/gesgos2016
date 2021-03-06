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
			  <li><a href="#">Buscar proyectos</a></li>
			  <span class="pull-right"><?php getFecha(); ?></span>
			</ol>

			<div class="panel panel-default">
			  <div class="panel-body">
			  	<h2 class="text-center">Buscar proyectos</h2>
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

							<?php

							require 'sys/conexion.php';
							$db = getConexion();

							$busca = $_POST['buscar'];
							$like = "%".$busca."%";

							$stmt = $db->prepare("SELECT id, nombre FROM proyecto WHERE nombre LIKE ? AND usuario = ?");
							$stmt->bindParam(1, $like);
							$stmt->bindParam(2, $_SESSION['usuario']);
							$stmt->execute();
							$proyecto = $stmt->fetchAll(PDO::FETCH_ASSOC);

							$mensaje = "";

							foreach ($proyecto as $p) {
								$mensaje .= "<tr><td>#".$p['id']."</td><td>".$p['nombre']."</td>";
								$mensaje .= "<td><a class='btn btn-info btn-xs' href='abrir-proyecto.php?id=".$p['id']."' data-id='".$p['id']."'><i class='fa fa-folder-open-o'></i> Abrir</a>";
								$mensaje .= " <a class='btn btn-warning btn-xs' href='#' data-id='".$p['id']."'><i class='fa fa-pencil-square-o'></i> Modificar</a>";
								$mensaje .= " <a class='btn btn-danger btn-xs' href='#' data-id='".$p['id']."'><i class='fa fa-eraser'></i> Borrar</a></td></tr>";
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