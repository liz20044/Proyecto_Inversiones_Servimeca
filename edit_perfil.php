<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edita tu Perfil
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Editar Perfil</li>
      </ol>
    </section>
    <section class="content">
    <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i>¡Proceso Exitoso!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="container">
        <form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          <div class="form-group">
              <label for="username" class="col-sm-4 control-label">Usuario</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
              </div>
          </div>
          <div class="form-group">
              <label for="password" class="col-sm-4 control-label">Contraseña</label>

              <div class="col-sm-4"> 
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
              </div>
          </div>
          <div class="form-group">
              <label for="firstname" class="col-sm-4 control-label">Nombre</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
              </div>
          </div>
          <div class="form-group">
              <label for="lastname" class="col-sm-4 control-label">Apellido</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
              </div>
          </div>
          <div class="form-group">
              <label for="photo" class="col-sm-4 control-label">Foto:</label>

              <div class="col-sm-4">
                <input type="file" id="photo" name="photo">
              </div>
          </div>
          <hr>
          <div class="form-group">
              <label for="curr_password" class="col-sm-4 control-label">Contraseña Actual:</label>

              <div class="col-sm-4">
                <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Ingrese su contraseña actual para guardar los cambios" required>
              </div>
          </div>
          <div class="form-group text-center">
          <button type="submit" class="btn btn-success"  name="save"><i class="fa fa-check-square-o"></i> Guardar</button>
          </div>
        </form>
      </div>    
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/deduction_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>