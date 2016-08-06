<div class="row padding-lr-20">
	<div id="appointment_search" class="col-xs-12">
		<div class="space-8"></div>
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<div class="col-sm-12">
					<input id="appointment_name" placeholder="Enter name" name="patient_id" type="text" class="col-xs-12" />
				</div>
			</div>
		</form>
	</div>
	<div id="appointment_view" class="col-xs-12 hide">
		<div class="space-4"></div>
		<form id="appointment_form" action="patient/patient_appointment/add_appointment" method="POST" class="form-horizontal error-bottom" role="form">
			<div class="form-group">
				<div class="col-xs-12 align-right bigger-120 green">
					<input id="apt_patient_id" type="hidden" name="apt_patient_id">
					Patien ID: <strong id="apt_patient_id_txt"></strong>
				</div>
			</div>
			<div class="space-6"></div>
			<div class="form-group">
				
				<div class="col-sm-12 bigger-140 blue">
					<span id="apt_name" class="u-line-dash"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 no-padding-right"> Appointment Date </label>
				<div class="input-group col-sm-12 has-addon">
					<input name="apt_date" validate="true" type="text" class="col-xs-12 date-picker" value="<?php echo date('Y-m-d'); ?>" />
					<span class="input-group-addon">
						<i class="fa fa-calendar bigger-120"></i>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 no-padding-right"> Insurance name </label>
				<div class="col-sm-12">
					<select id="apt_insurance" validate="true" name="apt_insurance" class="col-xs-12 no-padding-left">

					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 no-padding-right"> Remarks </label>
				<div class="col-sm-12">
					<textarea name="apt_remarks" class="col-sm-12"></textarea>
				</div>
			</div>
		</form>
	</div>
</div>

<script src="assets/js/jquery.validate.js"></script>

<script type="text/javascript">
	jQuery(function($) {

		$('.date-picker').datepicker({
			autoclose: true,
			todayHighlight: true,
			format: 'yyyy-mm-dd'
		})

		// allow overflow for autocomplete visibility in modal
		$('.ui-dialog').css('overflow','visible');
		

		$( "#appointment_name" ).autocomplete({
			source: function(request, response) {
				$.ajax({
	                url: "patient/patient_appointment/appointment_autocomplete",
	                type: 'POST',
	                dataType: "json",
	                data: {
	                    data: request.term
	                },
	                success: function( res ) {
	                	console.log(res);
	                    response(res);
	                }
	            });
		    },
		    delay: 500,
		    select: function( event, ui ){
		    	//add attribute with value in input for ID
		    	$(this).data('patient_data',ui.item.patient_data);
		    	$(this).data('has_data','true');
		    	
		    }
		}).autocomplete( "instance" )._renderItem = function( ul, item ) {

		  return $( "<li>" )
		    .attr( "data-value", item.data_id )
		    .append( item.value )
		    .appendTo( ul );
		}
	});

	$('.appointment_btn_continue').click(function(e){
		e.preventDefault();
		var patient = $('#appointment_name'),
			patient_data = patient.data('patient_data');

		if( patient.data('has_data') == 'true' ){
			$('#appointment_search').hide(); // Hide search appointment input

			$('#apt_patient_id_txt').html(patient_data.user_id); // add data for patient ID Text
			$('#apt_patient_id').val(patient_data.user_id); // add data for patient ID input
			$('#apt_name').html(patient_data.full_name); // add data for patien name
			$('#apt_insurance').refreshDropDown('insurance');
		    $('#appointment_view').removeClass('hide').show(); // show appointment form

		    $(this).hide(); // hide Continue button
		    $('.appointment_btn_submit').removeClass('hide').show(); // show Submit button.
		}
	})

	$('.appointment_btn_submit').click(function(e){
		var form = $('#appointment_form');

		form.validateForm();

		if( form.valid() ){
			form.submit();
			$.closeDialog();
		}
	})
	
</script>