<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Agregar Vehiculo</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="vehicle_add.php">
          		  <div class="form-group">
                  	<label for="patent" class="col-sm-3 control-label">Matricula<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="patent" name="patent" required placeholder="Ej. A32BC3">
                  	</div>
                    </div>
                <div class="form-group">
                  	<label for="brand" class="col-sm-3 control-label">Marca<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="brand" name="brand" required placeholder="Ej. Chevrolet">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="model" class="col-sm-3 control-label">Modelo<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="model" name="model" required placeholder="Ej. Corsa">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="color" class="col-sm-3 control-label">Color<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="color" name="color" required placeholder="Ej. Azul">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="engine" class="col-sm-3 control-label">Motor<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="engine" name="engine" required placeholder="Ej. V8-404">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="chassis" class="col-sm-3 control-label">Chasis<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="chassis" name="chassis" required placeholder="Ej. 123-CHA" >
                  	</div>
                </div>
                <div class="form-group">
                  <label for="customer_document" class="col-sm-3 control-label">Cédula<span class="text-danger "> * </span></label>

                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="customer_document" id="customer_document" placeholder="V-39067823">
                  </div>
                </div>
                <div class="form-group">
                  <label for="customer" class="col-sm-3 control-label">Cliente<span class="text-danger "> * </span></label>

                  <div class="col-sm-9">
                    <input type="hidden" name="customer" id="customer">
                    <input class="form-control" type="text" name="customer_info" id="customer_info" value="No encontrado" readonly>
                  </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">Estado<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <select class="form-control" name="status" id="status" required>
                        <option value="" selected>- Seleccionar -</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                      </select>
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

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="vehicle_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="vehicle_edit.php">
            		<input type="hidden" class="vehid" name="id">
                <div class="form-group">
                    <label for="edit_patent" class="col-sm-3 control-label">Matricula<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_patent" name="edit_patent">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_brand" class="col-sm-3 control-label">Marca<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_brand" name="edit_brand">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_model" class="col-sm-3 control-label">Modelo<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_model" name="edit_model">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_color" class="col-sm-3 control-label">Color<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_color" name="edit_color">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_engine" class="col-sm-3 control-label">Motor<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_engine" name="edit_engine">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_chassis" class="col-sm-3 control-label">Chasis<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_chassis" name="edit_chassis">
                    </div>
                </div>
                <div class="form-group">
                  <label for="edit_customer_document" class="col-sm-3 control-label">Cédula <span class="text-danger "> * </span></label>

                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="edit_customer_document" id="edit_customer_document" placeholder="V-39067823">
                  </div>
                </div>
                <div class="form-group">
                  <label for="edit_customer" class="col-sm-3 control-label">Cliente <span class="text-danger "> * </span></label>

                  <div class="col-sm-9">
                    <input type="hidden" name="edit_customer" id="edit_customer">
                    <input class="form-control" type="text" name="edit_customer_info" id="edit_customer_info" value="No encontrado" readonly>
                  </div>
                </div>
                <div class="form-group">
                    <label for="edit_status" class="col-sm-3 control-label">Estado<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <select class="form-control" name="edit_status" id="edit_status">
                        <option selected id="status_val"></option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                      </select>
                    </div>
                </div>
                <h5 class="control-label text-danger "> Campos obligatorios (*)</h5>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
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
            	<h4 class="modal-title"><b><span class="vehicle_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="vehicle_delete.php">
            		<input type="hidden" class="vehid" name="id">
            		<div class="text-center">
	                	<p>¿DESEA ELIMINAR ESTE VEHICULO?</p>
	                	<h2 class="bold del_vehicle_name"></h2>
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
