<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	/* home page  purpose*/
	public  function save_message($data){
		$this->db->insert('institue_chat',$data);
		return $this->db->insert_id();
	}
	public  function get_customer_wise_sent_messages_list($cust_id,$i_id){
		$this->db->select('institue_chat.c_i_id,institue_chat.text,institue_chat.created_at,institue_chat.type,customers_list.name as sender_name,institute_list.i_name as sent_name,institute_list.i_logo,customers_list.profile_pic')->from('institue_chat');
		$this->db->join('customers_list', 'customers_list.cust_id = institue_chat.cust_id', 'left');
		$this->db->join('institute_list', 'institute_list.i_id = institue_chat.institue_id', 'left');
		if(isset($i_id) && $i_id!=''){
		$this->db->where('institue_chat.institue_id',$i_id);	
		}
		$this->db->where('institue_chat.cust_id',$cust_id);
		$this->db->where('institue_chat.text!=','');
		return $this->db->get()->result_array();
	}
	public  function save_admin_message($data){
		$this->db->insert('admin_chat',$data);
		return $this->db->insert_id();
	}
	public  function get_customer_wise_sent_admin_messages_list($cust_id){
		$this->db->select('admin_chat.c_a_id,admin_chat.text,admin_chat.created_at,admin_chat.type,customers_list.profile_pic,customers_list.name as sender_name,admin.name as sent_name')->from('admin_chat');
		$this->db->join('customers_list', 'customers_list.cust_id = admin_chat.cust_id', 'left');
		$this->db->join('admin', 'admin.cust_id = admin_chat.admin_id', 'left');
		$this->db->where('admin_chat.cust_id',$cust_id);
		$this->db->where('admin_chat.text!=','');
		return $this->db->get()->result_array();
	}
	

}