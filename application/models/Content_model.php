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
		$this->db->select('c_id,footer')->from('footer_content');
		$this->db->where('c_id',$id);
		return $this->db->get()->row_array();
		
	}
	
	
	
	

}