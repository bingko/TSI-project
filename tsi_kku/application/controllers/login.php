<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login extends CI_Controller {
		
 		public function index(){
 				
				$this->load->view("login" );
 		}
 		
	 	public function checkLogin(){
	 		$inData = array("username" => $this->input->post("username"),
	 						"password" => $this->input->post("password")
	 						);
	 		$return_data = $this->member_model->checkLogin($inData);
	 		$login_user = $return_data[0];
	 	//	echo $login_user["status"];
	 		switch($login_user["status"]){
		 		case "staff" : { 
		 							$newdata=array(
		 										'uid'=>$login_user["staff_id"],
		 										'username'     => $login_user["staff_username"],
		 										'displayname'     => $login_user["staff_name"],
		 										'login_time'     => date("Y-m-d H:i:s"),
												'logged_in' => TRUE);
		 							$this->session->set_userdata($newdata);
		 							 redirect('/admin', 'refresh'); break;
		 							break; 
		 						}
		 		
		 		case "member" : { 
		 							$newdata=array(
		 										'uid'=>$login_user["member_id"],
		 										'username'     => $login_user["username"],
		 										'displayname'     => $login_user["member_name"],
		 										'login_time'     => date("Y-m-d H:i:s"),
												'logged_in' => TRUE);
		 							$this->session->set_userdata($newdata);
		 							 redirect('/member', 'refresh'); break;
		 							break; 
		 						}
		 		case "false" : redirect('/login/index/fail', 'refresh'); break;
		 		default : break;
	 		}
	 	}
	 	
		public function logout(){
		$this->session->sess_destroy();
	 
		//print_r( $this->session->all_userdata());
		//echo $this->session->userdata('session_id');
	    $this->load->view("login" );
	}
 		
 	}

?>