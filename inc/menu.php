<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="padding:0px 10px;"><img src="img/logo.png" alt=""></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-tasks"></i> Proyectos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="crear-proyecto.php"><i class="fa fa-download"></i> Crear nuevo proyecto</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="listar-proyectos.php"><i class="fa fa-list-ul"></i> Listar proyectos</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-exclamation-triangle"></i> Riesgos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
        <li><a href="informes.php"><i class="fa fa-file-text-o"></i> Informes</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" data-toggle="modal" data-target="#entrar"><i class="fa fa-sign-in"></i> Entrar</a></li>
            <li><a href="#" data-toggle="modal" data-target="#registrar"><i class="fa fa-sign-out"></i> Registrarse</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><i class="fa fa-key"></i> Recuperar contraseña</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><i class="fa fa-power-off"></i> Salir</a></li>
          </ul>
        </li>
      </ul>

		<div class="modal fade" id="entrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bg-green text-white">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Entrar al sistema</h4>
		      </div>
		      <div class="modal-body">
		      	<form>
				  <div class="form-group">
				    <label for="usuario">Usuario</label>
				    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
				  </div>
				  <div class="form-group">
				    <label for="clave">Clave</label>
				    <input type="password" class="form-control" name="clave" id="clave" placeholder="Clave">
				  </div>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-warning pull-right">Entrar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bg-green text-white">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Registrarse en el sistema</h4>
		      </div>
		      <div class="modal-body">
		      	<form>
		      		<div class="form-group">
				    <label for="usuario">Usuario</label>
				    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
				  </div>
				  <div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
				  </div>
				  <div class="form-group">
				    <label for="clave">Clave</label>
				    <input type="password" class="form-control" name="clave" id="clave" placeholder="Clave">
				  </div>
				  <div class="form-group">
				    <label for="clave">Repetir clave</label>
				    <input type="password" class="form-control" name="clave2" id="clave2" placeholder="Clave">
				  </div>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-warning pull-right">Registrarse</button>
		      </div>
		    </div>
		  </div>
		</div>

      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar..">
        </div>
      </form>
    </div>
  </div>
</nav>