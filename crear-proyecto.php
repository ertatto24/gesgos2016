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
			  <li><a href="#">Crear nuevo proyecto</a></li>
			  <span class="pull-right"><?php getFecha(); ?></span>
			</ol>

			<div class="panel panel-default">
			  <div class="panel-body">
			  	<h2 class="text-center">Crear proyecto nuevo</h2>
			  	<div class="alert alert-danger" role="alert" id="errorNProyecto" style="display: none;">Por favor, rellena los campos.</div>
				<form class="form-horizontal" id="formNuevoProyecto">
				  <div class="form-group">
				    <label for="nombreProyecto" class="col-sm-4 control-label">Nombre proyecto</label>
				    <div class="col-sm-6">
				      <input type="text" name="nombreProyecto" class="form-control" id="nombreProyecto" placeholder="Nombre del proyecto">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="tipoProyecto" class="col-sm-4 control-label">Tipo proyecto</label>
				    <div class="col-sm-6">
				    	<div class="input-group">
							<select class="form-control" id="tipoProyecto" name="tipoProyecto">
							<optgroup label="Selecciona un tipo de proyecto">
							
							<?php

							require 'sys/conexion.php';
							$db = getConexion();

							$stmt = $db->prepare("SELECT id, nombre FROM tipo_proyecto");
							$stmt->execute();
							$proyecto = $stmt->fetchAll(PDO::FETCH_ASSOC);

							$mensaje = "";

							foreach ($proyecto as $p) {
								$mensaje .= "<option value='".$p['id']."'>".$p['nombre']."</option>";
							}

							echo $mensaje;

							?>
							
							</optgroup>
							</select>
							<span class="input-group-addon" id="addTipoProyecto-js"><a href="#" data-toggle="modal" data-target="#nuevoTipoProyecto"><i class="fa fa-plus-square"></i></a></span>
						</div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="descripcion" class="col-sm-4 control-label">Descripción</label>
				    <div class="col-sm-6">
				      <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripción" rows="8"></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="fechaInicio" class="col-sm-4 control-label">Fecha inicio</label>
				    <div class="col-sm-6">
				      <input type="date" name="fechaInicio" class="form-control" id="fechaInicio" placeholder="Fecha de inicio">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="fechaFin" class="col-sm-4 control-label">Fecha fin</label>
				    <div class="col-sm-6">
				      <input type="date" name="fechaFin" class="form-control" id="fechaFin" placeholder="Fecha de fin">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-5 col-sm-10">
					    <button type="reset" class="btn btn-default">Cancelar</button>
					    <button type="submit" class="btn btn-warning" id="dd">Guardar</button>
				    </div>
				  </div>
				</form>

				<div class="modal fade" id="nuevoTipoProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header bg-green text-white">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Nuevo tipo de proyecto</h4>
				      </div>
				      <form action="ctl/ctl.postTipoProyecto.php" method="post">
				      <div class="modal-body">
						  <div class="form-group">
						    <label for="tipoProyecto">Tipo de proyecto</label>
						    <input type="text" class="form-control" name="tipoProyecto" id="tipoProyecto" placeholder="Tipo de proyecto">
						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
				        <button type="submit" class="btn btn-warning pull-right">Registrar</button>
				      </div>
				      </form>
				    </div>
				  </div>
				</div>


			  </div>
			</div>

		</div>

		<?php require_once 'inc/js.php'; ?>
	</body>
</html>