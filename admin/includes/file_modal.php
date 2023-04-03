<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Asignar Concepto</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="file_add.php">
                <div class="form-group">
                    <label for="employee" class="col-sm-3 control-label">Empleado<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <select class="form-control" name="employee" id="employee" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM employees";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['employee_id']. " - ".$prow['firstname']. " " . $prow['lastname'] . "</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="concept" class="col-sm-3 control-label">Conceptos<span class="text-danger "> * </span></label>

                    <input type="hidden" name="cart_concept" id="cart_concept">

                  	<div class="col-sm-7">
                        <select class="form-control" name="concept" id="concept">
                            <option value="" selected>- Seleccionar -</option>
                            <?php
                            $sql = "SELECT * FROM concepts";
                            $query = $conn->query($sql);
                            while($prow = $query->fetch_assoc()){
                                echo "
                                <option value='".$prow['id']."'>".$prow['name']. " - " . $type_concept[$prow['type'] - 1] . " - " . number_format($prow['amount'], 2) . "</option>
                                ";

                                $concepts[] = $prow;
                            }
                            ?>
                        </select>
                  	</div>

                    <div class="col-sm-2">
                        <button class="btn btn-primary" type="button" id="btn-add-concept-to-cart">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm">
                        <div class="text-center">
                            <p><b>Conceptos agregados</b></p>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="cart-table-body">
                            </tbody>
                        </table>
                    </div>
                </div>
                <h5 class="control-label text-danger "> Campos obligatorios (*)</h5>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>



<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="file_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="file_delete.php">
            		<input type="hidden" class="filid" name="id">
            		<div class="text-center">
	                	<p>¿DESEA ELIMINAR ESTA ASIGNACION DE CONCEPTO?</p>
	                	<h2 class="bold del_file_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Eliminar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
