<?php
defined('BASEPATH') or exit('No direct script access allowed');


if (!function_exists('is_authorize')) {
	# code...
	function is_authorize()
	{
		$CI =& get_instance();
		if (($CI->session->userdata('sess_id') === NULL) OR ($CI->session->userdata('status') === FALSE)) {
			$CI->session->set_flashdata('message', 'You are unauthorize');
			redirect('admpanel');
		}
	}
}

if (!function_exists('is_logged_in')) {
	# code...
	 function is_logged_in()
	{
		if (isset($_SESSION['sess_id']) AND isset($_SESSION['status']) ) {
			redirect('admin/Dashboard');
		}
	}
}


?>
