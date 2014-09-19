<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Question extends CI_Controller {
 		public function km(){
 		//	$data["catid"]=$this->uri->segment(4);
 			$data['page'] = "quiz/unit"; // ส่ง $pageไปแสดงในhead | value = pathใน view
		    
		    $data["quiz_all"] = $this->quiz_model->get_quiz_km($this->uri->segment(3));
			$this->load->view('head_member',$data);
 		}
		
 		
		public function unit(){
 			$data['page'] = "quiz/unit"; // ส่ง $pageไปแสดงในhead | value = pathใน view
		    
		    $data["quiz_all"] = $this->quiz_model->get_quiz();
			$this->load->view('head_member',$data);
 		}
 	}

?>