<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      Bitácora
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Bitácora</li>
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
                <div>
                <div class="box-header with-border">
                  <div class="box-body">
                    <table id="example25" class="table table-dark">
                      <thead class="thead-dark">
                        <th>Ejecutor</th>
                        <th>Fecha</th>
                        <th>Actividad Realizada</th>
                        <th>Información Actual</th>
                        <th>Información Anterior</th>
                      </thead>
                      <tbody>
                        <?php
                          $sql = "SELECT * FROM `bitacora` ";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                            ?>
                              <tr>
                                <td><?php echo $row['ejecutor']; ?></td>
                                <td><?php echo $row['fecha']; ?></td>
                                <td><?php echo $row['actividad_realizada']; ?></td>
                                <td><?php echo $row['informacion_actual']; ?></td>
                                <td><?php echo $row['informacion_anterior']; ?></td>
                              </tr>
                            <?php
                          }
                        ?>
                      </tbody>
                    </table> 
                  </div>  <hr>
                  <div class="col-lg-6 col-xs-6"><a href="backup.php" type="btn-button">
                    <div class="small-box bg-gray" >
                      <div class="inner bg-gray">
                            

                          <hr> <center><h4 class="mx-5" style="height: 18px;">Realizar Copia de Seguridad de la Base de Datos <hr>  </h4></center><br>
                      </div>
                      <div class="icon">
                        <i class="fa fa-copy"></i>
                      </div>
                      <div class="small-box-footer"><i class="fa fa-database"></i></div>
                    </div></a>
                  </div>
                  <div class="col-lg-6 col-xs-6 text-center"> 
                    <div class="small-box bg-gray">
                      <div class="inner bg-gray">
                            
                      <form action="Restore.php" method="POST" >
                      <label>Restaurar Base de Datos</label><br>
                      <select class="form-control "name="restorePoint" required >
                        <option value="" disabled="" selected="" >Selecciona un punto de restauración</option>
                        <?php
                          include_once 'Connet.php';
                          $ruta=BACKUP_PATH;
                          if(is_dir($ruta)){
                              if($aux=opendir($ruta)){
                                  while(($archivo = readdir($aux)) !== false){
                                      if($archivo!="."&&$archivo!=".."){
                                          $nombrearchivo=str_replace(".sql", "", $archivo);
                                          $nombrearchivo=str_replace("", "", $nombrearchivo);
                                          $ruta_completa=$ruta.$archivo;
                                          if(is_dir($ruta_completa)){
                                          }else{
                                              echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
                                          }
                                      }
                                  }
                                  closedir($aux);
                              }
                          }else{
                              echo $ruta." No es ruta válida";
                          }
                      
                        ?>
                      </select><br>
                      <button type="submit" class="btn btn-primary" >Restaurar</button>
                    </form>
                      </div>
                      <div class="icon">
                        <i class="ion ion-database"></i>
                      </div>
                      
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
    $('#example25').DataTable( {
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
