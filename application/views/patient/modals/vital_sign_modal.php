<div class="row">
	<div class="col-sm-12">
		<h4 class="header red clearfix">
			<?php echo $result['title']; ?>
		</h4>
		<?php $field_data = issetor($result,'field_data');  ?>
		<form id="vital_sign_form" data-title="<?php echo $result['title']; ?>" class="form-horizontal big-input padding-lr-12" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="vital_sign_temperature">Temperature</label>

				<div class="col-sm-7">
					<input name="vital_sign_temperature" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'vital_sign_temperature','value'); ?>">
				</div>
				<label class="col-sm-2 control-label align-left" data-label="extension" for="vital_sign_temperature">C</label>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="vital_sign_systolic">Systolic</label>

				<div class="col-sm-7">
					<input name="vital_sign_systolic" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'vital_sign_systolic','value'); ?>">
				</div>
				<label class="col-sm-2 control-label align-left" data-label="extension" for="vital_sign_systolic">mm/Hg</label>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="vital_sign_diastolic">Diastolic</label>

				<div class="col-sm-7">
					<input name="vital_sign_diastolic" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'vital_sign_diastolic','value'); ?>">
				</div>
				<label class="col-sm-2 control-label align-left" data-label="extension" for="vital_sign_diastolic">mm/Hg</label>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="vital_sign_cardiac_rate"> Cardiac Rate </label>

				<div class="col-sm-7">
					<input name="vital_sign_cardiac_rate" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'vital_sign_cardiac_rate','value'); ?>">
				</div>
				<label class="col-sm-2 control-label align-left" data-label="extension" for="vital_sign_cardiac_rate"> /min </label>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="vital_sign_respiratory_rate"> Respiratory Rate </label>

				<div class="col-sm-7">
					<input name="vital_sign_respiratory_rate" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'vital_sign_respiratory_rate','value'); ?>">
				</div>
				<label class="col-sm-2 control-label align-left" data-label="extension" for="vital_sign_respiratory_rate"> /min </label>
			</div>
		</form>
	</div>
</div>



<script>
	var form = $('#vital_sign_form'),
		field_group = $('#physicalExam').find('div[data-head="'+form.data('title')+'"]');
		field_group = ( field_group.length ) ? field_group : $('#physicalExam');
	form.find('input, select, textarea').first().focus();

	$("#vital_sign_form input").keypress(function(e) {
	    if (e.which == 13) {
	       insertString( form , field_group );
	    }
	});

	$('.btn_ok_mdl').click(function(e){
		insertString( form , field_group );
	});
	
</script>