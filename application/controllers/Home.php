<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Home extends BaseController {
	public function __construct() {
        parent::__construct();

    }

	public function index()
	{
		if (!empty($this->session->userdata('isUserLogin'))) {
			redirect("dashboard");
		}else{
			redirect('home/login');
		}

	}
		

	

	public function login()
	{
	    if (!empty($this->session->userdata('isUserLogin'))) {
				//echo "string";
            redirect("dashboard");
        }
        else{	   
			if ($this->input->post("submit")) {
			//echo "hii"; exit;
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

	            if ($this->form_validation->run($this)) {
	            	//echo "hii";
	            	$data=array('username'=>$this->input->post('username'),'password'=>$this->input->post('password'));
                	if($this->Authentication_model->user_authentication($data)!=NULL)
                	{
                      $result=$this->Authentication_model->user_authentication($data);
                       //var_dump($result);
                       //exit();
                			$this->session->set_userdata('isUserLogin', $result);
                			redirect("dashboard");
                	}else{
                		$this->session->set_flashdata('message', 'Invalid Authentication, please try again.');
                		
                	}
	            }else{
	            	$this->session->set_flashdata('error', 'Failed');
	            	
	            }
            }
            	$this->load->view('index');
        }
               
	}

	

	public function logout() {
		if(!empty($this->session->userdata('isUserLogin'))){
        $userLogin = $this->session->userdata('isUserLogin');
        $this->session->unset_userdata('isUserLogin');
        redirect('home');
     }else{
     	redirect('home');
     }	
    }

    
}
