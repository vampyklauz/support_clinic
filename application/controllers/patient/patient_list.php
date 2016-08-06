<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient_list extends CI_Controller {
	
	public function index()
	{
		if( $this->session->userdata('access') <= 3 ){
			$data = array(
				'content'=>'patient_list_view',
				'javascript_data' => array(
		      		'insurance'=> getDropDown('insurance','','grid')
		      		)
				);
			$data['style'][] = 'assets/css/ui.jqgrid.css';
			$this->load->view('base',$data);
		}else{
			$data = array('content'=>'no_access_view');
			$this->load->view('base',$data);
		}
	}

	public function latest_appointment(){
		$id = $this->input->post('id');
		$latest = $this->helper_model->query_table('seq_id','tbl_appointments','WHERE apt_patient_id = "'.$id.'" ORDER BY apt_date DESC LIMIT 1','single');
		echo $latest;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */