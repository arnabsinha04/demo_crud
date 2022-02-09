<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class BaseModel extends CI_Model{
    /*
    *   Usage
    *   get_data(
    *       'Table Name' // For Single Table
    *       array('Table_Name1',
    *           array('Table_Name2','Table_Name1.PrimaryID = Table_Name2.ForeignID','inner')
    *       ), //For Joining Table
    *       array('column1','column2'),
    *       array('field'=>value,field=>value),
    *       array('column'=>'column1',value=>array(value,value)),
    *       'row_array',
    *       array('from_date'=>'date_value','to_date'=>'date_value','date_range_column'=>'column_name'),
    *       array(
    *           array('column'=>'column_name','mode'=>'ASC'),
    *           array('column'=>'column_name','mode'=>'ASC')
    *       ),
    *       array('column1','column2'),
    *       array(
    *           array('column'=>'column1','value'=>'value'),
    *           array('column'=>'column2','value'=>'value')
    *       )
    *   );
    */
    public function get_data($table,$column="",$condition="",$where_in="",$mode="",$date_range="",$order_by="",$group_by="",$having="",$limit="",$offset=""){
        $data="";
        if(!is_array($column)){
            $column="*";
        }
        $this->db->select($column);
        if(!is_array($table)){
            $this->db->from($table);
        }
        else{
            foreach ($table as $key => $table_item) {
                if($key==0){
                    $this->db->from($table_item);
                }
                else{
					if(!empty($table_item[2])){
						$this->db->join($table_item[0],$table_item[1],$table_item[2]);
					}
					else{
						$this->db->join($table_item[0],$table_item[1]);
					}
                }
            }
        }
        if(is_array($condition)){
            $this->db->where($condition);
        }
        if(is_array($where_in)){
            $this->db->where_in($where_in['column'],$where_in['value']);
        }
		if(is_array($date_range)){
			if(!empty($date_range['from_date']) && !empty($date_range['to_date']) && !empty($date_range['date_range_coloumn'])){
				$from_date=$date_range['from_date'];
				$to_date=$date_range['to_date'];
				$date_range_coloumn=$date_range['date_range_coloumn'];
				$this->db->where("$date_range_coloumn BETWEEN to_timestamp('" . date('Y-m-d H:i:s',strtotime($from_date)) . "', 'yyyy-mm-dd  HH24:MI:SS') AND to_timestamp('" . date('Y-m-d H:i:s',strtotime($to_date)) . "', 'yyyy-mm-dd  HH24:MI:SS')");
			}
		}
        if(is_array($group_by)){
            $this->db->group_by($group_by);
        }
        if(is_array($having)){
            foreach ($having as $key => $value) {
                $this->db->having($value['column'],$value['value'],FALSE);   
            }
        }
        if(is_array($order_by)){
            foreach ($order_by as $key => $value) {
                if(!empty($value['column']) && !empty($value['mode'])){
                    $this->db->order_by($value['column'], $value['mode']);
                }
            }
        }
        if( $limit !="") {
            $this->db->limit($limit);
        }
        if($offset !="") {
            $this->db->offset($offset);
        }
//         $query=$this->db->get(); echo $this->db->last_query(); exit;
        switch($mode){
            case "result_array":
				$query=$this->db->get();
                $data=$query->result_array();
                break;
            case "row_array":
				$query=$this->db->get();
                $data=$query->row_array();
                break;
            case "row":
				$query=$this->db->get();
                $data=$query->row();
                break;
			case "num_rows":
                $data=$this->db->count_all_results();
                break;
            default:
				$query=$this->db->get();
                $data=$query->result();
            
        }
		return $data;
    }

    private function get_order_list_query($column,$table,$condition,$search_value,$column_search,$from_date,$to_date,$date_range_coloumn,$where_in=""){
        $this->db->select($column);
        if(is_array($table)){
            foreach ($table as $key => $table_item) {
                if($key==0){
                    $this->db->from($table_item);
                }
                else{
                    $this->db->join($table_item[0],$table_item[1],$table_item[2]);
                }
            }
        }
        else{
            $this->db->from($table);    
        }
        if(!empty($condition) && is_array($condition)){
            $this->db->where($condition);
        }
		if(!empty($where_in) && is_array($where_in)){
            $this->db->where_in($where_in['column'],$where_in['value']);
        }
        if(!empty($from_date) && !empty($to_date) && !empty($date_range_coloumn)){
            $this->db->where("$date_range_coloumn BETWEEN to_timestamp('" . date('Y-m-d H:i:s',strtotime($from_date)) . "', 'yyyy-mm-dd  HH24:MI:SS') AND to_timestamp('" . date('Y-m-d H:i:s',strtotime($to_date)) . "', 'yyyy-mm-dd  HH24:MI:SS')");
        }
        if (!empty($search_value)) {
            $this->db->group_start();
            foreach ($column_search as $key => $item) {
                $this->db->or_like('upper('.$item.')',strtoupper($search_value));
            }
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query;
    }
    
    public function count_all($table, $condition,$where_in=""){
        $this->db->select("*");
        if(is_array($table)){
            foreach ($table as $key => $table_item) {
                if($key==0){
                    $this->db->from($table_item);
                }
                else{
                    $this->db->join($table_item[0],$table_item[1],$table_item[2]);
                }
            }
        }
        else{
            $this->db->from($table);    
        }
		if(isset($condition['IS_DELETE'])) {
			$this->db->where('IS_DELETE',$condition['IS_DELETE']);
		}
		if(!empty($where_in) && is_array($where_in)){
            $this->db->where_in($where_in['column'],$where_in['value']);
        }
        return $this->db->count_all_results();
    }
    
    public function count_filtered($column,$table,$condition,$search_value,$column_search,$from_date,$to_date,$date_range_coloumn,$where_in=""){
        $query=$this->get_order_list_query($column,$table,$condition,$search_value,$column_search,$from_date,$to_date,$date_range_coloumn,$where_in);
        return $query->num_rows();
    }
    public function get_filtered_data($column,$table,$condition,$search_value,$column_search,$from_date,$to_date,$date_range_coloumn,$order="",$length,$start,$where_in=""){
        $query=$this->get_order_list($column,$table,$condition,$search_value,$column_search,$from_date,$to_date,$date_range_coloumn,$order,$length,$start,$where_in);
        return $query->result();
    }
    private function get_order_list($column,$table,$condition,$search_value,$column_search,$from_date,$to_date,$date_range_coloumn,$order="",$length,$start,$where_in=""){
        $this->db->select($column);
        if(is_array($table)){
            foreach ($table as $key => $table_item) {
                if($key==0){
                    $this->db->from($table_item);
                }
                else{
                    $this->db->join($table_item[0],$table_item[1],$table_item[2]);
                }
            }
        }
        else{
            $this->db->from($table);    
        }
        if(!empty($condition) && is_array($condition)){
            $this->db->where($condition);
        }
        if(!empty($where_in) && is_array($where_in)){
            $this->db->where_in($where_in['column'],$where_in['value']);
        }
        if(!empty($from_date) && !empty($to_date) && !empty($date_range_coloumn)){
            $this->db->where("$date_range_coloumn BETWEEN to_timestamp('" . date('Y-m-d H:i:s',strtotime($from_date)) . "', 'yyyy-mm-dd  HH24:MI:SS') AND to_timestamp('" . date('Y-m-d H:i:s',strtotime($to_date)) . "', 'yyyy-mm-dd  HH24:MI:SS')");
        }
        
        if (!empty($search_value)) {
            $this->db->group_start();
            foreach ($column_search as $key => $item) {
                $this->db->or_like('upper('.$item.')',strtoupper($search_value));
            }
            $this->db->group_end();
        }
        if(is_array($order)){
            foreach($order as $key=>$value){
                $this->db->order_by($value);
            }   
        }
        if ($length != -1) {
            $this->db->limit($length,$start);
        }
        $query = $this->db->get();
        return $query;
    }
	public function delete_data($table,$is_delete_coloumn,$id_column,$id_value,$deleted_by){
		$this->db->set($is_delete_coloumn,1);
        $this->db->set('updated_by',$deleted_by);
        $this->db->set('updated_on', date('Y-m-d H:i:s'));
		$this->db->where($id_column,$id_value);
		$this->db->update($table);
		return $this->db->affected_rows();
	}
    public function delete_data_complete($table,$id_column,$id_value){
        $this->db->where($id_column,$id_value);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }
    public function insert_log_data($msg,$user_id){
        $data = array(
            'msg' => $msg,
            'user_id' => $user_id,
            'created_by' => $user_id
        );
        $this->db->insert('logs',$data);
    }
}

?>
