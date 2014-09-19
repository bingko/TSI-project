<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Report extends CI_Controller {
	
		public function index()
		{ 
		    $data['page'] = "report/report"; // ส่ง $pageไปแสดงในhead | value = pathใน view
			$this->load->view('head',$data);
		}
		
		public function getAllMember(){
			header('Content-Type: application/json');
			//$data["catID"] = $this->uri->segment(3) ;
		    echo json_encode( $this->report_model->getMember());
		    return 1;
		}
		
 	}

?>