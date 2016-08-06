<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css" />
<div class="row">
	<div class="col-sm-12">
		<h4 class="header purple clearfix">
			<?php echo $result['title']; ?>
		</h4>
		<?php $field_data = issetor($result,'field_data'); ?>
		<form id="schedule_another_appointment_form" data-title="<?php echo $result['title']; ?>" class="form-horizontal big-input padding-lr-12" role="form">
			<div class="form-group">
				<label class="col-sm-4 control-label no-padding-right" data-label="field" for="schedule_another_appointment_date">Date</label>

				<div class="col-sm-8 no-padding-lr">
					<div class="input-group col-sm-12 has-addon">
						<input name="schedule_another_appointment_date" data-date-format="dd-mm-yyyy" data-label="value" type="text" class="col-xs-12 date-picker" value="<?php echo issetor($field_data,'schedule_another_appointment_date','value'); ?>" />
						<span class="input-group-addon">
							<i class="fa fa-calendar bigger-120"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label no-padding-right" data-label="field" for="schedule_another_appointment_time">Time</label>

				<div class="col-sm-8 no-padding-lr">
					<div class="input-group col-sm-12 has-addon">
						<input name="schedule_another_appointment_time" data-label="value" type="text" class="col-xs-12 time-picker" value="<?php echo issetor($field_data,'schedule_another_appointment_time','value'); ?>" />
						<span class="input-group-addon">
							<i class="fa fa-clock-o bigger-120"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label no-padding-right" data-label="field" for="schedule_another_appointment_note">Notes</label>

				<div class="col-sm-8">
					<input name="schedule_another_appointment_note" data-label="value" class="form-control" type="text" value="<?php echo issetor($field_data,'schedule_another_appointment_note','value'); ?>">
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

	$('.time-picker').datetimepicker({
		pickDate: false
	});
	
	var form = $('#schedule_another_appointment_form');
		field_group = $('#completion').find('div[data-head="'+form.data('title')+'"]');
		field_group = ( field_group.length ) ? field_group : $('#completion');
	form.find('input, select, textarea').first().focus();

	$("#schedule_another_appointment_form input").keypress(function(e) {
	    if (e.which == 13) {
	       insertString( form , field_group );
	    }
	});

	$('.btn_ok_mdl').click(function(e){
		insertString( form , field_group );
	});
</script>