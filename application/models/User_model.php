<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	/* home page  purpose*/
	
	public  function get_home_page_video(){
		$this->db->select('title,video_name,org_video_name')->from('homepage_header_videos');
		$this->db->where('status',1);
		$this->db->order_by('h_v_id','desc');
		$this->db->limit(1);
		return $this->db->get()->row_array();
		
	}
	public  function save_new_user($data){
		$this->db->insert('customers_list',$data);
		return $this->db->insert_id();
		
	}
	public  function get_user_details($u_id){
		$this->db->select('cust_id,role_id,email_id,mobile_verified')->from('customers_list');
		$this->db->where('cust_id',$u_id);
		return $this->db->get()->row_array();
	}
	public  function get_user_basic_details($u_id){
		$this->db->select('cust_id,role_id,email_id,source,name,mobile_verified')->from('customers_list');
		$this->db->where('cust_id',$u_id);
		return $this->db->get()->row_array();
	}
	public  function check_user_exists($email,$source){
		$this->db->select('cust_id')->from('customers_list');
		$this->db->where('email_id',$email);
		$this->db->where('source',$source);
		return $this->db->get()->row_array();
	}
	
	/* home page  purpose*/
	
	public  function check_login_details($username,$pwd){
		$this->db->select('customers_list.cust_id')->from('customers_list');
		$this->db->where('email_id',$username);
		$this->db->or_where('username',$username);
		$this->db->where('password',$pwd);
		return $this->db->get()->row_array();
	}
	public function get_login_customer_details($cus_id){
		$this->db->select('cust_id,role_id,username,email_id')->from('customers_list');
		$this->db->where('cust_id',$cus_id);
		return $this->db->get()->row_array();
		
	}
	public  function get_admin_details($cust_id){
		$this->db->select('customers_list.*,role.role')->from('customers_list');
		$this->db->join('role ', 'role.role_id = customers_list.role_id', 'left');
		$this->db->where('customers_list.cust_id',$cust_id);
		return $this->db->get()->row_array();
	}
	
	
	

}