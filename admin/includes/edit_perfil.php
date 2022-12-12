<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>
<!-- Add -->
<div id="profile">
          	<div class="card-header">
            	<h4 class="card-title"><b>Perfil Administrador</b></h4>
          	</div>
          	<div class="card-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">Usuario</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Contraseña</label>

                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Nombre</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Apellido</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Foto:</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Contraseña Actual:</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Ingrese su contraseña actual para guardar los cambios" required>
                    </div>
                </div>
          	</div>
          	<div class="card-footer">
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Guardar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<?php include 'includes/scripts.php' ?>
</body>
</html>