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
	public  function get_customer_wise_sent_messages_list($cust_id){
		$this->db->select('institue_chat.text,institue_chat.created_at,institue_chat.type,customers_list.name as sender_name,institute_list.i_name as sent_name')->from('institue_chat');
		$this->db->join('customers_list', 'customers_list.cust_id = institue_chat.cust_id', 'left');
		$this->db->join('institute_list', 'institute_list.i_id = institue_chat.institue_id', 'left');
		$this->db->where('institue_chat.cust_id',$cust_id);
		$this->db->where('institue_chat.text!=','');
		return $this->db->get()->result_array();
	}
	

}