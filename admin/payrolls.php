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
        Lista de Nominas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Nominas</li>
        <li class="active">Lista de Nominas</li>
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
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>ID Nomina</th>
                  <th>Fecha de pago</th>
                  <th>Monto Bs</th>
                  <th>Acciones</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT DISTINCT payroll_id, date_pay, SUM(amount) AS total_amount FROM payroll";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['payroll_id']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['date_pay'])) ?></td>
                          <td><?php echo number_format($row['total_amount'], 2); ?></td>
                          <td>
                            <a class="btn btn-primary btn-sm btn-flat" href="payroll_detail.php?payroll=<?php echo $row['payroll_id'] ?>"><i class="fa fa-eye"></i></a>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['payroll_id']; ?>"><i class="fa fa-trash"></i> Eliminar</button>
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
  <?php include 'includes/payroll_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
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
    url: 'payroll_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.payid').val(response.payroll_id);
      $('.payroll_id').html(response.payroll_id);
      $('.del_payroll_name').html(response.payroll_id);
      $('#payroll_name').html(response.payroll_id);
    }
  });
}
</script>
</body>
</html>

