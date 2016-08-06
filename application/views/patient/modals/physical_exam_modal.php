<div class="row">
	<div class="col-sm-12">
		<h4 class="header red clearfix">
			<?php echo $result['title']; ?>
		</h4>
		<?php $field_data = issetor($result,'field_data');  ?>
		<form id="physical_exam_form" data-title="<?php echo $result['title']; ?>"  class="form-horizontal padding-lr-12 compress" role="form">

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_eyes">Eyes</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_eyes" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_eyes','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_eyes','remarks'); ?>" for="physical_exam_eyes">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_nose">Nose</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_nose" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_nose','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_nose','remarks'); ?>" for="physical_exam_nose">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_ears">Ears</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_ears" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_ears','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_ears','remarks'); ?>" for="physical_exam_ears">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_throat">Throat</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_throat" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_throat','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_throat','remarks'); ?>" for="physical_exam_throat">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_chest_lungs">Chest/Lungs</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_chest_lungs" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_chest_lungs','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_chest_lungs','remarks'); ?>" for="physical_exam_chest_lungs">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_heart">Heart</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_heart" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_heart','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_heart','remarks'); ?>" for="physical_exam_heart">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_abdomen">Abdomen</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_abdomen" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_abdomen','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_abdomen','remarks'); ?>" for="physical_exam_abdomen">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_genitalia">Genitalia</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_genitalia" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_genitalia','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_genitalia','remarks'); ?>" for="physical_exam_genitalia">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_rectal">Rectal</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_rectal" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_rectal','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_rectal','remarks'); ?>" for="physical_exam_rectal">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_extremeties">Extremeties</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_extremeties" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_extremeties','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_extremeties','remarks'); ?>" for="physical_exam_extremeties">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_skin">Skin</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_skin" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_skin','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_skin','remarks'); ?>" for="physical_exam_skin">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" data-label="field" for="physical_exam_neurlogic">Neurlogic</label>

				<div class="col-sm-3 no-padding-right">
					<select name="physical_exam_neurlogic" data-label="value" class="col-sm-12">
						<?php echo dropDown('physical_exam',issetor($field_data,'physical_exam_neurlogic','value')) ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input class="form-control input-sm" type="text" data-label="remarks" placeholder="Remarks" value="<?php echo issetor2($field_data,'physical_exam_neurlogic','remarks'); ?>" for="physical_exam_neurlogic">
				</div>
			</div>
			
		</form>
	</div>
</div>

<script>
	var form = $('#physical_exam_form'),
		field_group = $('#physicalExam').find('div[data-head="'+form.data('title')+'"]');
		field_group = ( field_group.length ) ? field_group : $('#physicalExam');
	form.find('input, select, textarea').first().focus();

	$("#physical_exam_form input").keypress(function(e) {
	    if (e.which == 13) {
	       insertString( form, field_group );
	    }
	});

	$('.btn_ok_mdl').click(function(e){
		insertString( form, field_group );
	});
	
</script>