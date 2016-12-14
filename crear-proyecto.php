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
				<form class="form-horizontal">
				  <div class="form-group">
				    <label for="nombreProyecto" class="col-sm-4 control-label">Nombre proyecto</label>
				    <div class="col-sm-6">
				      <input type="email" class="form-control" id="nombreProyecto" placeholder="Nombre del proyecto">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="tipoProyecto" class="col-sm-4 control-label">Tipo proyecto</label>
				    <div class="col-sm-6">
				    	<div class="input-group">
							<select class="form-control" id="tipoProyecto">
								<option>fd</option>
							</select>
							<span class="input-group-addon" id="addTipoProyecto-js"><i class="fa fa-plus-square"></i></span>
						</div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="descripcion" class="col-sm-4 control-label">Descripción</label>
				    <div class="col-sm-6">
				      <textarea class="form-control" id="descripcion" placeholder="Descripción" rows="8"></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="fechaInicio" class="col-sm-4 control-label">Fecha inicio</label>
				    <div class="col-sm-6">
				      <input type="date" class="form-control" id="fechaInicio" placeholder="Fecha de inicio">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="fechaFin" class="col-sm-4 control-label">Fecha fin</label>
				    <div class="col-sm-6">
				      <input type="date" class="form-control" id="fechaFin" placeholder="Fecha de fin">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-5 col-sm-10">
					    <button type="reset" class="btn btn-default">Cancelar</button>
					    <button type="submit" class="btn btn-warning">Guardar</button>
				    </div>
				  </div>
				</form>
			  </div>
			</div>

		</div>

		<?php require_once 'inc/js.php'; ?>
	</body>
</html>