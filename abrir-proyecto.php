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

					$stmt = $db->prepare("SELECT riesgo.id AS id, riesgo.nombre AS riesgo, riesgo.probabilidad AS probabilidad, riesgo.descripcion AS descripcion, categoria_riesgo.nombre AS categoria, tipo_riesgo.nombre AS tipo, impacto_riesgo.nombre AS impacto FROM riesgo, proyecto_riesgo, impacto_riesgo, tipo_riesgo, categoria_riesgo WHERE proyecto_riesgo.proyecto = ? AND proyecto_riesgo.riesgo = riesgo.id AND riesgo.categoria = categoria_riesgo.id AND riesgo.tipo = tipo_riesgo.id AND riesgo.impacto = impacto_riesgo.id ORDER BY proyecto_riesgo.posicion ASC");
					$stmt->bindParam(1, $id, PDO::PARAM_INT);
					//$stmt->bindParam(2, $_SESSION['usuario']);
					$stmt->execute();
					$riesgosProyecto = $stmt->fetchAll();

					if ($riesgosProyecto == null) {
						echo "Todavía no se han asociado riesgos al proyecto.";
					} else { ?>

					<table width="100%">
						<tr style="background-color:#047668;color:#FFFFFF;">
							<th>Riesgo</th>
							<th>%</th>
							<th>Categoría</th>
							<th>Tipo</th>
							<th>Impacto</th>
						</tr>
					<?php

					
						foreach ($riesgosProyecto as $r) {
							echo "<tr><td><i class='fa fa-'></i>".$r['riesgo']."</td>";
							echo "<td>".$r['probabilidad']."</td>";
							echo "<td>".$r['categoria']."</td>";
							echo "<td>".$r['tipo']."</td>";
							echo "<td>".$r['impacto']."</td></tr>";
							echo "<tr style='background-color:#E0E0E0;'><td colspan='5'>".$r['descripcion']."</td></tr>";
						}
					?>

				

					<?php } ?>
					</table>
			  </div>
			</div>

		</div>

		<?php require_once 'inc/js.php'; ?>
	</body>
</html>