<?php $concepts = []; ?>
<?php $type_concept = ['Deduccion', 'Asignacion']; ?>
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
        Lista de Asignacion de Conceptos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Conceptos</li>
        <li class="active">Lista de Asignacion de Conceptos</li>
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
              <table id="example5" class="table table-bordered">
                <thead>
                  <th>Empleado</th>
                  <th>Fecha de Creacion</th>
                  <th>Acciones</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, files.id AS filid FROM files LEFT JOIN employees ON employees.id=files.employee_id";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['created_on'])) ?></td>
                          <td>
                            <a class="btn btn-primary btn-sm btn-flat" href="file_detail.php?file=<?php echo $row['filid'] ?>"><i class="fa fa-eye"></i></a>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['filid']; ?>"><i class="fa fa-trash"></i> Eliminar</button>
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
  <?php include 'includes/file_modal.php'; ?>
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

    let cartConcept = []

    const typeConcept = ['Deduccion', 'Asignacion']

    function removeConcept(id) {
        const newCartConcept = cartConcept.filter(c => c.id !== id)
        cartConcept = [...newCartConcept]
    }

    const concepts = <?php echo json_encode($concepts) ?>

    $('#btn-add-concept-to-cart').click(function (e) {
        e.preventDefault();
        const conceptSelect = document.getElementById('concept')

        if (conceptSelect.value !== '') {
            if (cartConcept.length > 0) {
                const newCartConcept = cartConcept.filter(c => c.id !== conceptSelect.value)
                cartConcept = [...newCartConcept]
            }

            cartConcept.push(concepts.find(c => c.id === conceptSelect.value))

            document.getElementById('cart_concept').value = JSON.stringify(cartConcept)

            conceptSelect.children[conceptSelect.selectedIndex].remove()

            const cartTableBody = document.getElementById('cart-table-body')

            cartConcept.forEach(concept => {
                tr = document.createElement('tr')
                tr.id = concept.id
                tr.innerHTML = `
                    <td>${concept.name}</td>
                    <td>${typeConcept[concept.type - 1]}</td>
                `

                const td = document.createElement('td')

                const button = document.createElement('button')
                button.type = 'button'
                button.className = 'btn btn-danger'
                button.innerHTML = `
                    <i class="fa fa-trash"></i>
                `

                button.onclick = () => {
                    const option = document.createElement('option')
                    option.value = concept.id
                    option.innerText = concept.name + " - " + typeConcept[concept.type - 1] + " - " + concept.amount
                    conceptSelect.appendChild(option)

                    removeConcept(concept.id)

                    document.getElementById('cart_concept').value = JSON.stringify(cartConcept)

                    document.getElementById(concept.id).remove()
                }

                td.appendChild(button)
                tr.appendChild(td)

                if (document.getElementById(concept.id) === null) {
                    cartTableBody.appendChild(tr)
                }
            })
        }
    })
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'file_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.filid').val(response.filid);
      $('.file_id').html(response.filid);
      $('.del_file_name').html(response.filid);
      $('#file_name').html(response.filid);
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
