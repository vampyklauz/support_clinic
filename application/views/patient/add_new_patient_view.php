<div class="page-content">
	<div class="page-header">
		<h1>
			New Patient
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Please provide us your information.			
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-offset-3">
			<form id="registration_form" action="patient/add_new_patient/register" data-message="disabled" class="form-horizontal big-input" method="POST" role="form">
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6 no-margin no-padding-left">
						<h3>Patient information</h3>
						<hr>
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-6">
								<label class="control-label">First Name</label>
								<input type="text" validate="true" name="first_name" class="col-xs-12" />
							</div>
							<div class="col-xs-6 no-padding-left">
								<label class="control-label">Last Name</label>
								<input type="text" validate="true" name="last_name" class="col-xs-12" />
							</div>
						</div>						
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-5">
								<label class="control-label">Middle name</label>
								<input type="text" validate="true" name="middle_name" class="col-xs-12" />
							</div>
							<div class="col-xs-4 no-padding-left">
								<label class="control-label">Email</label>
								<input type="text" validate="true" email="true" name="email" class="col-xs-12" />
							</div>
							<div class="col-xs-3 no-padding-left">
								<label class="control-label">Contact info</label>
								<input type="text" validate="true" name="contact_info" class="col-xs-12" />						
							</div>
						</div>					
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-lg-5">
								<label class="control-label">Gender</label>
								<div class="col-xs-12 has-checkbox">
									<label>
										<input class="ace input-lg" validate="true" type="radio" name="gender" value="Male">
										<span class="lbl bigger-120"> Male</span>
									</label>
									<label class="h-space-20">
										<input class="ace input-lg" validate="true" type="radio" name="gender" value="Female">
										<span class="lbl bigger-120"> Female</span>
									</label>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-lg-3 no-padding">
								<div class="col-xs-12 no-padding sm-top">
									<label class="control-label">Blood type</label>
									<select name="blood_type" validate="true" class="form-control">
										<?php echo dropDown('blood_type'); ?>
									</select>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-lg-4 no-padding sm-top">
								<label class="control-label h-space-12">Birth date</label>
								<div class="col-xs-12 no-padding input-group has-addon">
									<input type="text" name="birth_date" validate="true" class="col-xs-12 date-picker" />
									<span class="input-group-addon">
										<i class="fa fa-calendar bigger-120"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-xs-6">
						<label class="col-sm-12 control-label no-padding-left no-padding-right align-left">Birth place</label>
						<div class="col-xs-12 no-padding">
							<input type="text" name="birth_place" validate="true"class="col-xs-12" />
						</div>
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-xs-6">
						<label class="col-sm-12 control-label no-padding-left no-padding-right align-left">Address</label>
						<div class="col-xs-12 no-padding">
							<input type="text" name="address" validate="true" class="col-xs-12" />
						</div>
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">							
							<div class="col-xs-6">
								<label class="control-label">Company name</label>
								<input type="text" name="company_name" validate="true" class="col-xs-12" />
							</div>
							<div class="col-xs-4 no-padding-left">
								<label class="control-label">Insurance</label>
								<select name="blood_type" validate="true" class="form-control">
									<?php echo dropDown('insurance'); ?>
								</select>
							</div>
							<div class="col-xs-2 no-padding-left">
								<label class="control-label">Insurance ID</label>
								<input type="text" name="insurance_id" validate="true" class="col-xs-12" />
							</div>
						</div>						
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="text-area col-sm-6">
						<label class="control-label">Remarks</label>
						<textarea name="remarks" validate="true" class="col-sm-12" placeholder="Note here..."></textarea>
					</div>
				</div>

				<div class="space"></div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6 no-margin no-padding-left">
						<h3>Guardian information</h3>
						<hr>
					</div>
				</div>

				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-6">
								<label class="control-label">First name</label>
								<input type="text" name="g_first_name" class="col-xs-12" />
							</div>
							<div class="col-xs-6 no-padding-left">
								<label class="control-label">Last name</label>
								<input type="text" name="g_last_name" class="col-xs-12" />
							</div>
						</div>						
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-5">
								<label class="control-label">Middle name</label>
								<input type="text" name="g_middle_name" class="col-xs-12" />
							</div>
							<div class="col-xs-4 no-padding-left">
								<label class="control-label">E-mail</label>
								<input type="text" name="g_email" class="col-xs-12" />
							</div>
							<div class="col-xs-3 no-padding-left">
								<label class="control-label">Contact no</label>
								<input type="text" name="g_contact_info" class="col-xs-12" numberOnly="true" />						
							</div>
						</div>					
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-lg-5">
								<label class="control-label">Gender</label>
								<div class="col-xs-12 has-checkbox">
									<label>
										<input class="ace input-lg" type="radio" name="g_gender" value="Male">
										<span class="lbl bigger-120"> Male</span>
									</label>
									<label class="h-space-20">
										<input class="ace input-lg" type="radio" name="g_gender" value="Female">
										<span class="lbl bigger-120"> Female</span>
									</label>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-lg-3 no-padding">
								<div class="col-xs-12 no-padding sm-top">
									<label class="control-label">Blood type</label>
									<select name="g_blood_type" class="form-control">
										<?php echo dropDown('blood_type'); ?>
									</select>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-lg-4 no-padding sm-top">
								<label class="control-label h-space-12">Birth date</label>
								<div class="col-xs-12 no-padding input-group has-addon">
									<input type="text" name="g_birth_date" class="col-xs-12 date-picker" />
									<span class="input-group-addon">
										<i class="fa fa-calendar bigger-120"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<label class="control-label">Relationship</label>
						<select name="g_relationship" class="form-control">
							<option value=""> Relationship</option>
							<option value="1">Something in common</option>
							<option value="2">Not friend</option>
						</select>
					</div>
				</div>

				<div class="space"></div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6 no-margin no-padding-left">
						<h3>Father's information</h3>
						<hr>
					</div>
				</div>

				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-6">
								<label class="control-label">First name</label>
								<input type="text" name="f_first_name" class="col-xs-12" />
							</div>
							<div class="col-xs-6 no-padding-left">
								<label class="control-label">Last name</label>
								<input type="text" name="f_last_name" class="col-xs-12" />
							</div>
						</div>						
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-5">
								<label class="control-label">Middle name</label>
								<input type="text" name="f_middle_name" class="col-xs-12" />
							</div>
							<div class="col-xs-4 no-padding-left">
								<label class="control-label">E-mail</label>
								<input type="text" name="f_email" class="col-xs-12" />
							</div>
							<div class="col-xs-3 no-padding-left">
								<label class="control-label">Contact no</label>
								<input type="text" name="f_contact_info"class="col-xs-12" numberOnly="true" />						
							</div>
						</div>					
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-lg-3 no-padding-right">
								<div class="col-xs-12 no-padding">
									<label class="control-label">Blood type</label>
									<select name="f_blood_type" class="form-control">
										<?php echo dropDown('blood_type'); ?>
									</select>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-lg-4 no-padding">
								<label class="control-label h-space-12">Birth date</label>
								<div class="col-xs-12 no-padding input-group has-addon">
									<input type="text" name="f_birth_date" class="col-xs-12 date-picker" />
									<span class="input-group-addon">
										<i class="fa fa-calendar bigger-120"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="space"></div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6 no-margin no-padding-left">
						<h3>Mother's information</h3>
						<hr>
					</div>
				</div>

				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-6">
								<label class="control-label">First name</label>
								<input type="text" name="m_first_name" class="col-xs-12" />
							</div>
							<div class="col-xs-6 no-padding-left">
								<label class="control-label">Last name</label>
								<input type="text" name="m_last_name" class="col-xs-12" />
							</div>
						</div>						
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-5">
								<label class="control-label">Middle name</label>
								<input type="text" name="m_middle_name" class="col-xs-12" />
							</div>
							<div class="col-xs-4 no-padding-left">
								<label class="control-label">E-mail</label>
								<input type="text" name="m_email" class="col-xs-12" />
							</div>
							<div class="col-xs-3 no-padding-left">
								<label class="control-label">Contact no</label>
								<input type="text" name="m_contact_info"class="col-xs-12" numberOnly="true" />						
							</div>
						</div>					
					</div>
				</div>
				<div class="form-group no-margin-bottom">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-lg-3 no-padding-right">
								<div class="col-xs-12 no-padding">
									<label class="control-label">Blood type</label>
									<select name="m_blood_type" class="form-control">
										<?php echo dropDown('blood_type'); ?>
									</select>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-lg-4 no-padding">
								<label class="control-label h-space-12">Birth date</label>
								<div class="col-xs-12 no-padding input-group has-addon">
									<input type="text" name="m_birth_date" class="col-xs-12 date-picker" />
									<span class="input-group-addon">
										<i class="fa fa-calendar bigger-120"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="clearfix form-actions col-lg-6 no-padding-left align-right">
					<div class="col-lg-12 col-xs-12">
						<button class="btn" type="reset">
							<i class="ace-icon fa fa-undo bigger-110"></i>
							Reset
						</button>
						<button id="register_btn" class="btn btn-primary">
							<i class="ace-icon fa fa-pencil-square-o bigger-110"></i>
							Register
						</button>
					</div>
				</div>

			</form>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->

<script src="assets/js/jquery.validate.js"></script>
<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
<script>

	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd'
	})
	
	$('#register_btn').click(function(e){
		e.preventDefault();
		var form = $('#registration_form');
		form.validateForm();
		
		if( form.valid() ){
			form.submit();
		}else{
			$(window).scrollTop(form);
		}
	})

</script>