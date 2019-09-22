<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 public function __construct() {

		parent::__construct();
		$this->load->model('STDCRUD', 'crud');
		
	}

	public function index()
	{
		is_logged_in();
		$date = date('ddmmyyhhiiss'). rand(1, 100);
		$tkn = md5($date);
		$_SESSION[$this->input->ip_address()] = $tkn;

		$data['csrf'] = $tkn;
		$data['title'] = "Start Session ". $this->config->item('site');
		$this->load->view('admin/login_v', $data);
	}

	public function execute()
	{
		$token = trim($this->input->post('csrf'));
		$session = trim((isset($_SESSION[$this->input->ip_address()])) ? $_SESSION[$this->input->ip_address()] : "notOK" );

		if($token === $session){
			unset($_SESSION[$this->input->ip_address()]);
			$username = $this->input->post('username');
			$password = md5(sha1($this->input->post('password') . "CIBLOG919"));
			$find = ['username' => $username, 'password' => $password];
			$data = $this->crud->get_by_fields('users', $find);
			
			if ($data->num_rows() > 0) {
				
				$userdata = array(
					'user_id' => $data->result()[0]->id,
					'name' => $data->result()[0]->name,
					'access' => $data->result()[0]->access_right,
					'photo'	 => $data->result()[0]->photo,
					'sess_id' => date('dmyhis'),
					'status'  => TRUE,
				);
				$logDetail = [
					'login_at' => date('Y-m-d H:i:s'),
					'user_id' => $userdata['user_id'],
					'logout_at' => NULL,
					'sess_id' => $userdata['sess_id']
				];
				$this->session->set_userdata($userdata);
				$this->crud->insert('log_sessions', $logDetail);
				redirect('admin/dashboard');
			}else{
				$this->session->set_flashdata('message', 'Username or password is incorrect');
				redirect('admpanel');
			}

		}else{
			redirect("https://xnxx.com");
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$_SESSION['message'] = "Message logout";
		$this->session->set_flashdata('message', $_SESSION['message']);
		
		redirect('admpanel');
	}

}

/* End of file Login.php */


?>
