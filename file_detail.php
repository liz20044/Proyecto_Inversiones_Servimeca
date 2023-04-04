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
        Detalle de Conceptos Asignados
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Conceptos</li>
        <li class="active">Detalle de Conceptos Asignados</li>
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
                <h3>Asignación de Concepto</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <th>Empleado</th>
                  <th>Fecha de Creación</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, files.id AS filid, files.created_on AS filcreated_on FROM files LEFT JOIN employees ON employees.id=files.employee_id WHERE files.id = " . $_GET['file'];
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['filcreated_on'])) ?></td>
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
                <h3>Conceptos</h3>
            </div>
            <div class="box-body">
              <table id="example15" class="table table-bordered">
                <thead>
                  <th>Nombre</th>
                  <th>Monto</th>
                  <th>Tipo</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, files_details.id AS detid FROM files_details LEFT JOIN concepts ON concepts.id=files_details.concept_id WHERE files_details.file_id = " . $_GET['file'];
                    $query = $conn->query($sql);
                    $type_concept = ['Deduccion', 'Asignacion'];
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo number_format($row['amount'], 2); ?></td>
                          <td><?php echo $type_concept[$row['type'] - 1]; ?></td>
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
<script> 
    $('#example15').DataTable( {
      reponsive: true,
      autoWidth: false,

        "language": {
          "lengthMenu": "Mostrar _MENU_ entradas",
          "zeroRecords": "Nada encontrado - disculpa",
          "info": "Mostrando la página _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles",
          "infoFiltered": "(filtrado de _MAX_ registros totales)",
          "search":"Buscar:",
          "paginate": {
            "first":    "Primero",
            "last":     "Último",
            "next":     "Siguiente",
            "previous": "Anterior"
          },
        } 
      }
    );
</script>
</body>
</html>

