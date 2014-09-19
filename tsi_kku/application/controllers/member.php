<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Member extends CI_Controller {
	
		public function index()
		{ 
		    $data['page'] = "member/dashboard"; // ส่ง $pageไปแสดงในhead | value = pathใน view
			$this->load->view('head_member',$data);
		}	
 	}

?>