<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detalle de Nomina
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Nomina</li>
        <li class="active">Detalle de Nomina</li>
      </ol>
    </section>
    <!-- Main content -->
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
                <h3>Datos de la Nomina</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <th>ID Nomina</th>
                  <th>Fecha de pago</th>
                  <th>Monto</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT DISTINCT payroll_id, date_pay, SUM(amount) AS total_amount FROM payroll WHERE payroll_id = '" . $_GET['payroll'] . "'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['payroll_id']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['date_pay'])) ?></td>
                          <td><?php echo number_format($row['total_amount'], 2); ?></td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
                <h3>Listado del detalle de nomina</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Empleado</th>
                  <th>Acciones</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT DISTINCT payroll.employee_id, employees.*, payroll.payroll_id FROM payroll LEFT JOIN employees ON employees.id = payroll.employee_id WHERE payroll.payroll_id = '" . $_GET['payroll'] . "'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                          <td>
                            <a class="text-success" href="employee_payroll.php?employee=<?php echo $row['id'] ?>&payroll=<?php echo $row['payroll_id'] ?>">Recibo</a>
                          </td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
