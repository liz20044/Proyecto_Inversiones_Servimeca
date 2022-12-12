<?php $services = []; ?>
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
        Generar Reparacion
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Reparaciones</li>
        <li class="active">Generar Reparacion</li>
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
                <form method="POST" action="sale_add.php">
                    <div class="row">
                        <div class="col-xs-3 form-group">
                            <label for="customer_document" class="control-label">Cédula<span class="text-danger "> * </span></label>
                            <input class="form-control" type="text" name="customer_document" id="customer_document">
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="customer" class="control-label">Cliente<span class="text-danger "> * </span></label>
                            <input type="hidden" name="customer" id="customer">
                            <input class="form-control" type="text" name="customer_info" id="customer_info" value="No encontrado" readonly>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="vehicle" class="control-label">Vehiculo<span class="text-danger "> * </span></label>
                            <select class="form-control" name="vehicle" id="vehicle" required>
                                <option value="" selected>- Seleccionar -</option>
                                <?php
                                $sql = "SELECT * FROM vehicles";
                                $query = $conn->query($sql);
                                while($prow = $query->fetch_assoc()){
                                    echo "
                                    <option class='".$prow['customer_id']."-vehicles vehicles' value='".$prow['id']."'>".$prow['brand']. " " . $prow['model'] . "</option>
                                    ";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 form-group text-center">
                            <label for="service" class="control-label">Servicios<span class="text-danger "> * </span></label>
                        </div>
                        <div class="col-xs-8 form-group">
                            <input type="hidden" name="cart_services" id="cart_services">

                            <select class="form-control" name="service" id="service">
                                <option value="" selected>- Seleccionar -</option>
                                <?php
                                $sql = "SELECT * FROM services";
                                $query = $conn->query($sql);
                                while($prow = $query->fetch_assoc()){
                                    echo "
                                    <option value='".$prow['id']."'>".$prow['service_id']. " - " . $prow['name'] . "</option>
                                    ";

                                    $services[] = $prow;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-2 form-group text-center">
                            <button class="btn btn-primary" type="button" id="btn-add-service-to-cart">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-xs-12 form-group">
                            <div class="text-center">
                                <p><b>Servicios agregados</b></p>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Referencia</th>
                                        <th>Servicio</th>
                                        <th>VES</th>
                                        <th>USD</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="cart-table-body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="total_ve" class="control-label">Total VES</label>
                            <input class="form-control" type="text" name="total_ve" id="total_ve" value="0" readonly>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="total_us" class="control-label">Total USD</label>
                            <input class="form-control" type="text" name="total_us" id="total_us" value="0" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="pay_method" class="control-label">Metodo de pago<span class="text-danger "> * </span></label>
                            <select class="form-control" name="pay_method" id="pay_method" required>
                                    <option value="Pago movil">Pago Movil</option>
                                    <option value="Efectivo Bs">Efectivo Bs</option>
                                    <option value="Punto">Punto</option>
                                    <option value="Dolares">Dolares</option>
                            </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="pay_reference" class="control-label">Referencia de pago<span class="text-danger "> * </span></label>
                            <input class="form-control" type="text" name="pay_reference" id="pay_reference" required>
                        </div>
                    </div>
                    <h5 class="control-label text-danger "> Campos obligatorios (*)</h5>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit" name="add">
                            <i class="fa fa-floppy-o"></i>
                            Generar reparacion
                        </button>
                    </div>
                </form>
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
    $('.vehicles').hide();

    $('#customer').change(function (e) {
        e.preventDefault();
        let customerId =  this.value;
        $('.vehicles').hide();
        $('.' + customerId + '-vehicles').show();
    });

    let cartServices = []

    function removeService(id) {
        const newCartService = cartServices.filter(s => s.id !== id)
        cartServices = [...newCartService]
    }

    const services = <?php echo json_encode($services) ?>;
    const customers = <?php echo json_encode($customers) ?>;

    $('#btn-add-service-to-cart').click(function (e) {
        e.preventDefault();
        const serviceSelect = document.getElementById('service')

        if (serviceSelect.value !== '') {
            if (cartServices.length > 0) {
                const newCartServices = cartServices.filter(s => s.id !== serviceSelect.value)
                cartServices = [...newCartServices]
            }

            cartServices.push(services.find(s => s.id === serviceSelect.value))

            document.getElementById('cart_services').value = JSON.stringify(cartServices)

            serviceSelect.children[serviceSelect.selectedIndex].remove()

            const cartTableBody = document.getElementById('cart-table-body')

            const totalBs = document.getElementById('total_ve')
            const totalUs = document.getElementById('total_us')

            cartServices.forEach(service => {
                const totals = services
                    .filter(s => s.id === service.id)
                    .map(s => ({ total_us: s.price_us, total_bs: s.price_ve })).pop()

                tr = document.createElement('tr')
                tr.id = service.id
                tr.innerHTML = `
                    <td>${service.service_id}</td>
                    <td>${service.name}</td>
                    <td>${service.price_ve}</td>
                    <td>${service.price_us}</td>
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
                    option.value = service.id
                    option.innerText = service.service_id + " - " + service.name
                    serviceSelect.appendChild(option)

                    totalUs.value = Number(totalUs.value) - Number(totals.total_us)
                    totalBs.value = Number(totalBs.value) - Number(totals.total_bs)

                    removeService(service.id)

                    document.getElementById('cart_services').value = JSON.stringify(cartServices)

                    document.getElementById(service.id).remove()
                }

                td.appendChild(button)
                tr.appendChild(td)

                if (document.getElementById(service.id) === null) {
                    cartTableBody.appendChild(tr)

                    totalUs.value = Number(totalUs.value) + Number(totals.total_us)
                    totalBs.value = Number(totalBs.value) + Number(totals.total_bs)
                }
            })
        }
    });

    $('#customer_document').keyup(function (e) {
        let document_customer = this.value
        const customer = customers.find(customer => customer.document === document_customer)

        if (customer !== undefined) {
            $('#customer_info').val(`${customer.first_name} ${customer.last_name}`)
            $('#customer').val(customer.id)

            $('.vehicles').hide();
            $('.' + customer.id + '-vehicles').show();
        } else {
            $('#customer_info').val('No encontrado')
            $('#customer').val('')

            $('.vehicles').hide();
        }
    });
});
</script>
</body>
</html>
