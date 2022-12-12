<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Agregar Concepto</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="concept_add.php">
          		  <div class="form-group">
                  	<label for="name" class="col-sm-3 control-label">Nombre del concepto<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="name" name="name" required  placeholder="Ej. Seguro social">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="amount" class="col-sm-3 control-label">Monto Bs<span class="text-danger "> * </span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="amount" name="amount" required  placeholder="Ej. 200.00">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="type" class="col-sm-3 control-label">Tipo de concepto<span class="text-danger ">*</span></label>

                  	<div class="col-sm-9">
                      <select class="form-control" name="type" id="type">
                        <option value="1">Deduccion</option>
                        <option value="2">Asignacion</option>
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
            	<h4 class="modal-title"><b><span class="concept_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="concept_edit.php">
            		<input type="hidden" class="conid" name="id">
                <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Nombre del concepto<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="edit_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_amount" class="col-sm-3 control-label">Monto Bs<span class="text-danger "> * </span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_amount" name="edit_amount">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_type" class="col-sm-3 control-label">Tipo de concepto<span class="text-danger ">*</span></label>

                    <div class="col-sm-9">
                      <select class="form-control" name="edit_type" id="edit_type">
                        <option selected id="type_val"></option>
                        <option value="1">Deduccion</option>
                        <option value="2">Asignacion</option>
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
            	<h4 class="modal-title"><b><span class="concept_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="concept_delete.php">
            		<input type="hidden" class="conid" name="id">
            		<div class="text-center">
	                	<p>¿DESEA ELIMINAR ESTE CONCEPTO?</p>
	                	<h2 class="bold del_concept_name"></h2>
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
