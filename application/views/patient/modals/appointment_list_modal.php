<link rel="stylesheet" href="assets/css/jPages.css">
<div class="row">

	<!-- <div class="row">
		<div id="appointment_list_wrapper" class="grid-wrap col-xs-12 head-primary">
			<table id="appointment_list-table"></table>
		</div>
	</div> -->
	<div class="col-xs-10 pull-right">
		<form class="form-horizontal" role="form">
			<div class="form-group col-xs-6 no-padding">
				<label class="col-sm-5 control-label no-padding-right"> Date </label>
				<div class="col-sm-7">
					<input class="col-xs-12" type="text" placeholder="Username">
				</div>
			</div>
			<div class="col-xs-6 no-padding-right">
				<div class="input-group has-addon">
					<select class="chosen-select form-control" data-placeholder="Choose a State...">
						<option value=""></option>
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
					</select>
					<span class="input-group-btn">
					<button class="btn btn-purple btn-sm" type="button">Filter</button>
					</span>
				</div>

			</div>

		</form>
	</div>
	<div id="content">
		<div id="session_exams" class="col-xs-12 has-pagination">
			<?php echo $exam_data ?>
		</div>
		<div class="clearfix"></div>
		<div class="holder pull-right padding-lr">xx</div>
	</div>
</div><!-- /.row -->

<script src="assets/js/jPages.js"></script>
<script src="assets/js/chosen.jquery.js"></script>
<script src="assets/js/ace/elements.scroller.js"></script>

<script type="text/javascript">
	
	$('.chosen-select').chosen(); 

	$('.scrollable').each(function () {
		var $this = $(this);
		$(this).ace_scroll({
			size: $this.data('height') || 100,
			//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
		});
	});

	$("div.holder").jPages({
        containerID: "session_exams",
        perPage: 1,
        previous: 'previous',
        next: 'next '
    });

	/*var patient_id = <?php echo json_encode($result['patient_id']); ?>;
	jQuery(function($) {
		$('#appointment_list-table').wd_jqGrid({
			url: 'jqGrid_ctrl/load_data',
			module: 'appointment_list',
			module_data: {patient_id:patient_id},
			colNames: [ 'Appointment ID','Full name','Insurance','Status'],
			colModel: [	{name:'seq_id',index:'seq_id', width:50, sorttype:"int"},
						{name:'full_name',index:'full_name',width:90, editable:true},
						{name:'apt_insurance',index:'apt_insurance', width:150, editable: true,unformat: pickDate, dateFormat: 'yyyy-mm-dd'},
						{name:'status',index:'status', width:50, editable: true,edittype:"checkbox",editoptions: {value:"1:0"},unformat: aceSwitch}, 
					],
			sortname: 'seq_id',
			//editurl: 'developers/jqGrid/actions',
			caption: false,
			height: 200,
			ondblClickRow: function(rowid,iRow,iCol,e){
				var rowData = $(this).jqGrid('getRowData',rowid);
				$.redirect('patient/session_form', {patient_id: rowData.patient_id, appointment_id: rowid});
			}
		});
	});*/
</script>