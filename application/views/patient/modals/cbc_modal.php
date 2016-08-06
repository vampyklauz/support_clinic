<div class="row">
	<div class="col-sm-12">
		<h4 class="header blue clearfix">
			<?php echo $result['title']; ?>
		</h4>
		<?php $field_data = issetor($result,'field_data'); ?>
		<form id="cbc_form" data-title="<?php echo $result['title']; ?>" class="form-horizontal big-input padding-lr-12 compress" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-left no-padding-right" data-label="field" for="cbc_notes">Note</label>

				<div class="col-sm-9">
					<textarea class="col-sm-12" name="cbc_notes" data-label="value"><?php echo issetor($field_data,'cbc_notes','value'); ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_hemoglobin">Hemoglobin</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_hemoglobin" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_hemoglobin','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_wbc">WBC</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_wbc" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_wbc','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_hematocrit">Hematocrit</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_hematocrit" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_hematocrit','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_lymphocytes">Lymphocytes</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_lymphocytes" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_lymphocytes','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_segmenters">Segmenters</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_segmenters" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_segmenters','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_moncytes">Moncytes</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_moncytes" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_moncytes','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_basophils">Basophils</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_basophils" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_basophils','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_myelocytes">Myelocytes</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_myelocytes" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_myelocytes','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_eosinophils">Eosinophils</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_eosinophils" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_eosinophils','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_promyelocytes">Promyelocytes</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_promyelocytes" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_promyelocytes','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_stabs">Stabs</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_stabs" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_stabs','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_metamyelocyte">Metamyelocyte</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_metamyelocyte" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_metamyelocyte','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="cbc_blasts">Blasts</label>

					<div class="col-sm-6 no-padding-right">
						<input name="cbc_blasts" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'cbc_blasts','value'); ?>">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>



<script>
	var form = $('#cbc_form');
		field_group = $('#labExam').find('div[data-head="'+form.data('title')+'"]');
		field_group = ( field_group.length ) ? field_group : $('#physicalExam');
		
	form.find('input, select, textarea').first().focus();

	$("#cbc_form input").keypress(function(e) {
	    if (e.which == 13) {
	       insertString( form , field_group );
	    }
	});

	$('.btn_ok_mdl').click(function(e){
		insertString( form , field_group );
	});
</script>