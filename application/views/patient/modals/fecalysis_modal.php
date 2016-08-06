<div class="row">
	<div class="col-sm-12">
		<h4 class="header blue clearfix">
			<?php echo $result['title']; ?>
		</h4>
		<?php $field_data = issetor($result,'field_data'); ?>
		<form id="fecalysis_form" data-title="<?php echo $result['title']; ?>" class="form-horizontal big-input padding-lr-12 compress" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-left no-padding-right" data-label="field" for="fecalysis_notes">Notes</label>

				<div class="col-sm-9">
					<textarea class="col-sm-12" name="fecalysis_notes" data-label="value"><?php echo issetor($field_data,'fecalysis_notes','value'); ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="fecalysis_character">Character</label>

					<div class="col-sm-6 no-padding-right">
						<input name="fecalysis_character" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'fecalysis_character','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="fecalysis_parasites">Parasites</label>

					<div class="col-sm-6 no-padding-right">
						<input name="fecalysis_parasites" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'fecalysis_parasites','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="fecalysis_color">Color</label>

					<div class="col-sm-6 no-padding-right">
						<input name="fecalysis_color" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'fecalysis_color','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="fecalysis_wbc">WBC</label>

					<div class="col-sm-6 no-padding-right">
						<input name="fecalysis_wbc" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'fecalysis_wbc','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="fecalysis_reaction">Reaction</label>

					<div class="col-sm-6 no-padding-right">
						<input name="fecalysis_reaction" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'fecalysis_reaction','value'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="fecalysis_occult_blod">Occult Blood</label>

					<div class="col-sm-6 no-padding-right">
						<input name="fecalysis_occult_blod" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'fecalysis_occult_blod','value'); ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="col-sm-6 control-label no-padding-left no-padding-right" data-label="field" for="fecalysis_rbc">RBC</label>

					<div class="col-sm-6 no-padding-right">
						<input name="fecalysis_rbc" data-label="value" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'fecalysis_rbc','value'); ?>">
					</div>
				</div>
			</div>			
		</form>
	</div>
</div>



<script>
	var form = $('#fecalysis_form'),
		field_group = $('#labExam').find('div[data-head="'+form.data('title')+'"]');
		field_group = ( field_group.length ) ? field_group : $('#labExam');
	form.find('input, select, textarea').first().focus();
	

	$("#fecalysis_form input").keypress(function(e) {
	    if (e.which == 13) {
	       insertString( form , field_group );
	    }
	});

	$('.btn_ok_mdl').click(function(e){
		insertString( form , field_group );
	});
</script>