<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session_form extends CI_Controller {
	
	public function index(){
		$appointment_id = $this->input->post('appointment_id');
	    if( $this->session->userdata('access') <= 3 && $appointment_id ){
	      $data = array(
	      	'content'=>'patient/session_form_view',
	      	'session_exams' => $this->session_exam(),
	      	'prescriptions' => $this->helper_model->query_table('prescription_name,prescription_sub','req_prescription'),
	      	'appointment_id' => $appointment_id,
	      	'patient_info' => $this->get_user_info( $this->input->post('patient_id') ),
	      	'session_data' => $this->helper_model->query_table( 'session_html','tbl_patient_sessions','WHERE appointment_id = "'.$appointment_id.'"','row' )
	      	);
	      $data['style'] = 'assets/css/jquery.textcomplete.css';
	      $data['style'] = 'assets/css/jquery-overlay/main.css';
	      $data['style'] = 'assets/css/jquery-overlay/shCoreDefault.css';
	      $this->load->view('base',$data);
	    }else{
	      $data = array('content'=>'no_access_view');
	      $this->load->view('base',$data);
	    }
	}

	public function session_exam(){
		$sessions = $this->helper_model->query_table('se_name,se_type,se_modal_name,se_modal_size','req_session_exams');
		$result = array();
		foreach ($sessions as $val) {
			$result[$val->se_type][] = array(
				'name' => $val->se_name,
				'modal' => $val->se_modal_name,
				'size' => $val->se_modal_size
				);
		}
		return $result;
	}

	public function save_session(){
		$message = '';
		$data = $this->input->post();
		$session_data = ( isset($data['sessions_data']) )  ? $data['sessions_data'] : '';
		$insert_array = array(
			'appointment_id' => $data['appointment_id'],
			'patient_id' => $data['patient_id'],
			'session_data' => serialize($session_data),
			'session_html' => serialize($data['sessions_html']),
			'updated_date' => date('Y-m-d H:i:s'),
			'updated_by' => $this->session->userdata('user_id')
			);
		//print_r($data);exit();

		if( $this->helper_model->row_exist( array('appointment_id'=>$data['appointment_id']) , 'tbl_patient_sessions' ) ){
			$this->db->update('tbl_patient_sessions',$insert_array,array( 'appointment_id'=>$data['appointment_id'] ));
			$message = 'Update successful';
	 	}else{
	 		$this->db->insert('tbl_patient_sessions',$insert_array);
	 		$message = 'Save successful';
	 	}

	 	//print_r($this->db->last_query());exit();
		if( $this->db->affected_rows() > 0 ){
			echo '<h1 class="green">'.$message.'</h1>';
		}else{
			echo '<h1 class="res">Something went wrong! session not saved.</h1>';
		}
	}

	public function get_user_info($id){
		return $this->helper_model->query_table( 
			'patient_id, CONCAT( first_name, " ", LEFT(middle_name,1), ". ", last_name ) as full_name,insurance_name',
			'tbl_patients' ,
			'WHERE patient_id = "'.$id.'"',
			'row',
			'LEFT JOIN req_insurance ON tbl_patients.insurance = req_insurance.insurance_id'
			);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */