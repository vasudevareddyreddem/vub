<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public  function save_vendor($data){
		$this->db->insert('vendor_list',$data);
		return $this->db->insert_id();
	}
	public  function check_exits_ornot($name){
		$this->db->select('v_id')->from('vendor_list');
		$this->db->where('vendor_list.v_name ',$name);
		$this->db->where('vendor_list.status != ',2);
		return $this->db->get()->row_array();
	}
	public  function get_vendor_list($id){
		$this->db->select('v_name,img,v_id,status,created_at')->from('vendor_list');
		$this->db->where('vendor_list.created_by ',$id);
		$this->db->where('vendor_list.status != ',2);
		$this->db->order_by('v_id','desc');
		return $this->db->get()->result_array();
	}
	public  function get_vendor_details($v_id){
		$this->db->select('*')->from('vendor_list');
		$this->db->where('vendor_list.v_id ',$v_id);
		return $this->db->get()->row_array();
	}
	public  function update_vendor_details($v_id,$data){
			$this->db->where('v_id',$v_id);
		return $this->db->update('vendor_list',$data);
	}
	
	
	
	
	
	

}