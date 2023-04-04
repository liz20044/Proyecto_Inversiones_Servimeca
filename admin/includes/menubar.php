<aside class="main-sidebar">
  <img src="../images/logo.jpeg" class="img-circle profile_img " width="70%">
    <br>
    <ul class="sidebar-menu" data-widget="tree">
    <div class="text-center">
        <a href="home.php"> <h3><span class="fa fa-gear text-center"> IS Process Taller</span></a></h3>
    </div>
      <li class="header">PRINCIPAL</li>
      <li class=""><a href="home.php"><i class="fa fa-home"></i> <span> Inicio</span></a></li>
      <li class="header">ADMINISTRACIÓN</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-calendar"></i>
          <span>Horarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="employee.php"><i class="fa fa-user-o"></i> Lista de Empleados</a></li>
          <li><a href="schedule.php"><i class="fa fa-clock-o"></i> Crear Horarios</a></li>
          <li><a href="schedule_employee.php"><i class="fa fa-calendar-check-o"></i> <span> Horarios</span></a></li>
          <li><a href="attendance.php"><i class="fa fa-street-view"></i> Asistencia</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-text"></i>
          <span>Nómina</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="concept.php"><i class="fa fa-edit"></i> Conceptos</a></li>
          <li><a href="file.php"><i class="fa fa-check-square-o"></i> Asignación de Concepto</a></li>
          <li><a href="generate_payroll.php"><i class="fa fa-file-text-o"></i> Generar nueva nómina</a></li>
          <li><a href="payrolls.php"><i class="fa fa-id-card-o"></i> Lista de nóminas generadas</a></li>
        </ul>
        <li class="treeview">
        <a href="#">
          <i class="fa fa-car"></i>
          <span>Tabulador de Costos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
              <a href="service.php">
                  <i class="fa fa-wrench"></i>
                  <span>Servicios</span>
              </a>
          </li>
          <li>
              <a href="customer.php">
                  <i class="fa fa-user"></i>
                  <span>Clientes</span>
              </a>
          </li>
          <li>
              <a href="vehicle.php">
                  <i class="fa fa-car"></i>
                  <span>Vehículos</span>
              </a>
          </li>
          <li>
              <a href="sale_generate.php">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Generar Factura</span>
              </a>
          </li>
          <li>
              <a href="sale.php">
                  <i class="fa fa-list"></i>
                  <span>Lista de Facturas</span>
              </a>
          </li>
        </ul>
      </li>
      <li class="header">INFORMACIÓN</li>
      <!-- Condiciona el usuario por tipo administrador para mostrar o ocultar  -->
      <?php  
        if ($user["tipo_users"] == "administrador") {
          echo '<li class="treeview">
            <a href="#">
              <i class="fa fa-gear"></i>
              <span>Configuración</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="auditoria.php"><i class="fa fa-gear"></i> <span>Bitácora</span></a></li>
            </ul>
          </li>';
        } 
      ?>

      <li><a href="../Manual de Instalación IS Process Taller.pdf"><i class="fa fa-clock-o"></i> <span>Ayuda</span></a></li>
    </ul>
  <!-- /.sidebar -->
</aside>




