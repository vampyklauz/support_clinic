<div class="row">
	<div class="col-sm-12">
		<h4 class="header purple clearfix">
			<?php echo $result['title']; ?>
		</h4>
		<?php $field_data = issetor($result,'field_data');  ?>
		<form id="revenue_form" data-title="<?php echo $result['title']; ?>" class="form-horizontal big-input padding-lr-12" role="form">
			<div class="form-group">
				<label class="col-sm-4 control-label no-padding-right" data-label="field" for="revenue_type"> Type </label>

				<div class="col-sm-8">
					<select name="revenue_type" data-label="value" class="col-sm-12">
						<?php echo dropDown('complains',issetor($field_data,'revenue_type','value')) ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label no-padding-right" data-label="field" for="revenue_description"> Description </label>

				<div class="col-sm-8">
					<select name="revenue_description" data-label="value" class="col-sm-12">
						<?php echo dropDown('complains',issetor($field_data,'revenue_description','value')) ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label no-padding-right" data-label="field" for="revenue_amount"> Amount </label>

				<div class="col-sm-8">
					<input name="revenue_amount" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'revenue_amount','value'); ?>">
				</div>
			</div>
			
		</form>
	</div>
</div>

<script>
	var form = $('#revenue_form'),
		field_group = $('#completion').find('div[data-head="'+form.data('title')+'"]');
		field_group = ( field_group.length ) ? field_group : $('#completion');
	form.find('input, select, textarea').first().focus();

	$("#revenue_form input").keypress(function(e) {
	    if (e.which == 13) {
	       insertString( form , field_group );
	    }
	});

	$('.btn_ok_mdl').click(function(e){
		insertString( form , field_group );
	});
</script>