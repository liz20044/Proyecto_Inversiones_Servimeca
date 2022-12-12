<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>


  <style> 
	 /*
      * Page: Login & Register
      * ----------------------
      */
      
      .login-logo a,
      .register-logo a {
        color: #444;
      }
      .login-page,
      .register-page {
        background: url(../images/taller.jpg);
      }
      .login-box,
      .register-box{
        width: 400px;
      }
	  .img-circle.profile_img {
 	 	margin-left: 0px;
		height: 50%;

		}
      @media (max-width: 768px) {
        .login-box,
        .register-box {
          width: 90%;
          margin-top: 20px;
        }
      }
      .login-box-body,
      .register-box-body {
		text-align: center;
        border-radius: 5px;
        background: #fff;
      }
      .login-box-body .form-control-feedback,
      .register-box-body .form-control-feedback {
        color: #777;
      }
      .login-box-msg,
      .register-box-msg {
        margin: 0;
        text-align: center;
        padding: 0 20px 20px 20px;
      }
      .social-auth-links {
        margin: 10px 0;
      }
	  </style>
<body class=" login-page">
	<div class="login-box">
		  
  	<div class="login-box-body">
		
		<div class="login-logo">
		<b>IS Process Taller</b>

		<img src="../images/logo.jpeg" class="img-circle profile_img ">

			<b>Ingreso Administrador</b>

		</div>
	  	
    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Usuario" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-5" style="float:right;">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Ingresar</button>
        		</div>
      		</div>
			 	<div class="text-center">
                            <h3><i class="fa fa-gear text-center"></i> Inversiones Servimeca, C.A</h3>
                            <p>©2022 Derechos Reservados. UPTA "Federico Brito Figueroa"</p>
            	</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>