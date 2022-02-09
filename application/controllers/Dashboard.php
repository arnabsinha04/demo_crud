<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';


class Dashboard extends BaseController {
	public function __construct() {
        parent::__construct();
        $this->load->model('User_model','user');
        $this->load->model('Authentication_model','authentication');
    }

	public function index()
	{
        $userdetails=$this->session->userdata('isUserLogin');
        if($userdetails['user_role']=='1'){
            //var_dump($data);exit;
            $data['chart_data']=json_encode($this->user->bar_chart());
            $this->global['pageTitle'] = 'Demo : Dashboard';
            $this->global['mainheader'] = 'index';
            $this->loadViews('dashboard/index',$this->global, $data , NULL);
        }else{
            redirect('dashboard/user_dashboard');
        }

	}

    // public function barGraph(){
    //     $bar_data=$this->user->bar_chart();
    //     foreach($bar_data->result_array() as $key){
    //         $output[]=array(
    //             'gender'=> $key['gender'],
    //             'count' => $key['count']
    //         );
    //     }
    //     echo json_encode($bar_data);
    // }

    public function user_dashboard()
    {
        $userdetails=$this->session->userdata('isUserLogin');
        $data['user_details']=$this->user->getUserDetailsDetails($userdetails['user_id']);
        //var_dump($data);
        //echo "string";
        $this->global['pageTitle'] = 'Demo : User List';
        $this->global['mainheader'] = 'users';
        $this->loadViews('dashboard/user_profile',$this->global, $data , NULL); 
    }

    public function user_details(){
        $data['user_details']=$this->user->getAllUserDetailsDetails();
        //var_dump($data);
        $this->global['pageTitle'] = 'Demo : User List';
        $this->global['mainheader'] = 'users';
        $this->loadViews('dashboard/user_details',$this->global, $data , NULL); 
    }


    public function add_user(){
        $data['genderData']=$this->user->getAllGender();
        $this->global['pageTitle'] = 'Demo : User List';
        $this->global['mainheader'] = 'users';
        $this->loadViews('dashboard/user_add',$this->global, $data , NULL); 
    }

    
    public function insert_user(){
      if ($this->input->post('add_user')) {
            $first_name= html_escape($this->security->xss_clean($this->input->post('first_name')));
            $middle_name= html_escape($this->security->xss_clean($this->input->post('middle_name')));
            $last_name= html_escape($this->security->xss_clean($this->input->post('last_name')));
            $mobile_no= html_escape($this->security->xss_clean($this->input->post('mobile_no')));
            $date_of_birth= html_escape($this->security->xss_clean($this->input->post('date_of_birth')));
            $gender= html_escape($this->security->xss_clean($this->input->post('gender')));
            $email_id= html_escape($this->security->xss_clean($this->input->post('email_id')));
           
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            //$this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile no', 'trim|required|regex_match[/^[0-9]{10}$/]|is_unique[ci_user_details.mobile_no]');
            $this->form_validation->set_rules('email_id', 'Email ', 'trim|required|valid_email|is_unique[ci_user_details.email_id]');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');$this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'trim|required');

            // $this->form_validation->set_message('checkAvailableContact', 'This contact no already associate with another account. ');
            // $this->form_validation->set_message('checkAvailableEmail', 'This email is already associate with another account. ');

            if ($this->form_validation->run($this)) {
                $emp_code=generateEmployeeCode(substr($first_name.$last_name, 0, 3));
                $salt = generatePassword(4, 4);
                $password = $newpassword = sha1($mobile_no.$salt);
                $config=array('emp_code'=>$emp_code,
                  'first_name'=>$first_name,
                  'middle_name'=>$middle_name,
                  'last_name'=>$last_name,
                  'mobile_no'=>$mobile_no,
                  'date_of_birth'=>date("Y-m-d", strtotime($date_of_birth) ),
                  'gender'=>$gender,
                  'email_id'=>$email_id
                );

                //echo "<pre>".print_r($config);exit;

                $user_id=$this->user->add_user($config);
                $authConfig=array('username'=>$mobile_no,
                  'password'=>$password,
                  'salt'=>$salt,
                  'user_role'=>'2',
                  'user_id'=>$user_id,
                  'status'=>'1'
                );
                 $result=$this->authentication->add_user_authentication($authConfig);

                $this->session->set_flashdata('message', 'successfully insert..');
                 redirect('dashboard/user_details');
              }else{
                    $this->session->set_flashdata('error', 'Failed');
            }
        $data['genderData']=$this->user->getAllGender();
        $this->global['pageTitle'] = 'Demo : User List';
        $this->global['mainheader'] = 'users';
        $this->loadViews('dashboard/user_add',$this->global, $data , NULL); 
      }
    }

    public function edit_user()
    {
        $emp_user_id=$this->uri->segment(3);
        //echo $emp_user_id;exit;
        if(empty($emp_user_id)){
            redirect('errors_400');exit;
        }
        $data['user_details']=$this->user->getUserDetailsDetails($emp_user_id);
        $data['genderData']=$this->user->getAllGender();
        //var_dump($data);//exit();
        $this->global['pageTitle'] = 'Demo : User List';
        $this->global['mainheader'] = 'users';
        $this->loadViews('dashboard/user_edit',$this->global, $data , NULL);
    }

    public function update_user(){
      if ($this->input->post('edit_user')) {
            $emp_user_id= html_escape($this->security->xss_clean($this->input->post('emp_user_id')));
            $first_name= html_escape($this->security->xss_clean($this->input->post('first_name')));
            $middle_name= html_escape($this->security->xss_clean($this->input->post('middle_name')));
            $last_name= html_escape($this->security->xss_clean($this->input->post('last_name')));
            $mobile_no= html_escape($this->security->xss_clean($this->input->post('mobile_no')));
            $date_of_birth= html_escape($this->security->xss_clean($this->input->post('date_of_birth')));
            $gender= html_escape($this->security->xss_clean($this->input->post('gender')));
            $email_id= html_escape($this->security->xss_clean($this->input->post('email_id')));
           
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            //$this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile no', 'trim|required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('email_id', 'Email ', 'trim|required|valid_email');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');$this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'trim|required');

            // $this->form_validation->set_message('checkAvailableContact', 'This contact no already associate with another account. ');
            // $this->form_validation->set_message('checkAvailableEmail', 'This email is already associate with another account. ');

            if ($this->form_validation->run($this)) {
                
                $config=array('emp_user_id'=>$emp_user_id,
                  'first_name'=>$first_name,
                  'middle_name'=>$middle_name,
                  'last_name'=>$last_name,
                  'mobile_no'=>$mobile_no,
                  'date_of_birth'=>date("Y-m-d", strtotime($date_of_birth) ),
                  'gender'=>$gender,
                  'email_id'=>$email_id
                );

                //echo "<pre>".print_r($config);exit;

                
                 $result=$this->user->updateUser($config);

                $this->session->set_flashdata('message', 'successfully insert..');
                 redirect('dashboard/user_details');
              }else{
                    $this->session->set_flashdata('error', 'Failed');
            }
        $data['user_details']=$this->user->getUserDetailsDetails($this->input->post('emp_user_id'));
        $data['genderData']=$this->user->getAllGender();
        $this->global['pageTitle'] = 'Demo : User List';
        $this->global['mainheader'] = 'users';
        $this->loadViews('dashboard/user_edit',$this->global, $data , NULL); 
      }
    }

    

}
?>