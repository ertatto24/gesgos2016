<?php require_once 'sys/url.php'; ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<?php require_once 'inc/head.php'; ?>
		<style>
		  #sortable1, #sortable2 { list-style-type: none; margin: 0; padding: 0; zoom: 1; }
		  #sortable1 li, #sortable2 li { margin: 0 5px 5px 5px; padding: 3px; width: 90%; }
		  </style>
	</head>
	<body>

		<div class="container">

			<?php require_once 'inc/menu.php'; ?>

			<ol class="breadcrumb">
			  <li><a href="index.php">Inicio</a></li>
			  <li><a href="#">Proyectos</a></li>
			  <li><a href="#">Línea de corte</a></li>
			  <span class="pull-right"><?php getFecha(); ?></span>
			</ol>

			<div class="panel panel-default">
			  <div class="panel-body">
			  	<h2 class="text-center">Línea de corte</h2>

				<?php

				$id = $_GET['id'];
				require 'sys/conexion.php';
				$db = getConexion();

				$stmt = $db->prepare("SELECT proyecto.descripcion AS descripcion, proyecto.id AS proyecto, proyecto.nombre AS nombre, proyecto.fecha_inicio AS fecha_inicio, proyecto.fecha_final AS fecha_final, tipo_proyecto.nombre AS tipo FROM proyecto, tipo_proyecto WHERE proyecto.id = ? AND usuario = ? AND proyecto.tipo = tipo_proyecto.id LIMIT 1");
				$stmt->bindParam(1, $id, PDO::PARAM_INT);
				$stmt->bindParam(2, $_SESSION['usuario']);
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

					<hr>

					<?php

					$stmt = $db->prepare("SELECT riesgo.id AS id, riesgo.nombre AS riesgo, riesgo.probabilidad AS probabilidad, riesgo.descripcion AS descripcion, categoria_riesgo.nombre AS categoria, tipo_riesgo.nombre AS tipo, impacto_riesgo.nombre AS impacto FROM riesgo, proyecto_riesgo, impacto_riesgo, tipo_riesgo, categoria_riesgo WHERE proyecto_riesgo.proyecto = ? AND proyecto_riesgo.riesgo = riesgo.id AND riesgo.categoria = categoria_riesgo.id AND riesgo.tipo = tipo_riesgo.id AND riesgo.impacto = impacto_riesgo.id ORDER BY riesgo.probabilidad DESC");
					$stmt->bindParam(1, $id, PDO::PARAM_INT);
					//$stmt->bindParam(2, $_SESSION['usuario']);
					$stmt->execute();
					$riesgosProyecto = $stmt->fetchAll();

					if ($riesgosProyecto == null) {
						echo "Todavía no se han asociado riesgos al proyecto.";
					} else { ?>

						<div class="alert alert-info" role="alert">Nombre del riesgo [probabilidad] (impacto)</div>

					<div id="ina">
						<ul id="sortable2">
						<li class="ui-state-default" style="width:100%;background-color:pink;" id="0">Línea de corte</li>
						
						<?php
						foreach ($riesgosProyecto as $r) {
							echo '<li class="ui-state-default" style="width:100%;" id="'.$r['id'].'">'.$r['riesgo'].' ['.$r['probabilidad'].'] ('.$r['impacto'].')</li>';
						}
						?>
						</ul>

						<span id="lineaCorte" class="btn btn-warning" style="margin-top: 14px;">Asociar línea de corte</span>
					</div>


					<?php } ?>

			  </div>
			</div>

		</div>

		<?php require_once 'inc/js.php'; ?>
	</body>
</html>