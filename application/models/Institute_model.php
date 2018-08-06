<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institute_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function get_countries_list(){
		$this->db->select('c_id,country_name')->from('countries_list');
		$this->db->where('status ',1);
		return $this->db->get()->result_array();
	}
	public  function get_cities_list($c_id){
		$this->db->select('city_id,city_name')->from('city_list');
		$this->db->where('c_status ',1);
		$this->db->where('c_id ',$c_id);
		return $this->db->get()->result_array();
	}
	public  function get_locations_list($c_id){
		$this->db->select('l_id,location_name')->from('location_list');
		$this->db->where('l_status ',1);
		return $this->db->get()->result_array();
	}
	
	
	
	

}