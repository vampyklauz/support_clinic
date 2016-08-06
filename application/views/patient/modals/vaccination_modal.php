<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css" />
<div class="row">
	<div class="col-sm-12">
		<h4 class="header purple clearfix">
			<?php echo $result['title']; ?>
		</h4>
		<?php $field_data = issetor($result,'field_data');  ?>
		<form id="vaccination_form" data-title="<?php echo $result['title']; ?>" class="form-horizontal big-input padding-lr-12" role="form">
			<div class="form-group">
				<label class="col-sm-4 control-label no-padding-right" data-label="field" for="vaccination_vaccine">Vaccine</label>

				<div class="col-sm-8">
					<select name="vaccination_vaccine" class="chosen-select form-control no-padding-right" data-placeholder="Choose a Menu..." data-label="value">
						<?php echo dropDown('complains',issetor($field_data,'vaccination_vaccine','value')) ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label no-padding-right" data-label="field" for="vaccination_date_administer">Date Administer</label>

				<div class="col-sm-5">
					<div class="input-group col-sm-12">
						<input name="vaccination_date_administer" validate="true" type="text" class="col-xs-12 date-picker" data-label="value" value="<?php echo issetor($field_data,'vaccination_date_administer','value'); ?>" />
					</div>
				</div>
				<label class="col-sm-1 control-label no-padding-lr" data-label="field" for="vaccination_qty">Qty</label>
				<div class="col-sm-2 no-padding-right">
					<div class="input-group col-sm-12">
						<input name="vaccination_qty" validate="true" type="text" class="col-xs-12" data-label="value" value="<?php echo issetor($field_data,'vaccination_qty','value'); ?>" />
					</div>
				</div>
			</div>
			
		</form>
	</div>
</div>

<script src="assets/js/date-time/moment.js"></script>
<script src="assets/js/date-time/bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script>
	
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd'
	})
	
	var form = $('#vaccination_form'),
		field_group = $('#completion').find('div[data-head="'+form.data('title')+'"]');
		field_group = ( field_group.length ) ? field_group : $('#completion');
	form.find('input, select, textarea').first().focus();

	$("#vaccination_form input").keypress(function(e) {
	    if (e.which == 13) {
	       insertString( form , field_group );
	    }
	});

	$('.btn_ok_mdl').click(function(e){
		insertString( form , field_group );
	});
</script>