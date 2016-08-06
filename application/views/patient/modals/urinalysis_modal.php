<div class="row">
	<div class="col-sm-12">
		<h4 class="header blue clearfix">
			<?php echo $result['title']; ?>
		</h4>
		<?php $field_data = issetor($result,'field_data'); ?>
		<form id="urinalysis_form" data-title="<?php echo $result['title']; ?>" class="form-horizontal big-input padding-lr-12 compress" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-left no-padding-right" data-label="field" for="urinalysis_remarks">Remarks</label>

				<div class="col-sm-9">
					<textarea class="col-sm-12" name="urinalysis_remarks" data-label="value"><?php echo issetor($field_data,'urinalysis_remarks','value'); ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="urinalysis_color">Color</label>

					<div class="col-sm-6 no-padding-right">
						<input name="urinalysis_color" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'urinalysis_color','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="urinalysis_cast">Cast</label>

					<div class="col-sm-6 no-padding-right">
						<input name="urinalysis_cast" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'urinalysis_cast','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="urinalysis_reaction">Reaction</label>

					<div class="col-sm-6 no-padding-right">
						<input name="urinalysis_reaction" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'urinalysis_reaction','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="urinalysis_character">Character</label>

					<div class="col-sm-6 no-padding-right">
						<input name="urinalysis_character" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'urinalysis_character','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="urinalysis_specific_gravity">Specific Gravity</label>

					<div class="col-sm-6 no-padding-right">
						<input name="urinalysis_specific_gravity" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'urinalysis_specific_gravity','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="urinalysis_albumin">Albumin</label>

					<div class="col-sm-6 no-padding-right">
						<input name="urinalysis_albumin" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'urinalysis_albumin','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="urinalysis_sugar">Sugar</label>

					<div class="col-sm-6 no-padding-right">
						<input name="urinalysis_sugar" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'urinalysis_sugar','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="urinalysis_wbc">WBC</label>

					<div class="col-sm-4 no-padding-right">
						<input name="urinalysis_wbc" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'urinalysis_wbc','value'); ?>">
					</div>
					<label class="col-sm-2 control-label align-left" data-label="extension" for="urinalysis_wbc">MM/HG</label>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="urinalysis_rbc">RBC</label>

					<div class="col-sm-4 no-padding-right">
						<input name="urinalysis_rbc" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'urinalysis_rbc','value'); ?>">
					</div>
					<label class="col-sm-2 control-label align-left" data-label="extension" for="urinalysis_rbc">MM/HG</label>
				</div>
			</div>
		</form>
	</div>
</div>



<script>
	var form = $('#urinalysis_form'),
		field_group = $('#labExam').find('div[data-head="'+form.data('title')+'"]');
		field_group = ( field_group.length ) ? field_group : $('#labExam');
	form.find('input, select, textarea').first().focus();

	var field_group = $labExamNode.closest('div[data-head]');

	$("#urinalysis_form input").keypress(function(e) {
	    if (e.which == 13) {
	       insertString( form , field_group );
	    }
	});

	$('.btn_ok_mdl').click(function(e){
		insertString( form , field_group );
	});
</script>