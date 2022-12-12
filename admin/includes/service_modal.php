<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Agregar Servicio</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="service_add.php">
          		  <div class="form-group">
                  	<label for="name" class="col-sm-3 control-label">Nombre del servicio<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="name" name="name" required placeholder="Ej. Cambio de aceite">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="price_ve" class="col-sm-3 control-label">Precio en bolivares<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="price_ve" name="price_ve" required placeholder="Ej. 200.00">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="price_us" class="col-sm-3 control-label">Precio en dolares<span class="text-danger ">*</span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="price_us" name="price_us" required placeholder="Ej. 10">
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
            	<h4 class="modal-title"><b><span class="service_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="service_edit.php">
            		<input type="hidden" class="serid" name="id">
                <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Nombre del servicio<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="edit_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_price_ve" class="col-sm-3 control-label">Precios en bolivares<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_price_ve" name="edit_price_ve">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_price_us" class="col-sm-3 control-label">Precios en dolares<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_price_us" name="edit_price_us">
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
            	<h4 class="modal-title"><b><span class="service_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="service_delete.php">
            		<input type="hidden" class="serid" name="id">
            		<div class="text-center">
	                	<p>¿DESEA ELIMINAR ESTE SERVICIO?</p>
	                	<h2 class="bold del_service_name"></h2>
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
