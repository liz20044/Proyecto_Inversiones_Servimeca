<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Lista de Conceptos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Conceptos</li>
        <li class="active">Lista de Conceptos</li>
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
              <table id="example5" class="table table-bordered">
                <thead>
                  <th>Nombre</th>
                  <th>Monto Bs</th>
                  <th>Tipo</th>
                  <th>Acción</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, concepts.id AS conid FROM concepts";
                    $query = $conn->query($sql);
                    $type_concept = ['Deduccion', 'Asignacion'];
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo number_format($row['amount'], 2); ?></td>
                          <td><?php echo $type_concept[$row['type'] - 1]; ?></td>
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['conid']; ?>"><i class="fa fa-edit"></i> Editar</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['conid']; ?>"><i class="fa fa-trash"></i> Eliminar</button>
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
  <?php include 'includes/concept_modal.php'; ?>
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
  const typeConcept = ['Deduccion', 'Asignacion']

  $.ajax({
    type: 'POST',
    url: 'concept_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.conid').val(response.conid);
      $('.concept_id').html(response.id);
      $('.del_concept_name').html(response.name);
      $('#concept_name').html(response.name);
      $('#edit_name').val(response.name);
      $('#edit_amount').val(response.amount);
      $('#type_val').val(response.type).html(typeConcept[response.type - 1]);
    }
  });
}
</script>
<script> 
    $('#example5').DataTable( {
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
