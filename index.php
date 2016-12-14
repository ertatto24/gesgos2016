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
			  <span class="pull-right"><?php getFecha(); ?></span>
			</ol>

			<div class="panel panel-default">
			  <div class="panel-body">
			  	<h2 class="text-center">Bienvenido a Gesgos 2016</h2>
			  	<p class="text-justify" style="padding:10px 20px;">
			  		La intención de esta Aplicación Web es permitir la administración integral del riesgo en proyectos de desarrollo de Sistemas de Software, y, al mismo tiempo, generar conocimiento que enriquezca el análisis de proyectos subsiguientes.
			  	</p>
			  	<p class="text-justify" style="padding:10px 20px;">
			  		Esta herramienta permitirá realizar el seguimiento de riesgos para un proyectos desde su comienzo y mientras el mismo se encuentre activo. De esta forma se podrá tratar de manera proactiva cada situación de riesgo presentada o, en su defecto, contar con suficiente material para generar planes alternativos de contingencia.
			  	</p>
			  	<p class="text-justify" style="padding:10px 20px;">
			  		La metodología desarrollada en este trabajo es una herramienta Web de uso libre que brinda la posibilidad de efectuar tareas de identificación de riesgos, plan de riesgo en base a taxonomías estándar y planes de contingencia asociada a cada riesgo. La implementación de esta herramienta se desarrollará mediante software libre, con características compatibles de una aplicación Web para la Gestión de Riesgos de Proyectos de desarrollo de Sistemas Software.
			  	</p>
			  </div>
			</div>

		</div>

		<?php require_once 'inc/js.php'; ?>
	</body>
</html>