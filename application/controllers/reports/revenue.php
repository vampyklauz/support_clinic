<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Revenue extends CI_Controller {
	
	public function index()
	{
		if( $this->session->userdata('access') <= 3 ){
			$data = array(
				'content'=>'reports/revenue_view',
				'javascript_data' => array(
		      		'insurance'=> getDropDown('insurance','','grid')
		      		)
				);
			$data['style'][] = 'assets/css/ui.jqgrid.css';
			$data['style'][] = 'assets/css/daterangepicker.css';
			$data['style'][] = 'assets/css/chosen.css';

			$this->load->view('base',$data);
		}else{
			$data = array('content'=>'no_access_view');
			$this->load->view('base',$data);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */