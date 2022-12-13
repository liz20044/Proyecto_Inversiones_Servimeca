<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
$customers = [];
$sql = "SELECT * FROM customers";
$query = $conn->query($sql);
while($prow = $query->fetch_assoc()){
    $customers[] = $prow;
}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Vehiculos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Vehiculos</li>
        <li class="active">Lista de Vehiculos</li>
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
              <table id="example8" class="table table-bordered">
                <thead>
                  <th>Matricula</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Color</th>
                  <th>Motor</th>
                  <th>Chasis</th>
                  <th>Cliente</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, vehicles.id AS vehid FROM vehicles LEFT JOIN customers ON customers.id=vehicles.customer_id";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['patent']; ?></td>
                          <td><?php echo $row['brand']; ?></td>
                          <td><?php echo $row['model']; ?></td>
                          <td><?php echo $row['color']; ?></td>
                          <td><?php echo $row['engine']; ?></td>
                          <td><?php echo $row['chassis']; ?></td>
                          <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                          <td><?php echo $row['status'] ? 'Activo' : 'Inactivo'; ?></td>
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['vehid']; ?>"><i class="fa fa-edit"></i> Editar</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['vehid']; ?>"><i class="fa fa-trash"></i> Eliminar</button>
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
  <?php include 'includes/vehicle_modal.php'; ?>
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

  function customerSearch(document_customer, action = '') {
    const customers = <?php echo json_encode($customers) ?>;
    const customer = customers.find(customer => customer.document === document_customer)

    if (customer !== undefined) {
      $('#' + action + 'customer_info').val(`${customer.first_name} ${customer.last_name}`)
      $('#' + action + 'customer').val(customer.id)
    } else {
      $('#' + action + 'customer_info').val('No encontrado')
      $('#' + action + 'customer').val('')
    }
  }

  $('#customer_document').keyup((e) => customerSearch(e.target.value));
  $('#edit_customer_document').keyup((e) => customerSearch(e.target.value, 'edit_'));
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'vehicle_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.vehid').val(response.vehid);
      $('.vehicle_id').html(response.patent);
      $('.del_vehicle_name').html(response.brand+' '+response.model);
      $('#vehicle_name').html(response.brand+' '+response.model);
      $('#edit_patent').val(response.patent);
      $('#edit_brand').val(response.brand);
      $('#edit_model').val(response.model);
      $('#edit_color').val(response.color);
      $('#edit_engine').val(response.engine);
      $('#edit_chassis').val(response.chassis);
      $('#status_val').val(response.status).html(Number(response.status) === 1 ? 'Activo' : 'Inactivo');
      $('#customer_val').val(response.id).html(response.first_name + ' ' + response.last_name);

      $('#edit_customer_document').val(response.document);
      $('#edit_customer').val(response.id);
      $('#edit_customer_info').val(response.first_name + ' ' + response.last_name);
    }
  });
}
</script>
<script> 
    $('#example8').DataTable( {
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
