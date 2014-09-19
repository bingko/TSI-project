<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Quiz_unittest extends CI_Controller {
 
		public function index(){
			//$this->register();
			//$this->getMember();
		//	$this->changePassword();
			//$this->addCategories();
		 //	$this->addQuestion();
		 	$this->editQuestion();
		 	
		}
		
		
		public function register(){
	 	    $setData = array( 
	 	    				"member_fname"=>"Wanchalerm",
	 	    				"member_lname"=>"boonyakanjana",
	 	    				"username"=>"wanchale",
	 	    				"password"=>md5("password"),
	 	    				"tel"=>"0818666851",
	 	    				"email"=>"wanchalermb@gmail.com",
	 	    				"sex"=>true,
	 	    				"address"=>"afafasdfadsfsfsfdf",
	 	    				"degree" => "2");
	 	    $this->load->library('unit_test');
			//$this->register_model->newRegister($setData);
			$this->unit->run($this->register_model->newRegister($setData), "is_bool", "Test New REgister","Register");
		 	$this->load->view("unittest" ); 
		}
		

		
		public function getMember(){
	 	    $setData = "1";
	 	    $this->load->library('unit_test');
			//print_r($this->register_model->getMember($setData));
			$this->unit->run($this->member_model->getMember($setData), "is_array", "Get Member","get member $setData=id ");
		 	$this->load->view("unittest" ); 
		}

		
		public function changePassword(){
	 	     
	 	    $this->load->library('unit_test');
	 	    $user_id = "13";
			 $setData = array( 
	 	    				"password"=> md5("Password")
	 	    				);
			$this->unit->run($this->member_model->changePassword($user_id,$setData), "is_bool", "Change Password","Change Password");
		 	$this->load->view("unittest" ); 
		}
		
		public function addQuestion(){
	 	    $setQuestion=array( "question_detail"=> "อะไรเอ่ย มี 3 ขา กกกกก ?",
	 	    				"question_user"=> "12",
	 	   					 "question_categories"=> "2",
	 	    				"question_status"=>1,
	 	    				 );
	 	    $setAns=array("ans1"=>"Answer A",
	 	    			  "ans2"=>"Answer B",
	 	    			  "ans3"=>"Answer C",
	 	   				  "ans4"=>"Answer D",
	 	    			  "ans_true"=>"1");
	 	    $this->load->library('unit_test');
			$this->unit->run($this->question_model->addQuestion( $setQuestion,$setAns), "is_bool", "Add Question","Question");
		 	$this->load->view("unittest" ); 
		}		
		
		
		
		
		public function editQuestion(){
			$q_id=20;
	 	    $setQuestion=array( "question_detail"=> "adfdfadsfsf",
	 	    				"question_user"=> "123",
	 				    "question_categories"=> "1",
	 	    				"question_status"=>1,
	 	    				 );
	 	    $setAns=array("ans1"=>"Answer Aaaa",
	 	    			  "ans2"=>"Answer Bbbb",
	 	    			  "ans3"=>"Answer Cccc",
	 	   				  "ans4"=>"Answer Dddd",
	 	    			  "ans_true"=>"3");
	 	    $this->load->library('unit_test');
			$this->unit->run($this->question_model->editQuestion( $q_id,$setQuestion,$setAns), "is_bool", "Add Question","Question");
		 	$this->load->view("unittest" ); 
		}		
		
		
		
		public function addCategories(){
	 	    $setCat=array( "categories_name"=> "ประเภท ",
	 	    				 
	 	    				 );
	 	    
	 	    $this->load->library('unit_test');
			$this->unit->run($this->question_model->addCategories($setCat), "is_bool", "Add Question","Question");
		 	$this->load->view("unittest" ); 
		}	

		public function delQuestion(){
	 	    $setData = "1";
	 	    $this->load->library('unit_test');
			//print_r($this->register_model->getMember($setData));
			$this->unit->run($this->member_model->getMember($setData), "is_array", "Get Member","get member $setData=id ");
		 	$this->load->view("unittest" ); 
		}
 	}

?>