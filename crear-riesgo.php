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
			  <li><a href="#">Riesgo</a></li>
			  <li><a href="#">Crear nuevo riesgo</a></li>
			  <span class="pull-right"><?php getFecha(); ?></span>
			</ol>

			<div class="panel panel-default qabre" style="display: none;">
				¿Añadir otro riesgo a este proyecto?<br>
				<a href="crear-riesgo.php?id=<?php echo $_GET['id']; ?>" class="btn btn-default">Si</a>
				<a href="listar-proyectos.php" class="btn btn-default">No</a>
			</div>
			<div class="panel panel-default qcierra">
			  <div class="panel-body">
			  	<h2 class="text-center">Crear riesgo nuevo</h2>
			  	<?php 
			  	$idp = $_GET['id']; 
			  	require 'sys/conexion.php';
				$db = getConexion();
				$stmt = $db->prepare("SELECT nombre FROM proyecto WHERE id = ? LIMIT 1");
				$stmt->bindParam(1, $idp);
				$stmt->execute();
				$proye = $stmt->fetchObject();
			  	?>
			  	<h5 class="text-center"><span class="label label-success">Asociado al proyecto <?php echo $proye->nombre; ?></span></h5>
			  	<div class="alert alert-danger" role="alert" id="errorNRiesgo" style="display: none;">Por favor, rellena los campos.</div>
				<form class="form-horizontal" id="enviarCrearRiesgo">
				<input type="hidden" name="id" value="<?php echo $idp; ?>">
				  <div class="form-group">
				    <label for="nombreProyecto" class="col-sm-4 control-label">Nombre riesgo</label>
				    <div class="col-sm-6">
				      <input type="text" name="nombreRiesgo" class="form-control" id="nombreRiesgo" placeholder="Nombre del riesgo">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="categoriaRiesgo" class="col-sm-4 control-label">Categoría del riesgo</label>
				    <div class="col-sm-6">
				    	<div class="input-group">
							<select class="form-control" id="categoriaRiesgo" name="categoriaRiesgo"></select>
							<span class="input-group-addon"><a href="#" data-toggle="modal" data-target="#nuevoCategoriaRiesgo"><i class="fa fa-plus-square"></i></a></span>
						</div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="tipoProyecto" class="col-sm-4 control-label">Tipo de riesgo</label>
				    <div class="col-sm-6">
				    	<div class="input-group">
							<select class="form-control" id="tipoRiesgo" name="tipoRiesgo"></select>
							<span class="input-group-addon" id="addTipoProyecto-js"><a href="#" data-toggle="modal" data-target="#nuevoTipoRiesgo"><i class="fa fa-plus-square"></i></a></span>
						</div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="tipoProyecto" class="col-sm-4 control-label">Impacto del riesgo</label>
				    <div class="col-sm-6">
				    	<div class="input-group">
							<select class="form-control" id="impactoRiesgo" name="impactoRiesgo"></select>
							<span class="input-group-addon" id="addTipoProyecto-js"><a href="#" data-toggle="modal" data-target="#nuevoImpactoRiesgo"><i class="fa fa-plus-square"></i></a></span>
						</div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="fechaFin" class="col-sm-4 control-label">Probabilidad del riesgo</label>
				    <div class="col-sm-6">
				    	<div class="input-group">
				    		<input type="range" name="probabilidad" id="probabilidad" min="0" max="100" step="5" value="50">
				    		<div class="input-group-addon" id="valueProb"></div>
				    	</div>
						
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="descripcion" class="col-sm-4 control-label">Descripción del riesgo</label>
				    <div class="col-sm-6">
				      <textarea class="form-control" name="descripcionRiesgo" id="descripcionRiesgo" placeholder="Descripción del riesgo" rows="6"></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="descripcion" class="col-sm-4 control-label">Factores que influyen</label>
				    <div class="col-sm-6">
				      <textarea class="form-control" name="factores" id="factores" placeholder="Factores que influyen" rows="6"></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="descripcion" class="col-sm-4 control-label">Reducción del riesgo</label>
				    <div class="col-sm-6">
				      <textarea class="form-control" name="reduccion" id="reduccion" placeholder="Reducción del riesgo" rows="6"></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="descripcion" class="col-sm-4 control-label">Supervisión del riesgo</label>
				    <div class="col-sm-6">
				      <textarea class="form-control" name="supervision" id="supervision" placeholder="Supervisión del riesgo" rows="6"></textarea>
				    </div>
				  </div>

				  <div class="form-group">
				    <div class="col-sm-offset-5 col-sm-10">
					    <button type="reset" class="btn btn-default">Cancelar</button>
					    <button type="submit" class="btn btn-warning">Guardar</button>
				    </div>
				  </div>
				</form>

				<div class="modal fade" id="nuevoCategoriaRiesgo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header bg-green text-white">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Nueva categoría de riesgo</h4>
				      </div>
				      <form>
				      <div class="modal-body">
				      <div class="alert alert-danger" role="alert" id="errorNCR" style="display: none;">Por favor, rellena el campo.</div>
						  <div class="form-group">
						    <label for="tipoProyecto">Categoría de riesgo</label>
						    <input type="text" class="form-control" name="tipoProyecto" id="nuevaCategoriaRiesgo" placeholder="">
						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
				        <a class="btn btn-warning pull-right" id="categoriaRiesgo-js">Registrar</a>
				      </div>
				      </form>
				    </div>
				  </div>
				</div>

				<div class="modal fade" id="nuevoTipoRiesgo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header bg-green text-white">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Nueva tipo de riesgo</h4>
				      </div>
				      <form>
				      <div class="modal-body">
				      <div class="alert alert-danger" role="alert" id="errorNTR" style="display: none;">Por favor, rellena el campo.</div>
						  <div class="form-group">
						    <label for="tipoProyecto">Tipo de riesgo</label>
						    <input type="text" class="form-control" name="tipoRiesgo" id="nuevaTipoRiesgo" placeholder="">
						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
				        <a class="btn btn-warning pull-right" id="tipoRiesgo-js">Registrar</a>
				      </div>
				      </form>
				    </div>
				  </div>
				</div>

				<div class="modal fade" id="nuevoImpactoRiesgo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header bg-green text-white">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Nuevo impacto de riesgo</h4>
				      </div>
				      <form>
				      <div class="modal-body">
				      <div class="alert alert-danger" role="alert" id="errorNIR" style="display: none;">Por favor, rellena el campo.</div>
						  <div class="form-group">
						    <label for="tipoProyecto">Impacto de riesgo</label>
						    <input type="text" class="form-control" name="nuevaImpactoRiesgo" id="nuevaImpactoRiesgo" placeholder="">
						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
				        <a class="btn btn-warning pull-right" id="impactoRiesgo-js">Registrar</a>
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