<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function check_login_details($username,$pwd){
		$this->db->select('admin.cust_id')->from('admin');
		$this->db->where('email_id',$username);
		$this->db->or_where('username',$username);
		$this->db->where('password',$pwd);
		return $this->db->get()->row_array();
	}
	public function get_login_customer_details($cus_id){
		$this->db->select('cust_id,role_id,username,email_id')->from('admin');
		$this->db->where('cust_id',$cus_id);
		return $this->db->get()->row_array();
		
	}
	public  function get_admin_details($cust_id){
		$this->db->select('admin.*,role.role')->from('admin');
		$this->db->join('role ', 'role.role_id = admin.role_id', 'left');
		$this->db->where('admin.cust_id',$cust_id);
		return $this->db->get()->row_array();
	}
	public  function get_total_institue_list_count(){
		$this->db->select('COUNT(institute_list.i_id) as count')->from('institute_list');
		$this->db->where('institute_list.status',1);
		return $this->db->get()->row_array();
	}
	public  function get_total_video_list_count(){
		$this->db->select('COUNT(video_list.video_id) as count')->from('video_list');
		$this->db->where('video_list.status',1);
		$this->db->where('video_list.public',1);
		return $this->db->get()->row_array();
	}
	public  function get_total_user_list_count(){
		$this->db->select('COUNT(customers_list.cust_id) as count')->from('customers_list');
		$this->db->join('institute_list ', 'institute_list.created_by = customers_list.cust_id', 'left');
		$this->db->where('institute_list.created_by !=','customers_list.cust_id');
		$this->db->where('customers_list.status',1);
		return $this->db->get()->row_array();
	}
	public  function get_total_course_list_count(){
		$this->db->select('COUNT(course_list.course_id) as count')->from('course_list');
		$this->db->where('course_list.status',1);
		return $this->db->get()->row_array();
	}
	public  function get_total_vendor_list_count(){
		$this->db->select('COUNT(vendor_list.v_id) as count')->from('vendor_list');
		$this->db->where('vendor_list.status',1);
		return $this->db->get()->row_array();
	}
	public  function get_total_classification_list_count(){
		$this->db->select('COUNT(classification_list.c_id) as count')->from('classification_list');
		$this->db->where('classification_list.status',1);
		return $this->db->get()->row_array();
	}
	
	
	

}