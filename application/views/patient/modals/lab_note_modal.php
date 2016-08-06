<div class="row">
	<div class="col-sm-12">
		<h4 class="header blue clearfix">
			<?php echo $result['title']; ?>
		</h4>
		<?php $field_data = issetor($result,'field_data'); ?>
		<form id="lab_note_form" data-title="<?php echo $result['title']; ?>" class="form-horizontal big-input padding-lr-12 compress" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-left no-padding-right" data-label="field" for="lab_notes">Notes</label>

				<div class="col-sm-9">
					<textarea class="col-sm-12" name="lab_notes" data-label="value"><?php echo issetor($field_data,'lab_notes','value'); ?></textarea>
				</div>
			</div>		
		</form>
	</div>
</div>



<script>
	var form = $('#lab_note_form'),
		field_group = $('#labExam').find('div[data-head="'+form.data('title')+'"]');
		field_group = ( field_group.length ) ? field_group : $('#labExam');
	form.find('input, select, textarea').first().focus();

	var field_group = $labExamNode.closest('div[data-head]');

	$("#lab_note_form input").keypress(function(e) {
	    if (e.which == 13) {
	       insertString( form , field_group );
	    }
	});

	$('.btn_ok_mdl').click(function(e){
		insertString( form , field_group );
	});
</script>