<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	private $data;
	public function __construct(){
		 //happy coding, pakde
		 parent::__construct();
		 is_authorize();
		 $menu = $this->config->item('menu');
		 $this->data['menu'] = $menu[$this->session->userdata('access')];
		 $this->data['title'] = $this->config->item('site');
		 $this->data['js'] = "dashboard";
	}
	public function index()
	{
		$this->load->view('layout', $this->data, FALSE);
		
	}

}

/* End of file Dashboard.php */



?>
