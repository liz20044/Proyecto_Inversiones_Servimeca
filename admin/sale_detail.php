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
        Detalle de Reparacion
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Reparaciones</li>
        <li class="active">Detalle de Reparacion</li>
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
                <h3>Datos de la Reparacion</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <th>ID Reparacion</th>
                  <th>Cliente</th>
                  <th>Vehiculo</th>
                  <th>Creado</th>
                  <th>Total VES</th>
                  <th>Total USD</th>
                  <th>Metodo de pago</th>
                  <th>Referencia de pago</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, sales.id AS salid FROM sales LEFT JOIN customers ON customers.id=sales.customer_id LEFT JOIN vehicles ON vehicles.id=sales.vehicle_id WHERE sales.id = '" . $_GET['sale'] . "'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['sale_id']; ?></td>
                          <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                          <td><?php echo $row['patent'] . ' - ' . $row['brand'] . ' ' . $row['model']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['created_on'])) ?></td>
                          <td><?php echo number_format($row['total_ve'], 2); ?></td>
                          <td><?php echo number_format($row['total_us'], 2); ?></td>
                          <td><?php echo $row['pay_method'] ?></td>
                          <td><?php echo $row['pay_reference'] ?></td>
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
                <h3>Listado del detalle de Reparacion</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>ID Servicio</th>
                  <th>Nombre</th>
                  <th>Precio VES</th>
                  <th>Precio USD</th>
                  <th>Estado</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, sales_details.id AS detid FROM sales_details LEFT JOIN services ON services.id = sales_details.service_id WHERE sale_id = " . $_GET['sale'];
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['service_id']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo number_format($row['total_ve'], 2); ?></td>
                          <td><?php echo number_format($row['total_us'], 2); ?></td>
                          <td><?php echo $row['status'] ? 'Activo' : 'Inactivo'; ?></td>
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

