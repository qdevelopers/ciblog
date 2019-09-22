<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	private $data;
	public function __construct(){
		 //happy coding, pakde
		 parent::__construct();
		 is_authorized();
		 $menu = $this->config->item('menu');
		 $this->data['menu'] = $menu[$this->session->userdata('access')];
		 $this->data['title'] = "Dashboard | ". $this->config->item('site');
		 $this->data['subtitle_header'] = "Welcome ".  $this->session->userdata('name');
		 $this->data['js'] = "dashboard";
	}
	
	public function index()
	{
		 $this->data['content'] = $this->load->view('admin/dashboard_v', $this->data, TRUE);
		 $this->load->view('layout', $this->data, FALSE);
		
	}

}

/* End of file Dashboard.php */



?>
