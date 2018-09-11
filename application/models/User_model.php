<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	/* home page  purpose*/
	public  function get_userdetails($cust_id){
		$this->db->select('customers_list.cust_id,customers_list.role_id,customers_list.email_id,customers_list.mobile_verified,institute_list.completed')->from('customers_list');
		$this->db->join('institute_list ', 'institute_list.created_by = customers_list.cust_id', 'left');
		$this->db->where('customers_list.cust_id',$cust_id);
		$this->db->where('customers_list.mobile_verified!=',0);
		return $this->db->get()->row_array();
	}
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
		$this->db->select('cust_id,role_id,email_id,source,name,mobile,mobile_verified,otp_dateitm,otp_verification')->from('customers_list');
		$this->db->where('cust_id',$u_id);
		return $this->db->get()->row_array();
	}
	public  function check_user_exists($email,$source){
		$this->db->select('cust_id')->from('customers_list');
		$this->db->where('email_id',$email);
		$this->db->or_where('username',$email);
		$this->db->where('source',$source);
		return $this->db->get()->row_array();
	}
	public function update_user_details($u_id,$data){
		$this->db->where('cust_id',$u_id);
		return $this->db->update('customers_list',$data);
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
		$this->db->select('customers_list.cust_id,customers_list.role_id,customers_list.name,role.role,institute_list.completed')->from('customers_list');
		$this->db->join('role ', 'role.role_id = customers_list.role_id', 'left');
		$this->db->join('institute_list ', 'institute_list.created_by = customers_list.cust_id', 'left');
		$this->db->where('customers_list.cust_id',$cust_id);
		return $this->db->get()->row_array();
	}
	
	/*home  search functionality  purpose*/
	public  function get_course_or_institues_list($val){
		$this->db->select('i_name as label,CONCAT(i_id,"_","institue") AS value')->from('institute_list');
		$this->db->where('institute_list.status',1);
		$result1=$this->db->get()->result_array();
		$this->db->select('c_name as label,CONCAT(course_id,"_","course") as value')->from('course_list');
		$this->db->where('course_list.status',1);
		$result2=$this->db->get()->result_array();
		return array_merge($result1, $result2);
	}
	public  function get_location_search_list(){
		$this->db->select('location_list.l_id,CONCAT(location_list.location_name,", ",city_list.city_name,", ",countries_list.country_name) as address,countries_list.country_code')->from('location_list');
		$this->db->join('city_list ', 'city_list.city_id = location_list.city_id', 'left');
		$this->db->join('countries_list ', 'countries_list.c_id = city_list.c_id', 'left');
		$this->db->where('location_list.l_status ',1);
		$this->db->order_by('location_list.l_id','desc');
		return $this->db->get()->result_array();
	}
	public  function get_location_with_intitue($i_id,$location_id){
		$this->db->select('i_id,i_name')->from('institute_list');
		$this->db->where('institute_list.i_id',$i_id);
		if(isset($location_id) && $location_id!=''){
			$this->db->where('institute_list.location_name',$location_id);	
		}
		return $this->db->get()->row_array();
	}
	public  function get_location_with_course($course_id,$location_id){
		$this->db->select('course_list.course_id,course_list.c_name')->from('course_list');
		$this->db->join('video_list ', 'video_list.course_name = course_list.course_id', 'left');
		$this->db->join('institute_list ', 'institute_list.i_id = video_list.i_id', 'left');
		$this->db->where('course_list.course_id',$course_id);
		if(isset($location_id) && $location_id!=''){
			$this->db->where('institute_list.location_name',$location_id);	
		}
		return $this->db->get()->row_array();
	}
	/*/ lead  purpose*/
	public  function save_leads_data($data){
		$this->db->insert('leads',$data);
		return $this->db->insert_id();
	}
	public  function get_leader_details($L_id){
		$this->db->select('l_id,in_id,contact_num,otp_verification,otp_dateitm')->from('leads');
		$this->db->where('l_id',$L_id);
		return $this->db->get()->row_array();
	}
	public  function update_lead_resend_otp($l_id,$data){
		$this->db->where('l_id',$l_id);
		return $this->db->update('leads',$data);
	}
	
	/* home page content */
	public  function get_aboutus_content($a_id){
		$this->db->select('a_id,aboutus,video_name,org_name')->from('aboutus_content');
		$this->db->where('a_id',$a_id);
		return $this->db->get()->row_array();
	}
	public  function get_testimonial_home_list(){
		$this->db->select('author_name,testimonial,image_name,org_name')->from('testimonial');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	/* home page content */
	

}