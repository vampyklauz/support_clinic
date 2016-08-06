<div class="page-content">
	<div class="col-xs-12 col-sm-4 with-search">
		<p class="text-primary bigger-180 lighter">
			Patient list
			<small class="text-muted">
				<i class="ace-icon fa fa-angle-double-right"></i>
				List of all patient.
			</small>
		</p>		
	</div>
	<div class="col-xs-12 col-sm-8 search-tool-top align-right">
		<div class="input-group">
			<span class="input-icon input-icon-left hide">
				<input id="q_search_top" for="q_search_top_btn" class="form-control input-mask-date" type="text" placeholder="Search ...">
				<i id="search-close" class="ace-icon fa fa-times gray"></i>
			</span>
			<span class="input-group-btn">
				<button id="btn_search_top_icon" class="btn btn-sm btn-info" type="button">
					<i id="btn_search_top_icon" class="ace-icon fa fa-search bigger-110"></i>
				</button>
				<button id="q_search_top_btn" class="btn btn-sm btn-info hide" type="button">
					<i class="ace-icon fa fa-search bigger-110"></i>
					Search
				</button>
			</span>
		</div>
	</div>
	<div class="clearfix"></div>
	<hr class="hr-6">
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div id="patient_list_wrapper" class="grid-wrap col-xs-12 head-primary">
					<table id="patient_list-table"></table>
				</div>
				<!-- <div class="col-xs-12 col-lg-3 search-tool">
					<div class="widget-box widget-color-blue light-border">
						<div class="widget-header">
							<i class="ace-icon fa fa-search bigger-130"></i>
							<h5 class="widget-title smaller">Searching tools</h5>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<form class="form-horizontal padding-lr" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> Search </label>
										<div class="col-sm-9">
											<input id="q_search" for="search_btn" type="text" class="col-xs-12" placeholder="Search key here..." />
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<button id="search_btn" class="btn btn-sm btn-info pull-right" type="button">
												<i class="ace-icon fa fa-search bigger-110"></i>
												Search
											</button>
										</div>
									</div>
								</form>
								<form id="advance_form" class="form-horizontal padding-lr" role="form">
									<div class="space"></div>
									<h3 class="header smaller lighter green">Advance search</h3>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> Patient ID </label>
										<div class="col-sm-9">
											<input name="patient_id" type="text" class="col-xs-12" />
										</div>
									</div>	
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> First name </label>
										<div class="col-sm-9">
											<input name="first_name" type="text" class="col-xs-12" />
										</div>
									</div>	
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> Last name </label>
										<div class="col-sm-9">
											<input name="last_name" type="text" class="col-xs-12" />
										</div>
									</div>		
									<div class="form-group">
										<div class="col-sm-12">
											<button id="a_search_btn" class="btn btn-sm btn-info pull-right btn-success" type="button">
												<i class="ace-icon fa fa-search bigger-110"></i>
												Advance search
											</button>
										</div>
									</div>
								</form>									
							</div>
						</div>
					</div>
				</div> -->

			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->

<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
<script src="assets/js/jqGrid/jquery.jqGrid.src.js"></script>
<script src="assets/js/jqGrid/jquery.jqGrid.preset.js"></script>
<script src="assets/js/jqGrid/i18n/grid.locale-en.js"></script>

