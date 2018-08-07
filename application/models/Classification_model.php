<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classification_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public  function save_classification($data){
		$this->db->insert('classification_list',$data);
		return $this->db->insert_id();
	}
	public  function check_exits_ornot($name){
		$this->db->select('c_id')->from('classification_list');
		$this->db->where('classification_list.c_name ',$name);
		$this->db->where('classification_list.status != ',2);
		return $this->db->get()->row_array();
	}
	public  function get_classification_list($id){
		$this->db->select('c_name,c_id,status,created_at')->from('classification_list');
		$this->db->where('classification_list.created_by ',$id);
		$this->db->where('classification_list.status != ',2);
		$this->db->order_by('c_id','desc');
		return $this->db->get()->result_array();
	}
	public  function get_classification_details($c_id){
		$this->db->select('*')->from('classification_list');
		$this->db->where('classification_list.c_id ',$c_id);
		return $this->db->get()->row_array();
	}
	public  function update_classification_details($c_id,$data){
			$this->db->where('c_id',$c_id);
		return $this->db->update('classification_list',$data);
	}
	
	
	
	
	
	

}