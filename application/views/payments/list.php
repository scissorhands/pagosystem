<div class="container">
	<table class="table table-stripped">
		<thead>
			<tr>
				<th>ID</th>
				<th>CONCEPTO</th>
				<th>MONTO TOTAL</th>
				<th>USERS</th>
				<th>STATUS</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
			</tr>
		</tbody>
	</table>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
	  Add Concept
	</button>
	<?php echo validation_errors('<div class="alert alert-danger">', "</div>"); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog"> a
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrar concepto</h4>
      </div>


      <div class="modal-body">
      	<div class="container">
      		
      	<?php $hidden = array('user_id' => 1); ?>
        <?php echo form_open('payments/', '', $hidden); ?>
        	<div class ="form-group">
        		<?php echo form_label('Usuario que absorbe el pago', 'user'); ?><br>
        		<?php echo form_dropdown('user', $users_drop); ?>
        	</div>
        	<br>
        	<div class ="form-group">
        		<?php echo form_label('Descripcion del concepto', 'description'); ?><br>
        		<?php echo form_input('description', '', "placeholder='Descripción'", 'class="form-control"'); ?>
        	</div>
        	<br>
        	<div class ="form-group">
        		<?php echo form_label('Regla a aplicar', 'rule'); ?><br>
        		<?php echo form_dropdown('rule', $rules_drop); ?>
        	</div>
        	<br>
        	<div class ="form-group">
        		<?php echo form_label('Monto total del concepto', 'amount'); ?><br>
        		<?php echo form_input('total_amount', '', "placeholder='Monto Total'"); ?>
        	</div>
      	</div>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo form_submit('submit', 'Save Concept', 'class="btn btn-primary"'); ?>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8" async defer>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus();
});
</script>