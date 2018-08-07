<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publish_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	
	public  function get_course_list($id){
		$this->db->select('course_list.course_id,course_list.c_name')->from('course_list');
		$this->db->where('course_list.status',1);
		$this->db->where('course_list.created_by',$id);
		return $this->db->get()->result_array();
	}
	public  function get_classification_list($id){
		$this->db->select('classification_list.c_id,classification_list.c_name')->from('classification_list');
		$this->db->where('classification_list.status',1);
		$this->db->where('classification_list.created_by',$id);
		return $this->db->get()->result_array();
	}
	public  function get_vendor_list($id){
		$this->db->select('vendor_list.v_id,vendor_list.v_name')->from('vendor_list');
		$this->db->where('vendor_list.status',1);
		$this->db->where('vendor_list.created_by',$id);
		return $this->db->get()->result_array();
	}
	
	public  function update_course_details($course_id,$data){
		$this->db->where('course_id',$course_id);
		return $this->db->update('course_list',$data);
	}
	public  function get_published_course_list($id){
		$this->db->select('course_list.course_id,course_list.c_name,course_list.c_logo,course_type_list.course_type,course_list.status,classification_list.c_name as class_name,vendor_list.v_name,vendor_list.img,course_list.created_at,course_list.published,course_list.published_status,course_list.updated_at')->from('course_list');
		$this->db->join('course_type_list ', 'course_type_list.c_t_l = course_list.c_type', 'left');
		$this->db->join('classification_list ', 'classification_list.c_id = course_list.classification_id', 'left');
		$this->db->join('vendor_list ', 'vendor_list.v_id = course_list.v_id', 'left');
		$this->db->where('course_list.published',1);
		return $this->db->get()->result_array();
	}
	public  function get_full_course_details($c_id){
		$this->db->select('course_id,classification_id,v_id,published,published_status')->from('course_list');
		$this->db->where('course_list.course_id ',$c_id);
		return $this->db->get()->row_array();
	}
	
	
	
	

}