<script type="text/javascript">
	var phpData = <?php echo json_encode($javascript_data); ?>;
	jQuery(function($) {
		$('#patient_list-table').wd_jqGrid({
			url: 'jqGrid_ctrl/load_data',
			module: 'patient_list',
			//module_data: {ops:'l_name',status:0},
			colNames: ['Actions','Patient ID','Full name','Insurance','Contact info'],
			colModel: [	{name:'actions',index:'actions', width:100, fixed:true, sortable:false, resize:false,
							formatter:'actions', 
							formatoptions:{ 
								keys:true,
								//delbutton: false,//disable delete button
								//editbutton: false,//disable delete button
								
								delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
								//editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
							}
						},					
						{name:'patient_id',index:'patient_id', width:60, sorttype:"int"},
						{name:'full_name',index:'full_name',width:150, editable:true},
						{name:'insurance_name',index:'insurance_name', width:150, editable: true,edittype:"select",editoptions:{value:phpData.insurance}},
						{name:'contact_info',index:'contact_info', width:70, editable: true}, 
					],
			sortname: 'patient_id',
			//editurl: 'developers/jqGrid/actions',
			caption: false,
			height: "100%",
			ondblClickRow: function(rowid){
				var rowData = $(this).jqGrid('getRowData',rowid);
				$.post('patient/patient_list/latest_appointment',{id:rowData.patient_id},function(res){
					if( res ){
						$.redirect('patient/session_form', {patient_id: rowData.patient_id, appointment_id: res});
					}else{
						bootbox.alert('No record yet!');
					}
					
				})
			},
			loadComplete: function(data){
				// add custom button in action field
				var grid = $(this);
				setTimeout(function(){
		            styleCheckbox(grid);
		            
		            updateActionIcons(grid);
		            updatePagerIcons(grid);
		            enableTooltips(grid);
		          }, 0);
				var iCol = $.getColumnIndexByName(grid,'actions');
				grid.find(">tbody>tr.jqgrow>td:nth-child(" + (iCol + 1) + ")")
				  .each(function() {
				      $("<div>", {
				          title: "Custom",
				          mouseover: function() {
				              $(this).addClass('ui-state-hover');
				          },
				          mouseout: function() {
				              $(this).removeClass('ui-state-hover');
				          },
				          click: function(e) {
							var rowid = $(e.target).closest("tr.jqgrow").attr("id");
							var rowData = grid.jqGrid('getRowData',rowid);
							$('.ajaxModal').modalBox({
								modal_controller: 'patient',
								modal_data: {patient_id:rowData.patient_id},
								modal_view: 'appointment_list_modal',
								title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-list-alt'></i> Appointment List</h4></div>",
								width: 800,
								height: 600,
							});
				          }
				      }
				    ).css({"margin-left": "5px", float: "left", cursor: "pointer"})
				     .addClass("ui-pg-div ui-inline-custom")
				     .append('<span class="ui-icon ui-icon-list green"></span>')
				     .appendTo($(this).children("div"));
				});
			}
		});
	});

	// Quick search functions
	$("#q_search").keyup(function(event){
	    if(event.keyCode == 13){
	        $("#search_btn").click();
	    }
	});

	$("#q_search_top").keyup(function(event){
	    if(event.keyCode == 13){
	        $("#q_search_top_btn").click();
	    }
	});

	$('#search_btn, #q_search_top_btn').click(function(){
		var key = $('input[for="'+$(this).attr('id')+'"]').val();
		var module_data = {
			module: 'patient_list',
			module_data: {
				searchType: 'quickSearch',
				data_key: key
			}
		}
		$.searchOnGrid($.getBaseURL()+'jqGrid_ctrl','patient_list-table',module_data);
	})

	// Advance Search functions

	$('#a_search_btn').click(function(){
		formData = $('#advance_form').serializeArray();
		var module_data = {
			module: 'patient_list',
			module_data: {
				searchType: 'advanceSearch',
				data: formData
			}
		}
		$.searchOnGrid($.getBaseURL()+'jqGrid_ctrl','patient_list-table',module_data);
	});

	// Top search
	$('#btn_search_top_icon').click(function(){

		$('#q_search_top').parent().removeClass('hide').show();
		$('#q_search_top').val('').focus();

		$(this).hide();
		$('#q_search_top_btn').removeClass('hide').show();
	});

	$('#search-close').click(function(){
		$(this).parent().hide();
		$(this).parent().parent().find('#q_search_top_btn span').remove();

		$('#q_search_top_btn').hide();
		$('#btn_search_top_icon').removeClass('hide').show();
	})
	
</script>