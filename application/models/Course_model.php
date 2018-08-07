<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public  function save_course_type($data){
		$this->db->insert('course_type_list',$data);
		return $this->db->insert_id();
	}
	public  function check_exits_ornot($name){
		$this->db->select('course_type,c_t_l,status,created_at')->from('course_type_list');
		$this->db->where('course_type_list.course_type ',$name);
		$this->db->where('course_type_list.status != ',2);
		return $this->db->get()->row_array();
	}
	public  function get_course_details($c_id){
		$this->db->select('course_type,c_t_l,status,created_at')->from('course_type_list');
		$this->db->where('course_type_list.c_t_l ',$c_id);
		return $this->db->get()->row_array();
	}
	public  function get_course_type_list($id){
		$this->db->select('course_type,c_t_l,status,created_at')->from('course_type_list');
		$this->db->where('course_type_list.created_by ',$id);
		$this->db->where('course_type_list.status != ',2);
		$this->db->order_by('c_t_l','desc');
		return $this->db->get()->result_array();
	}
	public  function update_course_type_details($c_id,$data){
		$this->db->where('c_t_l',$c_id);
		return $this->db->update('course_type_list',$data);
	}
	public  function get_course_type_Name_list(){
		$this->db->select('course_type,c_t_l,status,created_at')->from('course_type_list');
		$this->db->where('course_type_list.status',1);
		return $this->db->get()->result_array();	
	}
	
	/*course*/
	public  function save_course($data){
		$this->db->insert('course_list',$data);
		return $this->db->insert_id();	
	}
		public  function check_course_exits_ornot($name,$id){
		$this->db->select('course_id')->from('course_list');
		$this->db->where('course_list.c_name ',$name);
		$this->db->where('course_list.c_type ',$id);
		$this->db->where('course_list.status != ',2);
		return $this->db->get()->row_array();
	}
	public  function get_course_list($id){
		$this->db->select('course_list.course_id,course_list.c_name,course_list.c_logo,course_type_list.course_type,course_list.status,classification_list.c_name as class_name,vendor_list.v_name,vendor_list.img,course_list.created_at')->from('course_list');
		$this->db->join('course_type_list ', 'course_type_list.c_t_l = course_list.c_type', 'left');
		$this->db->join('classification_list ', 'classification_list.c_id = course_list.classification_id', 'left');
		$this->db->join('vendor_list ', 'vendor_list.v_id = course_list.v_id', 'left');
		$this->db->where('course_list.status !=',2);
		return $this->db->get()->result_array();
	}
	public  function update_course_details($course_id,$data){
		$this->db->where('course_id',$course_id);
		return $this->db->update('course_list',$data);
	}
	public  function get_full_course_details($c_id){
		$this->db->select('*')->from('course_list');
		$this->db->where('course_list.course_id ',$c_id);
		return $this->db->get()->row_array();
	}
	
	
	
	

}