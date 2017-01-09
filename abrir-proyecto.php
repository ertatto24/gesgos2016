<?php require_once 'sys/url.php'; ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<?php require_once 'inc/head.php'; ?>
	</head>
	<body>

		<div class="container">

			<?php require_once 'inc/menu.php'; ?>

			<ol class="breadcrumb">
			  <li><a href="index.php">Inicio</a></li>
			  <li><a href="#">Proyectos</a></li>
			  <li><a href="#">Abrir proyecto</a></li>
			  <span class="pull-right"><?php getFecha(); ?></span>
			</ol>

			<div class="panel panel-default">
			  <div class="panel-body">
			  	<h2 class="text-center">Abrir proyecto</h2>

				<?php

				$id = $_GET['id'];
				require 'sys/conexion.php';
				$db = getConexion();

				$stmt = $db->prepare("SELECT proyecto.descripcion AS descripcion, proyecto.id AS proyecto, proyecto.nombre AS nombre, proyecto.fecha_inicio AS fecha_inicio, proyecto.fecha_final AS fecha_final, tipo_proyecto.nombre AS tipo FROM proyecto, tipo_proyecto WHERE proyecto.id = ? AND proyecto.tipo = tipo_proyecto.id LIMIT 1");
				$stmt->bindParam(1, $id, PDO::PARAM_INT);
				$stmt->execute();
				$proyecto = $stmt->fetchObject();

				?>

					<div class="form-group">
						<div class="input-group col-md-12">
							<div class="input-group-addon" style="background-color: #047668;color: #FFFFFF;border: 1px solid #047668;">Nombre del proyecto</div>
							<input type="text" class="form-control" id="exampleInputAmount" placeholder="" value="<?php echo $proyecto->nombre; ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group col-md-12">
							<div class="input-group-addon" style="background-color: #047668;color: #FFFFFF;border: 1px solid #047668;">Tipo</div>
							<input type="text" class="form-control" id="exampleInputAmount" placeholder="" value="<?php echo $proyecto->tipo; ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group col-md-12">
							<div class="input-group-addon" style="background-color: #047668;color: #FFFFFF;border: 1px solid #047668;">Fecha inicio</div>
							<input type="text" class="form-control" id="exampleInputAmount" placeholder="" value="<?php echo $proyecto->fecha_inicio; ?>" readonly>
							<div class="input-group-addon" style="background-color: #047668;color: #FFFFFF;border: 1px solid #047668;">Fecha final</div>
							<input type="text" class="form-control" id="exampleInputAmount" placeholder="" value="<?php echo $proyecto->fecha_final; ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group col-md-12">
							<div class="input-group-addon" style="background-color: #047668;color: #FFFFFF;border: 1px solid #047668;">Descripción</div>
							<textarea class="form-control" rows="6" id="exampleInputAmount" placeholder="" readonly><?php echo $proyecto->descripcion; ?></textarea>
						</div>
					</div>

					meter más info como los riesgos,etc

			  </div>
			</div>

		</div>

		<?php require_once 'inc/js.php'; ?>
	</body>
</html>