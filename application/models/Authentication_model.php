<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Authentication_model extends CI_Model {

   

    public function user_authentication($val) {
        //var_dump($val);exit();
        $this->db->select('*');
        $this->db->where('username', $val['username']);
        $this->db->where('password', 'sha1(concat("' . $val['password'] . '",salt))', FALSE);
        $this->db->where('status','1');
        $result = $this->db->get('ci_user_authentication');
        $result = $result->row_array();
        return $result;
    }

    function add_user_authentication($data)
    {
        $this->db->insert("ci_user_authentication", $data);
        // $insert_id = $this->db->insert_id();
        // return  $insert_id;
    }

    



}
?>