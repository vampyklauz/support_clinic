<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient_appointment extends CI_Controller {

	public function appointment_autocomplete(){
		$data = $this->input->post('data');
		$where = $this->helper_model->searchLike($data,'First_Name,Last_Name');
		$res_query = $this->helper_model->query_table('CONCAT(First_Name, " ", LEFT(Middle_Name,1), ". ", Last_Name) as full_name, emp_id as user_id','tbl_employee','WHERE'.$where.' ORDER BY First_Name ASC LIMIT 5');
		if( ! empty($res_query) ){
			$res_obj = array();
			foreach ($res_query as $key => $value) {
				$res = array(
					'value' => $value->full_name,
					'patient_data' => $value
					);
				$res_obj[] = $res;
			}
			echo json_encode($res_obj);
		}
		
	}

	public function add_appointment(){
		$data = $this->input->post();
		$message = array();
		$insert_array = array(
			'apt_patient_id' => $data['apt_patient_id'],
			'apt_remarks' => $data['apt_remarks'],
			'apt_insurance_id' => $data['apt_insurance'],
			'apt_date' => $data['apt_date'],
			'apt_status' => 'pending'
			);

		$this->db->insert('tbl_appointments',$insert_array);
		if( $this->db->affected_rows() > 0 ){
			$this->session->set_flashdata('apt_message','success');
		}else{
			$this->session->set_flashdata('apt_message','error');
		}
		redirect('home');
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */