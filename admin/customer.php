<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Lista de Clientes
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Clientes</li>
        <li class="active">Lista de Clientes</li>
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
            </div>
            <div class="box-body">
              <table id="example7" class="table table-bordered">
                <thead>
                  <th>ID Cliente</th>
                  <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Dirección</th>
                  <th>Contacto</th>
                  <th>Email</th>
                  <th>Ingreso</th>
                  <th>Acción</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, customers.id AS cusid FROM customers";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['customer_id']; ?></td>
                          <td><?php echo $row['document']; ?></td>
                          <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td><?php echo $row['phone']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['created_at'])) ?></td>
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['cusid']; ?>"><i class="fa fa-edit"></i> Editar</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['cusid']; ?>"><i class="fa fa-trash"></i> Eliminar</button>
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
  <?php include 'includes/customer_modal.php'; ?>
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
    url: 'customer_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.cusid').val(response.cusid);
      $('.customer_id').html(response.customer_id);
      $('.del_customer_name').html(response.first_name+' '+response.last_name);
      $('#customer_name').html(response.first_name+' '+response.last_name);
      $('#edit_first_name').val(response.first_name);
      $('#edit_last_name').val(response.last_name);
      $('#edit_address').val(response.address);
      $('#edit_phone').val(response.phone);
      $('#edit_email').val(response.email);
      $('#edit_document').val(response.document);
    }
  });
}
</script>
<script> 
    $('#example7').DataTable( {
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
