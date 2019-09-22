<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	private $data;

	public function __construct(){
		//happy coding, pakde
		parent::__construct();
		is_authorized();
		$menu = $this->config->item('menu');
		$this->data['menu'] = $menu[$this->session->userdata('access')];
		$this->data['title'] = "Posts | " . $this->config->item('site');
		$this->data['title_header'] = "Post Page ";
		$this->data['subtitle_header'] = "Let's make an awesome creations today";
		$this->data['js'] = "posts";
	}

	public function index()
	{
		$this->data['content'] = $this->load->view('admin/post_v', $this->data, TRUE);
		$this->load->view('layout', $this->data, FALSE);	
	}

	public function new_post()
	{
		echo "<h1> it will be a new post page</h1>";
	}

}

/* End of file Post.php */



?>
