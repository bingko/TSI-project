<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function index()
	{ 
		$data['member']=$this->report_model->total_member();
	    $data['page'] = "admin/dashboard"; // ส่ง $pageไปแสดงในhead | value = pathใน view
		$this->load->view('head',$data);
	}
	
}