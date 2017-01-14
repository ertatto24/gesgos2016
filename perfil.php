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
			  <li><a href="#">Perfil</a></li>
			  <span class="pull-right"><?php getFecha(); ?></span>
			</ol>

			<div class="panel panel-default">
			  <div class="panel-body">
			  	<h2 class="text-center">Perfil</h2>
				<div class="row">
					<?php
					require 'sys/conexion.php';
					$db = getConexion();

					$stmt = $db->prepare("SELECT usuario, email FROM usuario WHERE id = ? LIMIT 1");
					$stmt->bindParam(1, $_SESSION['usuario']);
					$stmt->execute();
					$usuario = $stmt->fetchObject();

					?>
					<div style="padding:10px;text-align: center;">
						<h4 style="color:#047668;"><i class="fa fa-user" style="color:#eea236;"></i> <?php echo $usuario->usuario; ?></h4>
						<h4 style="color:#047668;"><i class="fa fa-at" style="color:#eea236;"></i> <?php echo $usuario->email; ?></h4>
					</div>
				</div>
			  </div>
			</div>

		</div>

		<?php require_once 'inc/js.php'; ?>

	</body>
</html>