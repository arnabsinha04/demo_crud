<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . '/libraries/BaseModel.php';

class User_model extends BaseModel {

    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct(); 
        $this->load->library('datatables');
        $this->load->library('encryption');
    }

    /**
     * View user details list page
     */
    public function getAllUserDetailsDetails(){
        $get_data = "CALL get_all_user()";
        $query = $this->db->query($get_data);
        if ($query->result()) {
            $query->next_result(); 
            //$query->free_result(); 
            return $query->result_array();
        }
        return NULL;
        // $this->db->select("*");
        // $this->db->from("ci_user_details");
        // $this->db->join("ci_user_authentication","ci_user_authentication.user_id=ci_user_details.emp_user_id",'left');
        // $this->db->where('user_role','2');
        // $query = $this->db->get();
        // $data = $query->result_array();
        // return $data;
    }

    function add_user($data)
    {
        $this->db->insert("ci_user_details", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function getUserDetailsDetails($emp_user_id){
        $get_user = "CALL get_user_by_id(?)";
        $data = array('id' => $emp_user_id);
        $query = $this->db->query($get_user, $data);
        if ($query->result()) {
            $query->next_result(); 
            //$query->free_result(); 
            return $query->row();
        }
        return NULL;

        // // $this->db->select("*");
        // // $this->db->where("emp_user_id", $emp_user_id);
        // //$this->db->from("ci_user_details");
        // $query = $this->db->get();
        // $row = $query->row();
        // return $row;
    }

    public function updateUser($dataInfo){
        $this->db->where('emp_user_id', $dataInfo['emp_user_id'])->update('ci_user_details',$dataInfo);
    }

    /**
     * 
     * @param string $contactno
     * @param int $iEmpid the employ id who need to exclude
     * @return type
     */
    function check_usernameExists($contactno) {

        $this->db->select("*");
        $this->db->where("mobile_no", $contactno);
        
        $this->db->from("ci_user_details");
        $query = $this->db->get();
        $row = $query->row();
        return $row;
    }

     /**
     * 
     * @param string $contactno
     * @param int $iEmpid the employ id who need to exclude
     * @return type
     */
    function check_emailExists($email) {

        $this->db->select("*");
        $this->db->where("email_id", $email);
        
        $this->db->from("ci_user_details");
        $query = $this->db->get();
        $row = $query->row();
        return $row;
    }

    public function bar_chart() {
        
   
        $this->db->select("COUNT(emp_user_id) as count,gender");
        $this->db->from('ci_user_details');
        $this->db->group_by('gender');
        $query = $this->db->get();
        $record = $query->result();
        $data = [];
     
          foreach($record as $row) {
                $data['label'][] = $row->gender;
                $data['data'][] = (int) $row->count;
          }
        return $data;
    }

    public function getAllGender(){
        $this->db->select("*");
        $this->db->from("ci_gender");
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

}
?>