<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Agregar Cliente</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="customer_add.php">
                <div class="form-group">
                  <label for="document" class="col-sm-3 control-label">Cédula<span class="text-danger "> * </span></label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="document" name="document" placeholder="V-25679836">
                </div>
                </div>
          		  <div class="form-group">
                  	<label for="first_name" class="col-sm-3 control-label">Nombre<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="first_name" name="first_name" required placeholder="Ej. Ana">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="last_name" class="col-sm-3 control-label">Apellido<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Ej. Rodriguez">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="address" class="col-sm-3 control-label">Dirección<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                      <textarea class="form-control" name="address" id="address" placeholder="Ej. La mora, Av 12 Casa nro 15"></textarea>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label">Teléfono<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Ej. 04123789023">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" placeholder="Ej. ana23@gmail.com">
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
            	<h4 class="modal-title"><b><span class="customer_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="customer_edit.php">
            		<input type="hidden" class="cusid" name="id">
                <div class="form-group">
                    <label for="edit_document" class="col-sm-3 control-label">Cédula<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_document" name="edit_document">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_first_name" class="col-sm-3 control-label">Nombre<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_first_name" name="edit_first_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_last_name" class="col-sm-3 control-label">Apellido<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_last_name" name="edit_last_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_address" class="col-sm-3 control-label">Dirección<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="edit_address" id="edit_address"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_phone" class="col-sm-3 control-label">Teléfono<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="edit_phone" id="edit_phone"></input>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_email" class="col-sm-3 control-label">Email<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_email" name="edit_email">
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
            	<h4 class="modal-title"><b><span class="customer_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="customer_delete.php">
            		<input type="hidden" class="cusid" name="id">
            		<div class="text-center">
	                	<p>¿DESEA ELIMINAR ESTE CLIENTE?</p>
	                	<h2 class="bold del_customer_name"></h2>
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
