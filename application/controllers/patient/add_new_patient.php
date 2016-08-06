<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_new_patient extends CI_Controller {

	public function index()
	{
		if( $this->session->userdata('access') <= 3 ){
			$data = array('content'=>'patient/add_new_patient_view');
			$this->load->view('base',$data);
		}else{
			$data = array('content'=>'no_access_view');
			$this->load->view('base',$data);
		}
	}

	public function register(){
		$data = $_POST;
		$auto_data = array(
			'created_date' => date('Y-m-d H:i:s'),
			'updated_by' => $this->session->userdata('user_id')
			);

		$remarks = $data['remarks'];
		unset($data['remarks']);

		$all_data = array_merge($data,$auto_data);

		$this->db->insert('tbl_patients',$all_data);
		if( $this->db->affected_rows() > 0 ){
			$appointment_data = array(
				'apt_patient_id' => $this->db->insert_id(),
				'apt_remarks' => $remarks,
				'apt_status' => 'pending',
				'apt_date' => date('Y-m-d H:i:s')
				);

			$this->db->insert('tbl_appointments',$appointment_data);
			if( $this->db->affected_rows() > 0 ){
				echo 'success';
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */