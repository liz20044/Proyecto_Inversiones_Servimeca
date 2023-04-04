<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="sale_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="sale_edit.php">
            		<input type="hidden" class="salid" name="id">
                <div class="form-group">
                    <label for="edit_cliente" class="col-sm-3 control-label">Cliente<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_cliente" name="edit_cliente" required maxlength="30">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_vehi" class="col-sm-3 control-label">Vehículo<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_vehi" name="edit_vehi" required maxlength="20" oninput="maxlengthNumber(this);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_me" class="col-sm-3 control-label">Método de pago<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_me" name="edit_me" required maxlength="20" oninput="maxlengthNumber(this);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_bs" class="col-sm-3 control-label">Total BS<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_bs" name="edit_bs" required maxlength="20" oninput="maxlengthNumber(this);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_us" class="col-sm-3 control-label">Total USD<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_us" name="edit_us" required maxlength="20" oninput="maxlengthNumber(this);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_ref" class="col-sm-3 control-label">Referencia<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_ref" name="edit_ref" required maxlength="20" oninput="maxlengthNumber(this);">
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
            	<h4 class="modal-title"><b><span class="sale_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="sale_delete.php">
            		<input type="hidden" class="salid" name="id">
            		<div class="text-center">
	                	<p>¿DESEA ELIMINAR ESTA FACTURA?</p>
	                	<h2 class="bold del_sale_name"></h2>
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
<script>
function maxlengthNumber (obj) {
  console.log(obj.value);
  if(obj.value.length > obj.maxLength ){
    obj.value = obj.value.slice(0, obj.maxLength);
  }
}
</script>