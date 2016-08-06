<div class="page-content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-6">
				<h1>
					<?php echo issetorObj($patient_info,'full_name'); ?>
					<!-- <small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Some text here.
					</small> -->
				</h1>
			</div>
			<div id="notification" class="col-sm-6 align-right">
				<!-- notification here -->
			</div>
		</div>
	</div>
	<?php $exams = unserialize( issetorObj($session_data,'session_html') ); ?>
	<div id="js_data_holder" data-appointmentid="<?php echo $appointment_id; ?>" data-patientid="<?php echo issetorObj($patient_info,'patient_id'); ?>" hidden></div>
	<div class="row textComplete">
		<div class="col-xs-6">
			<div class="widget-box transparent">
				<div class="widget-header">
					<h4 class="widget-title lighter red">Physical Examination</h4>
					<div class="widget-toolbar no-border">
						<a href="#" data-action="settings">
							<i class="ace-icon fa fa-cog"></i>
						</a>
						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-up"></i>
						</a>
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main padding-8">
						<div id="physicalExam" class="form-control" rows="8" contenteditable="true"><?php echo issetor($exams,'physicalExam'); ?></div>
					</div>
				</div>
			</div>
			
		</div><!-- /.col -->
		<div class="col-xs-6">
			<div class="widget-box transparent">
				<div class="widget-header">
					<h4 class="widget-title lighter blue">Lab Examination</h4>

					<div class="widget-toolbar no-border">
						<a href="#" data-action="settings">
							<i class="ace-icon fa fa-cog"></i>
						</a>
						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-up"></i>
						</a>
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main padding-8">
						<div id="labExam" class="form-control" rows="8" contenteditable="true"><?php echo issetor($exams,'labExam'); ?></div>
					</div>
				</div>
			</div>
			
		</div><!-- /.col -->
		<div class="col-xs-6">
			<div class="widget-box transparent">
				<div class="widget-header">
					<h4 class="widget-title lighter green">Prescriptions</h4>

					<div class="widget-toolbar no-border">
						<a href="#" data-action="settings">
							<i class="ace-icon fa fa-cog"></i>
						</a>
						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-up"></i>
						</a>
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main padding-8">
						<div id="prescriptions" class="form-control" rows="8" contenteditable="true"><?php echo issetor($exams,'prescriptions'); ?></div>
					</div>
				</div>
			</div>
			
		</div><!-- /.col -->
		<div class="col-xs-6">
			<div class="widget-box transparent">
				<div class="widget-header">
					<h4 class="widget-title lighter purple">Completion</h4>

					<div class="widget-toolbar no-border">
						<a href="#" data-action="settings">
							<i class="ace-icon fa fa-cog"></i>
						</a>
						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-up"></i>
						</a>
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main padding-8">
						<div id="completion" class="form-control" rows="8" contenteditable="true"><?php echo issetor($exams,'completion'); ?></div>
					</div>
				</div>
			</div>
			
		</div><!-- /.col -->
		<div class="col-xs-12">			
			<div class="col-xs-6 pull-right align-right">
				<button id="btn_save_form" class="btn btn-sm btn-success">
					<i class="ace-icon fa fa-floppy-o bigger-150"></i>
					<span class="bigger-120">Save</span>
				</button>		
			</div>
		</div>
	</div><!-- /.row -->
</div><!-- /.page-content -->

<script src="assets/js/ace/ace.js"></script>
<script src="assets/js/jquery.textcomplete.js"></script>
<script src="assets/js/jquery-overlay/jquery.overlay.js"></script>
<script src="assets/js/jquery-overlay/shCore.js"></script>
<script src="assets/js/jquery-overlay/shBrushJScript.js"></script>
<script src="assets/js/jquery-overlay/main.js"></script>
<script src="assets/js/ace/ace.widget-box.js"></script>

