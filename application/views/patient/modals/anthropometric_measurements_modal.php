<div class="row">
	<div class="col-sm-12">
		<h4 class="header red clearfix">
			<?php echo $result['title']; ?>
		</h4>
		<?php $field_data = issetor($result,'field_data');  ?>
		<form id="anthropometric_measurements_form" data-title="<?php echo $result['title']; ?>" class="form-horizontal big-input padding-lr-12 compress" role="form">
			<div class="form-group">
				<label class="col-sm-5 control-label no-padding-right" data-label="field" for="anthropometric_measurements_age">Age in (months)</label>

				<div class="col-sm-7">
					<input name="anthropometric_measurements_age" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'anthropometric_measurements_age','value'); ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label no-padding-right" data-label="field" for="anthropometric_height">Height (in m)</label>

				<div class="col-sm-7">
					<input name="anthropometric_height" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'anthropometric_height','value'); ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label no-padding-right" data-label="field" for="anthropometric_height_head_circumference">Head Circumference (in cm)</label>

				<div class="col-sm-7">
					<input name="anthropometric_height_head_circumference" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'anthropometric_height_head_circumference','value'); ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label no-padding-right" data-label="field" for="anthropometric_chest_circumference">Chest Circumference (in cm)</label>

				<div class="col-sm-7">
					<input name="anthropometric_chest_circumference" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'anthropometric_chest_circumference','value'); ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label no-padding-right" data-label="field" for="anthropometric_abdominal_circumference">Abdominal Circumference (in cm)</label>

				<div class="col-sm-7">
					<input name="anthropometric_abdominal_circumference" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'anthropometric_abdominal_circumference','value'); ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label no-padding-right" data-label="field" for="anthropometric_sex">Sex</label>

				<div class="col-sm-7">
					<input name="anthropometric_sex" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'anthropometric_sex','value'); ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label no-padding-right" data-label="field" for="anthropometric_weight">Weigth (in kg)</label>

				<div class="col-sm-7">
					<input name="anthropometric_weight" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'anthropometric_weight','value'); ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label no-padding-right" data-label="field" for="anthropometric_bmi">BMI</label>

				<div class="col-sm-7">
					<input name="anthropometric_bmi" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'anthropometric_bmi','value'); ?>">
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	var form = $('#anthropometric_measurements_form'),
		field_group = $('#physicalExam').find('div[data-head="'+form.data('title')+'"]');
		field_group = ( field_group.length ) ? field_group : $('#physicalExam');
		
	form.find('input, select, textarea').first().focus();

	$("#anthropometric_measurements_form input").keypress(function(e) {
	    if (e.which == 13) {
	       insertString( form, field_group );
	    }
	});

	$('.btn_ok_mdl').click(function(e){
		insertString( form, field_group );
	});

</script>