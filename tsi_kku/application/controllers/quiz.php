<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Quiz extends CI_Controller {
	
		public function index()
		{ 
			
		}
		
		public function manageQuiz()
		{ 
		    $data['page'] = "manage/manageQuiz"; // ส่ง $pageไปแสดงในhead | value = pathใน view
			$this->load->view('head',$data);
		}
		public function newQuiz()
		{ 
		    $data['page'] = "manage/newQuiz"; // ส่ง $pageไปแสดงในhead | value = pathใน view
			$this->load->view('head',$data);
		}
		
		
		public function modifyQuiz()
		{ 
		    $data['page'] = "manage/modifyQuiz"; // ส่ง $pageไปแสดงในhead | value = pathใน view
			$this->load->view('head',$data);
		}
		
		
		public function listQuiz()
		{ 
			 
			$data["catID"] = $this->uri->segment(3) ;
			$outData=$this->question_model->getCat( $this->uri->segment(3)) ;
			//print_r($outData);exit;
			$data['cat']=$outData[0];
		    $data['page'] = "manage/listQuizCategories"; // ส่ง $pageไปแสดงในhead | value = pathใน view
			$this->load->view('head',$data);
		}
		
		
		public function saveNewQuiz()
		{ 
			
 
		 if($this->input->post("ans1")){
		 	$ans = 1;
		 }else if($this->input->post("ans2")){
		 	$ans = 2;
		 }else if($this->input->post("ans3")){
		 	$ans = 3;
		 }else if($this->input->post("ans4")){
		 	$ans = 4;
		 } 
		  $setQuestion=array( "question_detail"=> $this->input->post("question"),
	 	    				"question_user"=>$this->session->userdata('uid'),
	 	   					 "question_categories"=>$this->input->post("cat"),
	 	    				"question_status"=>1,
		  					"question_ans"=>$ans
	 	    				 );
	 	    $setAns=array("ans1"=>$this->input->post("ans_text1"),
	 	    			  "ans2"=>$this->input->post("ans_text2"),
	 	    			  "ans3"=>$this->input->post("ans_text3"),
	 	   				  "ans4"=>$this->input->post("ans_text4"),
	 	    			  "ans_true"=>"1");
			$this->question_model->addQuestion($setQuestion,$setAns);
		    echo "ok";
		    return true;
		}

		
		
		public function saveModifyQuiz( )
		{ 
			  //echo $id;
			 // exit;
			   $id =$this->input->post("qid");
			if($this->input->post("ans1")){
		 		$ans = 1;
			 }else if($this->input->post("ans2")){
			 	$ans = 2;
			 }else if($this->input->post("ans3")){
			 	$ans = 3;
			 }else if($this->input->post("ans4")){
			 	$ans = 4;
			 } 
		 	  
			  $setQuestion=array( "question_detail"=> $this->input->post("question"),
		 	    				"question_user"=>$this->session->userdata('uid'),
		 	   					 "question_categories"=>$this->input->post("cat"),
		 	    				"question_status"=>1,
			  					"question_ans"=>$ans
		 	    				 );
		 	    $setAns=array("ans1"=>$this->input->post("ans_text1"),
		 	    			  "ans2"=>$this->input->post("ans_text2"),
		 	    			  "ans3"=>$this->input->post("ans_text3"),
		 	   				  "ans4"=>$this->input->post("ans_text4"),
		 	    			  "ans_true"=>"1");
				$this->question_model->editQuestion($id,$setQuestion,$setAns);
				 
			  //  echo "ok";
			    return true;
		}
		 
		
	
		public function start()
		{ 
			
		    $data['page'] = "quiz/start"; // ส่ง $pageไปแสดงในhead | value = pathใน view
		    
		    $data["quiz_all"] = $this->quiz_model->get_quiz();
			$this->load->view('head_member',$data);
		}
		
		
		
		public function sumScore()
		{ 
			
		    $data['page'] = "quiz/sumScore"; // ส่ง $pageไปแสดงในhead | value = pathใน view 
		    //$data["no"]=$this->session->userdata('no')
		    $data["score"] = $this->quiz_model->sumScore();
 			//$data["no"]=$this->session->userdata('no')
			$this->load->view('head_member',$data);
		}
		

		
	   public function report()
		{ 
			
		    $data['page'] = "quiz/sumScore"; // ส่ง $pageไปแสดงในhead | value = pathใน view 
		    //$data["no"]=$this->session->userdata('no')
		    $data["score"] = $this->quiz_model->sumScoreAll();
 			//$data["no"]=$this->session->userdata('no')
			$this->load->view('head_member',$data);
		}
		
		
		public function suggestion()
		{ 
			
		    $data['page'] = "quiz/suggestion"; // ส่ง $pageไปแสดงในhead | value = pathใน view
			$this->load->view('head_member',$data);
		}
		
		
		
		public function listCat()
		{ 
			header('Content-Type: application/json');
		    echo json_encode( $this->quiz_model->listCategories());
		    return 1;
		}
		
	   public function createCat()
		{ 
		//	echo $this->input->post["models"];
		//	print_r($_POST["models"]);
		//	exit;
			$data = json_decode($_POST["models"]);
			
			//print_r($data);
		    $this->question_model->addCategories(array("categories_name"=>$data[0]->categories_name,"cnt"=>$data[0]->cnt));
			$this->listCat();
			return 1;
		}
		
	   public function destroyCat()
		{ 
			$data = json_decode($_POST["models"]); 
		 
			foreach($data as $delData){
			//	 print_r($delData);
				$inData["categories_id"] = $delData->categories_id;
		       
				$this->question_model->deleteCategories($inData);
			}
		 	$this->listCat();
			return 1;
		}
	   public function modifyCat()
		{ 
			$data = json_decode($_POST["models"]);
			//print_r($data);
			foreach($data as $modData){
				//	 print_r($delData);
				//	$inData["categories_id"] = $modData->categories_id;
				//exit;
				$inData["categories_id"] = $modData->categories_id;
				$inData["categories_name"] = $modData->categories_name;
				$inData["cnt"] =  $modData->cnt;
			    $this->question_model->updateCategories($inData);
			}
		    $this->listCat();
		    return 1;
		}
		
		
		public function listQuestion()
		{ 
			header('Content-Type: application/json');
			$data["catID"] = $this->uri->segment(3) ;
		    echo json_encode( $this->question_model->listQuestion($data["catID"]));
		    return 1;
		}
		
	   public function createQuestion()
		{ 
		//	echo $this->input->post["models"];
		//	print_r($_POST["models"]);
		//	exit;
			$data = json_decode($_POST["models"]);
			
			//print_r($data);
		    $this->question_model->addCategories(array("categories_name"=>$data[0]->categories_name));
			$this->listCat();
			return 1;
		}
		
	public function destroyQuestion()
		{ 
			$data = json_decode($_POST["models"]); 
		 	//print_r($data);exit;
			foreach($data as $delData){
			//	 print_r($delData);
				$inData["question_id"] = $delData->question_id;
		       
				$this->question_model->deleteQuestion($inData);
			}
		 	$this->listCat();
			return 1;
		}
		
		
		
 		public function editQuestion()
		{ 
			$outData=$this->question_model->getQuestion( $this->uri->segment(4)) ;
			$data['question']=$outData[0];
			$data["catid"]=$this->uri->segment(4);
		    $data['page'] = "manage/editQuestion"; // ส่ง $pageไปแสดงในhead | value = pathใน view
			$this->load->view('head',$data);
		}
		 
	
		
		public function saveVDO()
		{ 
			// http://127.0.0.1/work/tsi_kku/index.php/quiz/listQuiz/
		 	$this->quiz_model->saveVDO($_POST["file"],$_POST["catId"]);
		    redirect( base_url().'index.php/quiz/listQuiz/'.$_POST["catId"], 'refresh');
		}
		
		
		
	public function check()
		{ 
			$count= $this->input->post("cnt");
			$tmp =array();
		//	$section=""; // 
			$total=0;
 			$total_score=array();
			$score=0;
			for($i=1;$i<$count;$i++){
				$ans= $this->input->post("p".$i);
				$check_ans =$this->input->post("qa".$i);
				$unit = $this->input->post("unit_".$i);
				 
			     $tmp[$unit][$i]["ans"]=$ans;
				 $tmp[$unit][$i]["check_ans"]=$check_ans;
				 $tmp[$unit][$i]["ans"]=$ans;
				 $tmp[$unit][$i]["unit"]=$unit;
			}
			//echo "<pre>";
			// print_r($tmp);
			$run=0;
			foreach($tmp as $section){
				//print_r($section);
				$score = 0;
				foreach($section as $checkScore){
					//print_r($checkScore);
					if($checkScore["ans"] ==$checkScore["check_ans"]  ){
						$score++;
					}
				}
				$total_score[$run]["section"] =  $checkScore["unit"];
				$total_score[$run]["score"] =  $score;
				$run++;
			}
		//	 print_r($total_score);
			$this->quiz_model->inScore($total_score);
			 
		}
}

?>