<script>
	
	var $selection = '';
	var $labExamNode = '';
	

	var session_exams = <?php echo json_encode($session_exams); ?>,
		prescriptions = <?php echo json_encode($prescriptions); ?>;

	$('#physicalExam').textcomplete([
	    { // tech companies
	        //words: session_exams['physical_exam'],
	        words: session_exams['physical_exam'],
	        match: /\B@([\-+\w]*)$/,
	        search: function (term, callback) {
	            callback($.map(this.words, function (word) {
	            	// not case sensitive search
	               return word['name'].toUpperCase().indexOf(term.toUpperCase()) === 0 ? word['name'] : null;
	            }));
	        },
	        index: 1,
	        replace: function (word) {
	            return ' ';
	        }
	    }
	]).on({
        'textComplete:select': function (e, value, strategy) {
        	var words = strategy.words;
        	modal = $.map(words,function(res){
        		return ( res['name'] == value ) ? {name:res['modal'],size:res['size']} : null;
        	})
        	var modalName = modal[0]['name'],
        		modalSize = modal[0]['size'] || 400,
	        	exam_box = $('#physicalExam').find('div[data-head="'+value+'"]'),
				node_data = getSingleData(exam_box);

			if( exam_box.length && value != 'Complains' ){
				bootbox.confirm(value+' Already added. Do you want to edit?', function(result) {
					if(result) {
						callModal(value,node_data,modalName,modalSize);
					}
				});
			}else{
				callModal(value,node_data,modalName,modalSize);
			}
            
        }
    });

	$('#labExam').textcomplete([
	    { // tech companies
	        //words: session_exams['physical_exam'],
	        words: session_exams['lab_exam'],
	        match: /\B@([\-+\w]*)$/,
	        search: function (term, callback) { 	
	            callback($.map(this.words, function (word) {
	            	// not case sensitive search
	               return word['name'].toUpperCase().indexOf(term.toUpperCase()) === 0 ? word['name'] : null;
	            }));
	        },
	        index: 1,
	        replace: function (word) {
	            return ' ';
	        }
	    }
	]).on({
        'textComplete:select': function (e, value, strategy) {
        	
        	var words = strategy.words;

        	modal = $.map(words,function(res){
        		return ( res['name'] == value ) ? {name:res['modal'],size:res['size']} : null;
        	})
        	var modalName = modal[0]['name'],
        		modalSize = modal[0]['size'] || 400,
        		exam_box = $('#labExam').find('div[data-head="'+value+'"]'),
        		node_data = getSingleData(exam_box);

        	if( exam_box.length ){
				bootbox.confirm(value+' Already added. Do you want to edit?', function(result) {
					if(result) {
						callModal(value,node_data,modalName,modalSize);
					}
				});
			}else{
            	$('#labExam').append('<div data-head="'+value+'"><a href="'+modalName+'" data-size="'+modalSize+'">'+value+'</a></div>');
            	placeCaretAtEnd($('#labExam'),'&nbsp;');
			}            
            
        }
    });

	$('#prescriptions').textcomplete([
	    { // tech companies
	        //words: session_exams['physical_exam'],
	        words: prescriptions,
	        match: /\B@([\-+\w]*)$/,
	        search: function (term, callback) { 	
	            callback($.map(this.words, function (word) {
	            	// not case sensitive search
	               return word['prescription_name'].toUpperCase().indexOf(term.toUpperCase()) === 0 ? word['prescription_name'] : null;
	            }));
	        },
	        index: 1,
	        template: function (value) {
	        	sub_name = get_sub(this.words,value);
	            return value+'<br>'+'<div class="sub_value text-muted h-space">'+sub_name+'</div>';
	        },
	        replace: function (word) {
	            return ' ';
	        }
	    }
	]).on({
        'textComplete:select': function (e, value, strategy) {
        	var sub_name = get_sub(prescriptions,value);
        		exam_box = $('#prescriptions').find('div[data-head="'+value+'"]'),
        	result = '<div data-head="'+value+'">\
	        			<label data-label="title">'+value+'</label>\
	        			<div data-tagname="'+value+'">\
	        				<span data-value="'+sub_name+'" data-name="value">'+sub_name+'</span>\
	        			</div>\
	        		</div>';

	        if( exam_box.length ){
				bootbox.alert(value+' Already added.', function(result) {});
			}else{
				field_group = $('#prescriptions').find('div[data-head="'+value+'"]');
				field_group = ( field_group.length ) ? field_group : $('#prescriptions');
            	field_group.append(result);
            	placeCaretAtEnd(field_group,'&nbsp;');
        	}
            
        }
    });

	$('#completion').textcomplete([
	    { // tech companies
	        //words: session_exams['physical_exam'],
	        words: session_exams['completion'],
	        match: /\B@([\-+\w]*)$/,
	        search: function (term, callback) { 	
	            callback($.map(this.words, function (word) {
	            	// not case sensitive search
	               return word['name'].toUpperCase().indexOf(term.toUpperCase()) === 0 ? word['name'] : null;
	            }));
	        },
	        index: 1,
	        replace: function (word) {
	            return ' ';
	        }
	    }
	]).on({
        'textComplete:select': function (e, value, strategy) {
        	
        	var words = strategy.words;
        	modal = $.map(words,function(res){
        		return ( res['name'] == value ) ? {name:res['modal'],size:res['size']} : null;
        	})
        	var modalName = modal[0]['name'],
        		modalSize = modal[0]['size'] || 400;
        		exam_box = $('#completion').find('div[data-head="'+value+'"]'),
				node_data = getSingleData(exam_box);

           if( exam_box.length ){
				bootbox.confirm(value+' Already added. Do you want to edit?', function(result) {
					if(result) {
						callModal(value,node_data,modalName,modalSize);
					}
				});
			}else{
				callModal(value,node_data,modalName,modalSize);
			}
        }
    });

	$('[contenteditable=true]').keydown(function(evt){
		key = evt.keyCode;
		if( evt.shiftKey && key == 50 ){ // shift + 2 = @
			var dDown = $('.textcomplete-dropdown');
        	if( dDown.length = 0 || $(dDown.get(0)).css('display') == 'none' ){
                placeCaretAtEnd($(this),'@');
                
    			evt.preventDefault();
    		}
	    }
        
	});

	$('#labExam').on('click','a',function(){
		var modalName = $(this).attr('href'),
			modalSize = $(this).data('size'),
			value = $(this).html(),
			exam_box = $(this).closest('div[data-head]'),
			node_data = getSingleData(exam_box);

		$labExamNode = $(this); // save node selected
		callModal(value,node_data,modalName,modalSize);
	})

	var $dump = '';
	$('#btn_save_form').click(function(){
		var holder = $('#js_data_holder'),
			sessions_data = [],
			sessions_html = [];
		var data_array = {
			/*sessions_data: {
				physicalExam: getFormData('physicalExam'),
				labExam: getFormData('labExam'),
				prescriptions: getFormData('prescriptions'),
				completion: getFormData('completion')
			},
			sessions_html: {
				physicalExam: $('#physicalExam').html(),
				labExam: $('#labExam').html(),
				prescriptions: $('#prescriptions').html(),
				completion: $('#completion').html()
			},*/
			patient_id : holder.data('patientid'),
			appointment_id : holder.data('appointmentid')
		}
		var forms = $('.textComplete').find('.widget-box');
		$.each( forms, function(){
			title = $(this).find('.widget-title').html();
			form = $(this).find('.widget-main > div');
			form_id = form.attr('id');
			form_data = form.html();
			data = {
				title: title,
				result: getFormData(form_id)
			}
			html = {
				title: title,
				result: form_data
			}
			sessions_data.push(data);
			sessions_html.push(html);
			
			//console.log(sessions_data);
		})
		var res_data = $.extend( data_array,{session_data:sessions_data}, {sessions_html:sessions_html} );
		$.post( 'patient/session_form/save_session', res_data, function(res){
			$('#notification').html(res).show();
			$('#notification').delay( 5000 ).fadeOut( 500 );
			$(window).scrollTop($('.page-header'));
		});

	});

	function callModal(value,node_data,modalName,modalSize){
    	$('.ajaxModal').modalBox({
			modal_view:modalName,
			modal_data: {title:value,field_data: node_data},
			title: false,
			width: modalSize,
			button_cancel: 'Cancel',
			button_ok: 'save',
		});
    }

	function get_sub(data_arr,value){
		var sub = $.map(data_arr,function(res){
    		return ( res['prescription_name'] == value ) ? res['prescription_sub'] : null;
    	})

    	return sub[0];
	}

	function placeCaretAtEnd(el_box,html) {

		el = el_box.get(0);
		console.log(el);
	    el.focus();
	    if (typeof window.getSelection != "undefined" && typeof document.createRange != "undefined") {
	        var range = document.createRange();
	        range.selectNodeContents(el);
	        range.collapse(false);
	        var sel = window.getSelection();

	        // node = document.createTextNode(html);
	        // range.insertNode(node);

	        var el_box = document.createElement("div");
            el_box.innerHTML = html;
            var frag = document.createDocumentFragment(), node, lastNode;
            while ( (node = el_box.firstChild) ) {
                lastNode = frag.appendChild(node);
            }
            range.insertNode(frag);

	        range.setStart(lastNode,1);
            range.collapse(true);
	        sel.removeAllRanges();
	        sel.addRange(range);
	        el.focus();
	    } else if (typeof document.body.createTextRange != "undefined") {
	        var textRange = document.body.createTextRange();
	        textRange.moveToElementText(el);
	        textRange.collapse(false);
	        textRange.select();
	    }
	    
	}

	function insertString(form,field_box){
		
		var result = '',
			form_title = form.data('title'),
			formData = form.serializeArray();

		//remove old data
		if( field_box.length && field_box.attr('data-head') && field_box.attr('data-head') != 'Complains' )
			field_box.find('div').remove();

		// trim array retain main value that are not null.
		var data_arr = $.grep(formData,function(res){
			return $.trim(res['value']).length != 0;
		})

		if( data_arr.length > 0 ){
			$.each( data_arr, function(key,val){
					form_group_fields = form.find('[name="'+val['name']+'"], [for="'+val['name']+'"]'); // find all element with data-label
					var form_group_data = '';

					$.each( form_group_fields, function(k,v){
						var value = '';
						label = $(v).data('label');
						field_sep = ( label == 'field' ) ? ':' : '';
						
						if( $(v).is('label') ){
							value = '<label contenteditable="false" data-name="'+label+'" data-value="'+$(v).html()+'">'+$(v).html()+field_sep+'</label>';
						}else if( label == 'remarks' ){							
							if( $(v).val() ) {
								value = '<div data-tagname="'+val['name']+'_remarks">\
									<label data-name="field" data-value="Remarks">Remarks: </label>\
									<span data-name="'+label+'" data-value="'+$(v).val()+'"> '+$(v).val()+'</span>\
									</div>';
							}
						}else{
							value = '<span data-name="'+label+'" data-value="'+$(v).val()+'"> '+$(v).val()+' &nbsp;&nbsp;</span>';
						}
						
						form_group_data += value;
					});
					result += '<div data-tagname="'+val['name']+'">'+form_group_data+'</div>';
			});
			if( ! field_box.attr('data-head') ){
				result =	'<div data-head="'+form_title+'">\
								<label data-label="title">'+form_title+'</label>\
								'+result+'\
						 	</div>';	
			}
			field_box.append(result);
		}
		$.closeDialog();
	}	

	function getSingleData(node){
		// node are div with data-head
		var node_box = $(node),
			node_data = node_box.find('>div'),
			data_arr = {};

		if( node_data.length > 0 ){
			$.each(node_data,function(key,val){
				var data,
					tagName = $(val).data('tagname'),				
					
				step = function(level){
					var remarks = $(level).find('>div[data-tagname]'),
						reamarks_tagName = $(remarks).data('tagname'),
						nodes = $(level).find('>[data-name]'),
						node_arr = {};
					$.each(nodes,function(i,v){
						node_arr[$(v).data('name')] = $(v).data('value');
					});

					if( remarks.length )
						node_arr[reamarks_tagName] = step(remarks);

					return node_arr;
				}

				data = step(val);
				data_arr[tagName] = data;
			});			
		}
		return data_arr;
	}

	

	function getFormData(form_name){
		var form = $('#'+form_name),
			data_head = form.find('div[data-head]');
			nodes = {},
		$.each(data_head,function(key,val){
			nodes[$(val).data('head')] = getSingleData(val);
		})

		return nodes;
	}

</script>