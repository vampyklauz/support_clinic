<div class="page-content">
	<div class="page-header">
		<h1>
			Admin Tools
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Admin settings and functionalities.
			</small>
		</h1>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<!-- #section:elements.tab -->
			<div class="tabbable">
				<ul class="nav nav-tabs padding-18 tab-size-bigger" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#register">
							<i class="green ace-icon fa fa-files-o bigger-120"></i>
							Register
						</a>
					</li>

					<li>
						<a data-toggle="tab" href="#messages">
							<i class="blue ace-icon fa fa-home bigger-120"></i>
							Messages
							<span class="badge badge-danger">4</span>
						</a>
					</li>

					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<i class="red ace-icon fa fa-sort-amount-desc bigger-120"></i>
							Dropdown &nbsp;
							<i class="ace-icon fa fa-caret-down bigger-110 width-auto"></i>
						</a>

						<ul class="dropdown-menu dropdown-info">
							<li>
								<a data-toggle="tab" href="#dropdown1">@fat</a>
							</li>

							<li>
								<a data-toggle="tab" href="#dropdown2">@mdo</a>
							</li>
						</ul>
					</li>
				</ul>

				<div class="tab-content no-border padding-24">
					<div id="register" class="tab-pane in active">
						<div class="row">
							<div class="col-lg-8 col-md-offset-4">
								<form id="register_form" class="form-horizontal error-bottom" role="form">
									<div class="form-group">
										<h2 class="col-sm-6 no-padding-left">Create user</h2>
									</div>
									<div class="form-group ">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-xs-6 no-padding-left">
													<input type="text" name="f_name" validate="true" validate-message="First name is required." placeholder="First Name" class="col-xs-12" />
												</div>
												<div class="col-xs-6 no-padding-left">
													<input type="text" name="l_name" validate="true" validate-message="Last name is required." placeholder="Last Name" class="col-xs-12" />
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6 no-padding-left">
											<input type="text" name="email" validate="true" email="true" validate-message="Email is required." placeholder="Email" class="col-xs-12" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6 no-padding-left">
											<input type="text" name="username" validate="true" validate-message="Username is required." placeholder="Username" class="col-xs-12" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6 no-padding-left">
											<input type="password" name="password" id="password" validate-message="Please create a password." validate="true" minlength="5" placeholder="Password" class="col-xs-12" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6 no-padding-left">
											<input type="password" name="r_password" equalTo="#password" placeholder="Re-password" class="col-xs-12" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3 no-padding-left">
											<select class="form-control" id="access" name="access" validate="true" >
												<option class="center" value="">-- Access --</option>
												<?php dropDown( 'access','','',array( 'filter'=>'1' ) ); ?>								
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6 no-padding-left">
											<button id="register_submit" class="btn btn-info pull-right" type="button">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Register
											</button>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6 no-padding-left">
											<div class="register_alert_message">
												<!-- register alert error here -->
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div id="messages" class="tab-pane">
						<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
					</div>

					<div id="dropdown1" class="tab-pane">
						<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
					</div>

					<div id="dropdown2" class="tab-pane">
						<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.</p>
					</div>
				</div>
			</div>

			<!-- /section:elements.tab -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->

<script src="assets/js/jquery.validate.js"></script>

<script>
	$(function() {
		$('.tabbable').save_tab('tab_name');
	});
	
	$('#register_submit').click(function(e){
		var form = $('#register_form');
		$(form).validateForm();
		
		if( $(form).valid() ){
			$.ajax({
				url: 'login/register_user',
				type: 'POST',
				data: {formData: form.serialize()},
				dataType: 'json',
				success: function(res){
					if( typeof res === 'string' && res == 'success' ){
						$('.register_alert_message').aceAlert({
							icon: 'fa-check',
							text: 'Register Successful',
							position: 'top',
							type: 'success'
						});
					}else{
						$(".register_alert_message").aceAlert('remove');
						$.validate_errors(res,form);
					}
				}
			})
		}
	})

</script>