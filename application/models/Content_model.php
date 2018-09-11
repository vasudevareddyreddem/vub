<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public  function update_footer_content($id,$data){
		$this->db->where('c_id',$id);
		return $this->db->update('footer_content',$data);
	}
	public  function get_footer_content($id){
		$this->db->select('c_id,footer,mobile1,mobile2,email_id')->from('footer_content');
		$this->db->where('c_id',$id);
		return $this->db->get()->row_array();
	}
	public  function update_aboutus_content($a_id,$data){
		$this->db->where('a_id',$a_id);
		return $this->db->update('aboutus_content',$data);
	}
	public  function get_aboutus_content($a_id){
		$this->db->select('a_id,aboutus,video_name,org_name')->from('aboutus_content');
		$this->db->where('a_id',$a_id);
		return $this->db->get()->row_array();
	}
	public  function insert_testimonial($data){
		 $this->db->insert('testimonial',$data);
		 return $this->db->insert_id();
	}
	public  function get_testimonial_list(){
		$this->db->select('*')->from('testimonial');
		$this->db->where('status !=',2);
		return $this->db->get()->result_array();
	}
	public  function update_testimonial_details($t_id,$data){
		$this->db->where('t_id',$t_id);
		return $this->db->update('testimonial',$data);
	}
	public  function get_testimonial_details($t_id){
		$this->db->select('*')->from('testimonial');
		$this->db->where('t_id',$t_id);
		return $this->db->get()->row_array();
	}
	
	
	
	
	

}