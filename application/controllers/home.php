<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array('content'=>'patient_queues_view');
		$data['style'][] = 'assets/css/ui.jqgrid.css';
		$this->load->view('base',$data);
	}

	public function actions(){
		$oper = $this->input->post('oper');
		$id = $this->input->post('id');
		$old_data = serializeToArray($this->input->post('old_data'));

		$data = array();
		switch ($oper) {
			case 'add':
				$this->add_action();
				break;
			case 'del':
				$this->delete_action();
				break;
			case 'edit':
				$data = array(
					'f_name' => $this->input->post('f_name'),
					'l_name' => $this->input->post('l_name'),
					'status' => $this->input->post('status')
				);
				
				$deff = array_diff_assoc($data,$old_data);
				if( ! empty($deff) ){ // check if has difference.
					// Update database
					$this->db->trans_start();
					$this->db->update('sample_employee',$data,array('employee_id'=>$id));
					//$this->db->update('tbl_patients',);
					$this->db->trans_complete();

					if ( $this->db->trans_status() ){ // check if transaction is successfull.
						// create trail data elements.
						$trail_data = array(
							'name' => 'sample_employee',
							'data_id' => $id, // ID of data modified.
							'data' => $data,
							'old_data' => $old_data,
							'method' => $oper // action or method use of this transaction.
						);
						audit_trail($trail_data);
					}
				}
				break;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */