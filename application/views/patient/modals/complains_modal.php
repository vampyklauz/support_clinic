<div class="row">
	<div class="col-sm-12">
		<h4 class="header blue clearfix">
			<?php echo $result['title']; ?>
		</h4>
		<?php $field_data = issetor($result,'field_data'); ?>
		<form id="complains_form" data-title="<?php echo $result['title']; ?>" class="form-horizontal big-input padding-lr-12 compress" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-left no-padding-right">Type</label>

				<div class="col-sm-9">
					<select class="chosen-select form-control no-padding-right" data-placeholder="Choose a Menu..." data-label="field" for="complain_note">
						<?php dropDown('complains'); ?>
					</select>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-left no-padding-right">Notes</label>

				<div class="col-sm-9">
					<textarea class="col-sm-12" name="complain_note" data-label="value"><?php echo issetor($field_data,'lab_notes','value'); ?></textarea>
				</div>
			</div>		
		</form>
	</div>
</div>

<script src="assets/js/chosen.jquery.js"></script>

<script>
	$('.chosen-select').chosen();

	// allow overflow for chosen visibility in modal
	$('.ui-dialog, .ajaxModal').css('overflow','visible');
	var form = $('#complains_form');
		field_group = $('#physicalExam').find('div[data-head="'+form.data('title')+'"]');
		field_group = ( field_group.length ) ? field_group : $('#physicalExam');
	form.find('input, select, textarea').first().focus();

	$("#complains_form input").keypress(function(e) {
	    if (e.which == 13) {
	       insertString( form , field_group );
	    }
	});

	$('.btn_ok_mdl').click(function(e){
		insertString( form , field_group );
	});

</script>