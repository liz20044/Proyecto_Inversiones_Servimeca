<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Control de Asistencia y Sistema de Nómina</title>
	<link rel="icon" href="images/logo.jpeg">
	
  	<!-- Tell the browser to be responsive to screen width -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  	<style type="text/css">
            /* Page: Login */
      .login-logo,
      .register-logo {
        font-size: 35px;
        color: #fff;
        text-align: center;
        margin-bottom: 25px;
        font-weight: 300;
      }
      .login-logo a,
      .register-logo a {
        color: #444;
      }
      .login-page,
      .register-page {
        background: url(images/taller.jpg);
      }
      .login-box,
      .register-box {
        width: 360px;
        margin: 7% auto;
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
        border-radius:5px;
        background: #fff;
        padding: 20px;
        border-top: 0;
        color: #666;
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

  		.mt20{
  			margin-top:20px;
  		}
  		.result{
  			font-size:20px;
  		}
      .bold{
        font-weight: bold;
      }
  	</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  		<p id="date"></p>
      <p id="time" class="bold"></p>
  </div>
  
  <div class="login-box-body">
    <h4 class="login-box-msg">Ingrese su Cédula</h4>
    <form id="attendance">
        <div class="form-group">
          <select class="form-control" name="status">
            <option value="in">Hora de Entrada</option>
            <option value="out">Hora de Salida</option>
          </select>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control input-lg" placeholder="Cédula " id="employee" name="employee" required>
          <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
        </div>
        <div class="row">
        <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> Marcar</button>
          </div>
        </div>
    </form>
  </div>
  <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
  </div>
  <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
  </div> 		
</div>
	
<?php include 'scripts.php'; ?>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('DD/ MM/ YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });   
});
</script>
</body>
</html>