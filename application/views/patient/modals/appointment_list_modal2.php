<div class="row">
	<div class="col-xs-12">
		<!-- <div class="row">
			<div id="appointment_list_wrapper" class="grid-wrap col-xs-12 head-primary">
				<table id="appointment_list-table"></table>
			</div>
		</div> -->
		<div class="session_exam_box col-xs-12">
			<div class="col-xs-2 no-padding">
				<div class="session_date alert alert-block alert-success align-center">
					<h4>
						January 
						12, 2015
					</h4>
				</div>
			</div>
			<div class="session_exams col-xs-4 no-padding">
				<div class="physical_exam alert alert-block alert-danger align-center">
					<h5>Physical Exam</h5>
				</div>
				<div class="physical_exam alert alert-block alert-info align-center">
					<h5>Lab Exam</h5>
				</div>
				<div class="physical_exam alert alert-block alert-warning align-center">
					<h5>Prescription</h5>
				</div>
				<div class="physical_exam alert alert-block alert-success align-center">
					<h5>Completion</h5>
				</div>
			</div>
			<div class="session_results col-xs-6 no-padding">
				<div class="physical_exam alert alert-block alert-danger scrollable" data-height="60">
					<p>sapme test that is long to cover enough example.<br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
					</p>
				</div>
				<div class="physical_exam alert alert-block alert-info scrollable" data-height="60">
					<p>sapme test that is long to cover enough example.<br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
					</p>
				</div>
				<div class="physical_exam alert alert-block alert-warning scrollable" data-height="60">
					<p>sapme test that is long to cover enough example.<br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
					</p>
				</div>
				<div class="physical_exam alert alert-block alert-success scrollable" data-height="60">
					<p>sapme test that is long to cover enough example.<br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
					</p>
				</div>
			</div>
		</div>
		<div class="session_exam_box col-xs-12">
			<div class="col-xs-2 no-padding">
				<div class="session_date alert alert-block alert-success align-center">
					<h4>
						January 
						12, 2015
					</h4>
				</div>
			</div>
			<div class="session_exams col-xs-4 no-padding">
				<div class="physical_exam alert alert-block alert-danger align-center">
					<h5>Physical Exam</h5>
				</div>
				<div class="physical_exam alert alert-block alert-info align-center">
					<h5>Lab Exam</h5>
				</div>
				<div class="physical_exam alert alert-block alert-warning align-center">
					<h5>Prescription</h5>
				</div>
				<div class="physical_exam alert alert-block alert-success align-center">
					<h5>Completion</h5>
				</div>
			</div>
			<div class="session_results col-xs-6 no-padding">
				<div class="physical_exam alert alert-block alert-danger scrollable" data-height="60">
					<p>sapme test that is long to cover enough example.<br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
					</p>
				</div>
				<div class="physical_exam alert alert-block alert-info scrollable" data-height="60">
					<p>sapme test that is long to cover enough example.<br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
					</p>
				</div>
				<div class="physical_exam alert alert-block alert-warning scrollable" data-height="60">
					<p>sapme test that is long to cover enough example.<br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
					</p>
				</div>
				<div class="physical_exam alert alert-block alert-success scrollable" data-height="60">
					<p>sapme test that is long to cover enough example.<br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
						asdasdsadsaa asd asd asd <br>
					</p>
				</div>
			</div>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->

<script src="assets/js/ace/elements.scroller.js"></script>

<script type="text/javascript">

	$('.scrollable').each(function () {
		var $this = $(this);
		$(this).ace_scroll({
			size: $this.data('height') || 100,
			//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
		});
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