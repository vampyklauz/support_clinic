<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Modal_ctrl extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$modal_view = $this->input->post('modal_view');
		$modal_data = $this->input->post('modal_data');
		$view = $this->input->post('view');
		$data = $this->getModalData( $view, $modal_data );
		$this->load->view( $modal_view.'/'.$view, $data );
	}

	public function getModalData( $view, $data ){
		// Modal folder must be in its current Module folder.
		// sample: Models/developers/modals
		$result = array();
		switch ($view) {
			case 'sample_modal':
					$result = array(
						'test' => $data,
						'new' => 'old'
						);
				break;
			case 'appointment_list_modal':
					$result = array(
						'exam_data' => $this->get_appointment_data($data['patient_id'])
						);
				break;
			
			default:
				$result['result'] = $data;
				break;
		}
		
		return $result;

	}

	public function get_appointment_data($patiend_id){
		$query = $this->helper_model->query_table( 'patient_session_id,appointment_id,patient_id,session_html,date_created',
			'tbl_patient_sessions',
			'WHERE patient_id = "'.$patiend_id.'" ORDER BY date_created DESC'
		);
		//return $query;
		$res_html = '';
		if( $query ){
			foreach ($query as $key => $value) {
				$res_html .= '
					<table class="col-xs-12">
						<tbody>
							'.$this->create_session_exams($value).'
						</tbody>
					</table>
				';
			}
			
		}

		return $res_html;
	}

	public function create_session_exams($data){
		$exam_html = '';
		$session_exams = unserialize($data->session_html);
		$array = array('sa ms'=>'x');
		//print_r($session_exams);exit();
		foreach ($session_exams as $key => $value) {
			$exam_html .= '
				<tr>
					<td class="alert-danger text-danger center"><strong>'.date('F d, Y', strtotime($data->date_created)).'</strong></td>
					<td class="alert-success text-success center"><strong><h4>'.$key.'</h4></strong></td>
					<td class="session_data alert-info text-info">
						'.$value.'
					</td>
				</tr>
			';
		}
		return $exam_html;
	}

}