<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function save_country($data){
		$this->db->insert('countries_list',$data);
		return $this->db->insert_id();
	}
	public  function check_country_exists($name){
		$this->db->select('c_id')->from('countries_list');
		$this->db->where('country_name',$name);
		$this->db->where('status !=',2);
		return $this->db->get()->row_array();
	}
	public function get_all_countries_list($cust_id){
		$this->db->select('c_id,country_name,country_code,status,create_at')->from('countries_list');
		$this->db->where('created_by',$cust_id);
		$this->db->where('status !=',2);
		$this->db->order_by('c_id','desc');
		$return=$this->db->get()->result_array();
		foreach($return as $list){
			$city_count=$this->get_city_list_count($list['c_id']);
			$data[$list['c_id']]=$list;
			$data[$list['c_id']]['city_count']=$city_count['c_count'];
		}
		if(!empty($data)){
			return $data;
			
		}
	}
	public  function get_city_list_count($c_id){
		$this->db->select('COUNT(city_list.city_id) as c_count')->from('city_list');
		$this->db->where('city_list.c_id',$c_id);
		$this->db->where('city_list.c_status !=',2);
		return $this->db->get()->row_array();
	}
	public  function update_country_details($c_id,$data){
		$this->db->where('c_id',$c_id);
		return $this->db->update('countries_list',$data);
		
	}
	public  function get_country_details($c_id){
		$this->db->select('c_id,country_name,country_code')->from('countries_list');
		$this->db->where('c_id',$c_id);
		return $this->db->get()->row_array();
	}
	
	
	
	

}