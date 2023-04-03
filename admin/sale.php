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
        Lista de Facturas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Reparaciones</li>
        <li class="active">Lista de Facturas</li>
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
              <a href="report_repairs.php" class="btn btn-success btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Imprimir</a>
            </div>
            <div class="box-body">
              <table id="example10" class="table table-bordered">
                <thead>
                  <th>ID Reparación</th>
                  <th>Cliente</th>
                  <th>Vehículo</th>
                  <th>Creado</th>
                  <th>Total BS</th>
                  <th>Total USD</th>
                  <th>Método de pago</th>
                  <th>Referencia de pago</th>
                  <th>Acciones</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, sales.id AS salid FROM sales LEFT JOIN customers ON customers.id=sales.customer_id LEFT JOIN vehicles ON vehicles.id=sales.vehicle_id";
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
                          <td>
                            <a class="text-success btn btn-primary" href="sale_detail.php?sale=<?php echo $row['salid'] ?>"><i class="fa fa-eye"></i></a>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['salid']; ?>"><i class="fa fa-trash"></i> Eliminar</button>   
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
  <?php include 'includes/sale_modal.php'; ?>
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
    url: 'sale_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.salid').val(response.salid);
      $('.sale_id').html(response.sale_id);
      $('#edit_cliente').val(response.first_name+' '+response.last_name);
      $('#edit_vehi').val(response.patent+' '+response.brand);
      $('#edit_me').val(response.pay_method);
      $('#edit_bs').val(response.total_ve);
      $('#edit_us').val(response.total_us);
      $('#edit_ref').val(response.pay_reference);
    }
  });
}
</script>

<script> 
    $('#example10').DataTable( {
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
