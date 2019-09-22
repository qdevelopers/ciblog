<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_M extends CI_Model {

	public function getAllPost()
	{
		$this->db->select('post.*, count(comm.id) as total_comment, usr.name');
		$this->db->from('posts post');
		$this->db->join('users usr', 'post.author = usr.id', 'left');
		$this->db->join('comments comm', 'post.id = comm.id', 'left');
		return $this->db->get()->result_object();
	}

}

/* End of file Post.php */


?>
