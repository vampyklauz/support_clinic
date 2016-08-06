<div class="page-content">
	<!-- <div class="page-header">
		<h1>
			Patient Queues
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Some text here.
			</small>
		</h1>
	</div> -->
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div id="grid-name" class="grid-wrap col-xs-12 compress">
					<table id="grid-table"></table>
				</div>
			</div>
			<div class="hr hr-double hr-dotted hr18"></div>
			<div class="row">
				<div id="grid-name2" class="grid-wrap title-success col-xs-12 compress">
					<table id="grid-table2"></table>
				</div>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->

<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
<script src="assets/js/jqGrid/jquery.jqGrid.src.js"></script>
<script src="assets/js/jqGrid/jquery.jqGrid.preset.js"></script>
<script src="assets/js/jqGrid/i18n/grid.locale-en.js"></script>

<script type="text/javascript">
	jQuery(function($) {
		$('#grid-table').wd_jqGrid({
			url: 'jqGrid_ctrl/load_data',
			module: 'appointment_queues',
			//module_data: {ops:'l_name',status:0},
			colNames: ['Actions','Patient ID','Full name','Insurance','Status'],
			colModel: [	{name:'actions',index:'actions', width:80, fixed:true, sortable:false, resize:false,
							formatter:'actions', 
							formatoptions:{ 
								keys:true,
								//delbutton: false,//disable delete button
								
								delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
								//editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
							}
						},					
						{name:'patient_id',index:'patient_id', width:60, sorttype:"int"},
						{name:'full_name',index:'full_name',width:90},
						{name:'apt_insurance',index:'apt_insurance', width:150, editable: true},
						{name:'status',index:'status', width:70, editable: true,edittype:"checkbox",editoptions: {value:"Pending:Done"},unformat: aceSwitch}, 
					],
			sortname: 'seq_id',
			editurl: 'home/actions',
			caption: 'Appointments',
			height: 200,
			ondblClickRow: function(rowid,iRow,iCol,e){
				var rowData = $(this).jqGrid('getRowData',rowid);
				$.redirect('patient/session_form', {patient_id: rowData.patient_id, appointment_id: rowid});
			}
		});

		$('#grid-table2').wd_jqGrid({
			url: 'jqGrid_ctrl/load_data',
			module: 'appointment_queues',
			//module_data: {ops:'l_name',status:0},
			colNames: ['Actions','Patient ID','Full name','Insurance','Status'],
			colModel: [	{name:'actions',index:'actions', width:80, fixed:true, sortable:false, resize:false,
							formatter:'actions', 
							formatoptions:{ 
								keys:true,
								//delbutton: false,//disable delete button
								
								delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
								//editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
							}
						},					
						{name:'patient_id',index:'patient_id', width:60, sorttype:"int"},
						{name:'full_name',index:'full_name',width:90, editable:true},
						{name:'apt_insurance',index:'apt_insurance', width:150, editable: true,unformat: pickDate, dateFormat: 'yyyy-mm-dd'},
						{name:'status',index:'status', width:70, editable: true,edittype:"checkbox",editoptions: {value:"1:0"},unformat: aceSwitch}, 
					],
			sortname: 'seq_id',
			//editurl: 'developers/jqGrid/actions',
			caption: 'History',
			height: 200,
			ondblClickRow: function(rowid){
				console.log(this);
			}
		});
	});
</script>