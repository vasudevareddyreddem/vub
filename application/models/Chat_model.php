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
		$this->db->select('admin_chat.c_a_id,admin_chat.text,admin_chat.created_at,admin_chat.type,customers_list.profile_pic,customers_list.name as sender_name,admin.name as sent_name,admin.profile_pic as a_logo')->from('admin_chat');
		$this->db->join('customers_list', 'customers_list.cust_id = admin_chat.cust_id', 'left');
		$this->db->join('admin', 'admin.cust_id = admin_chat.admin_id', 'left');
		$this->db->where('admin_chat.cust_id',$cust_id);
		$this->db->where('admin_chat.text!=','');
		return $this->db->get()->result_array();
	}
	
	public  function get_pending_pending_messages_list($cust_id){
		$this->db->select('admin_chat.cust_id,customers_list.name as sender_name')->from('admin_chat');
		$this->db->join('customers_list', 'customers_list.cust_id = admin_chat.cust_id', 'left');

		$this->db->group_by('admin_chat.cust_id');
		$this->db->where('admin_chat.text!=','');
		$this->db->where('admin_chat.read_msg',0);
		$this->db->order_by('admin_chat.c_a_id');
		$this->db->limit(3);
		$return=$this->db->get()->result_array();
		foreach($return as $list){
			$msgs=$this->get_customer_pending_msgs_list($list['cust_id']);
			$data[$list['cust_id']]=$list;
			$data[$list['cust_id']]['messages']=$msgs;
		}
		if(!empty($data)){
			return $data;
		}
	}
	
	public function get_customer_pending_msgs_list($cust_id){
		$this->db->select('admin_chat.c_a_id,admin_chat.text,admin_chat.created_at,admin_chat.type,customers_list.profile_pic,customers_list.name as sender_name,admin.name as sent_name,admin.profile_pic as a_logo')->from('admin_chat');
		$this->db->join('customers_list', 'customers_list.cust_id = admin_chat.cust_id', 'left');
		$this->db->join('admin', 'admin.cust_id = admin_chat.admin_id', 'left');
		$this->db->where('admin_chat.cust_id',$cust_id);
		$this->db->where('admin_chat.text!=','');
		return $this->db->get()->result_array();
	}
	
	public  function save_admin_sent_messages($data){
		$this->db->insert('admin_chat',$data);
		return $this->db->insert_id();
	}
	public  function update_unread_admin_messages($cust_id,$data){
		$this->db->where('cust_id',$cust_id);
		return $this->db->update('admin_chat',$data);
	}
	public  function admin_get_indivusal_messages_list($cust_id){
		$this->db->select('admin_chat.c_a_id,admin_chat.text,admin_chat.created_at,admin_chat.type,customers_list.profile_pic,customers_list.name as sender_name,admin.name as sent_name,admin.profile_pic as a_logo')->from('admin_chat');
		$this->db->join('customers_list', 'customers_list.cust_id = admin_chat.cust_id', 'left');
		$this->db->join('admin', 'admin.cust_id = admin_chat.admin_id', 'left');
		$this->db->where('admin_chat.cust_id',$cust_id);
		$this->db->where('admin_chat.text!=','');
		return $this->db->get()->result_array();
	}
	
	/* institue  id  purpose*/
	public  function get_institue_id($cust_id){
		$this->db->select('institute_list.created_by as institue_id')->from('customers_list');
		$this->db->join('institute_list', 'institute_list.created_by = customers_list.cust_id', 'left');
		$this->db->where('customers_list.cust_id',$cust_id);
		return $this->db->get()->row_array();
	}
	public  function get_institue_pending_chat_list($institue_id){
		$this->db->select('institue_chat.cust_id,institue_chat.institue_id,customers_list.name')->from('institue_chat');
		$this->db->join('customers_list', 'customers_list.cust_id = institue_chat.cust_id', 'left');
		$this->db->where('institue_chat.institue_id',$institue_id);
		$this->db->limit(3);
		$this->db->where('institue_chat.read_msg',0);
		$this->db->group_by('institue_chat.cust_id');
		$return=$this->db->get()->result_array();
		foreach($return as $lis){
			$pending_list=$this->get_pending_chating_details($lis['cust_id'],$lis['institue_id']);
			$data[$lis['cust_id']]=$lis;
			$data[$lis['cust_id']]['messages']=isset($pending_list)?$pending_list:'';
		}
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_pending_chating_details($cust_id,$institue_id){
		$this->db->select('institue_chat.c_i_id,institue_chat.text,institue_chat.created_at,institue_chat.type,customers_list.name as sender_name,institute_list.i_name as sent_name,institute_list.i_logo as a_logo,customers_list.profile_pic')->from('institue_chat');
		$this->db->join('customers_list', 'customers_list.cust_id = institue_chat.cust_id', 'left');
		$this->db->join('institute_list', 'institute_list.i_id = institue_chat.institue_id', 'left');
		$this->db->where('institue_chat.cust_id',$cust_id);
		$this->db->where('institue_chat.institue_id',$institue_id);
		$this->db->where('institue_chat.text!=','');
		return $this->db->get()->result_array();
	}
	
	/* institue  replay  messages purpose*/
	public  function update_unread_institue_messages($cust_id,$institue_id,$data){
		$this->db->where('cust_id',$cust_id);
		$this->db->where('institue_id',$institue_id);
		return $this->db->update('institue_chat',$data);
	}
	public  function institue_get_indivusal_messages_list($cust_id,$institue_id){
		$this->db->select('customers_list.cust_id,customers_list.name,institue_chat.c_i_id,institue_chat.text,institue_chat.created_at,institue_chat.type,customers_list.name as sender_name,institute_list.i_name as sent_name,institute_list.i_logo as a_logo,customers_list.profile_pic')->from('institue_chat');
		$this->db->join('customers_list', 'customers_list.cust_id = institue_chat.cust_id', 'left');
		$this->db->join('institute_list', 'institute_list.i_id = institue_chat.institue_id', 'left');
		$this->db->where('institue_chat.cust_id',$cust_id);
		$this->db->where('institue_chat.institue_id',$institue_id);
		$this->db->where('institue_chat.text!=','');
		return $this->db->get()->result_array();
	}
	/* institue  replay  messages purpose*/
	

}