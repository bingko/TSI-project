<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Setting extends CI_Controller {
	
		public function index()
		{ 
		    $data['page'] = "setting/setting"; // ส่ง $pageไปแสดงในhead | value = pathใน view
			$this->load->view('head',$data);
		}
		
 	}

?>