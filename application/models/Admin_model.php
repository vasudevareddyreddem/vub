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
	
	
	

}