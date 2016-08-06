<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if( $this->session->userdata('access') <= 2 ){
			$data = array('content'=>'admin_tools/admin_tools_view');
			$this->load->view('base',$data);
		}else{
			$data = array('content'=>'no_access_view');
			$this->load->view('base',$data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */