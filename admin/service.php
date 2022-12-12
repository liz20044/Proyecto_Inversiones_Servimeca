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
        Lista de Servicios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Servicios</li>
        <li class="active">Lista de Servicios</li>
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
            <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>ID Service</th>
                  <th>Nombre</th>
                  <th>Precio VES</th>
                  <th>Precio USD</th>
                  <th>Estado</th>
                  <th>Acción</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, services.id AS serid FROM services";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['service_id']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo number_format($row['price_ve'], 2); ?></td>
                          <td><?php echo number_format($row['price_us'], 2); ?></td>
                          <td><?php echo $row['status'] ? 'Activo' : 'Inactivo'; ?></td>
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['serid']; ?>"><i class="fa fa-edit"></i> Editar</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['serid']; ?>"><i class="fa fa-trash"></i> Eliminar</button>
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
  <?php include 'includes/service_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'service_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.serid').val(response.serid);
      $('.service_id').html(response.service_id);
      $('.del_service_name').html(response.name);
      $('#service_name').html(response.name);
      $('#edit_name').val(response.name);
      $('#edit_price_ve').val(response.price_ve);
      $('#edit_price_us').val(response.price_us);
      $('#status_val').val(response.status).html(Number(response.status) === 1 ? 'Activo' : 'Inactivo');
    }
  });
}
</script>
</body>
</html>
