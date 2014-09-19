<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Register extends CI_Controller {
 
		public function index(){
			$this->load->view('register/register');
		}
		
		public function regist(){
				if($this->input->post("pwd1") == $this->input->post("pwd2")){
					$inData = array("member_name"=>$this->input->post("txt_name"),
									 "username"=>$this->input->post("txt_email"),
									"password"=>md5($this->input->post("pwd2")),
									"sex"=>$this->input->post("rdosex"),
									"tel"=>$this->input->post("tel"),
									"email"=>$this->input->post("txt_email"),
									"degree"=>$this->input->post("degree" ),
									"address"=>$this->input->post("txt_addr") 
									//"uid"=>$this->input->post("txt_addr") 
									);
						
					//print_r($inData);
					$uid = $this->register_model->newRegister($inData);
					// print_r($uid);
					if($uid ){
						
						$newdata=array(	 		'uid'     => $uid[0]["member_id"],
		 										'username'     => $this->input->post("txt_email"),
		 										'displayname'     => $this->input->post("txt_name"),
		 										'login_time'     => date("Y-m-d H:i:s"),
												'no'     => 0,
												'logged_in' => TRUE);
		 							$this->session->set_userdata($newdata);
						$this->load->view('register/completed');
					}
				}else{
					  redirect( base_url().'index.php/register/', 'refresh');
				}
		}
		
 	}

?>