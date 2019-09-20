<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class STDCRUD extends CI_Model {

	public function get_by_fields($table, $fields, $limit = 0, $offset = 0)
	{
		return $this->db->get($table, $fields, $limit, $offset);	
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->affected_rows();		
	}

	

}



?>
