<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public  function save_course_type($data){
		$this->db->insert('course_type_list',$data);
		return $this->db->insert_id();
	}
	public  function check_exits_ornot($name){
		$this->db->select('course_type,c_t_l,status,created_at')->from('course_type_list');
		$this->db->where('course_type_list.course_type ',$name);
		$this->db->where('course_type_list.status != ',2);
		return $this->db->get()->row_array();
	}
	public  function get_course_details($c_id){
		$this->db->select('course_type,c_t_l,status,created_at')->from('course_type_list');
		$this->db->where('course_type_list.c_t_l ',$c_id);
		return $this->db->get()->row_array();
	}
	public  function get_course_type_list($id){
		$this->db->select('course_type,c_t_l,status,created_at')->from('course_type_list');
		$this->db->where('course_type_list.created_by ',$id);
		$this->db->where('course_type_list.status != ',2);
		$this->db->order_by('c_t_l','desc');
		return $this->db->get()->result_array();
	}
	public  function update_course_type_details($c_id,$data){
		$this->db->where('c_t_l',$c_id);
		return $this->db->update('course_type_list',$data);
	}
	public  function get_course_type_Name_list(){
		$this->db->select('course_type,c_t_l,status,created_at')->from('course_type_list');
		$this->db->where('course_type_list.status',1);
		return $this->db->get()->result_array();	
	}
	
	/*course*/
	public  function get_institue_details($a_id){
		$this->db->select('i_id,i_name')->from('institute_list');
		$this->db->where('created_by ',$a_id);
		return $this->db->get()->row_array();
	}
	public  function save_course($data){
		$this->db->insert('course_list',$data);
		return $this->db->insert_id();	
	}
		public  function check_course_exits_ornot($name,$id){
		$this->db->select('course_id')->from('course_list');
		$this->db->where('course_list.c_name ',$name);
		$this->db->where('course_list.c_type ',$id);
		$this->db->where('course_list.status != ',2);
		return $this->db->get()->row_array();
	}
	public  function get_course_list($id){
		$this->db->select('course_list.course_id,course_list.c_name,course_list.c_logo,course_type_list.course_type,course_list.status,classification_list.c_name as class_name,vendor_list.v_name,vendor_list.img,course_list.created_at')->from('course_list');
		$this->db->join('course_type_list ', 'course_type_list.c_t_l = course_list.c_type', 'left');
		$this->db->join('classification_list ', 'classification_list.c_id = course_list.classification_id', 'left');
		$this->db->join('vendor_list ', 'vendor_list.v_id = course_list.v_id', 'left');
		$this->db->where('course_list.status !=',2);
		$this->db->where('course_list.created_by',$id);
		return $this->db->get()->result_array();
	}
	public  function update_course_details($course_id,$data){
		$this->db->where('course_id',$course_id);
		return $this->db->update('course_list',$data);
	}
	public  function get_full_course_details($c_id){
		$this->db->select('*')->from('course_list');
		$this->db->where('course_list.course_id ',$c_id);
		return $this->db->get()->row_array();
	}
	
	
	/* front  end purpose*/
	
	public  function get_classification_wise_course(){
		$this->db->select('classification_list.c_name,classification_list.c_id')->from('course_list');
		$this->db->join('classification_list ', 'classification_list.c_id = course_list.classification_id', 'left');
		$this->db->group_by('classification_list.c_id',1);
		$this->db->where('course_list.published_status',1);
		$this->db->where('course_list.published',1);
		$return=$this->db->get()->result_array();
		foreach($return as $lis){
			$course_list='';
			$course_list=$this->classification_wise_course_list($lis['c_id']);
			if(isset($course_list) && count($course_list)>0){
				$data[$lis['c_id']]=$lis;
				$data[$lis['c_id']]['course_list']=isset($course_list)?$course_list:'';
			}
		}
		if(!empty($data)){
			return $data;
		}
	}
	public  function classification_wise_course_list($c_id){
		$this->db->select('course_list.course_id,course_list.c_name')->from('course_list');
		$this->db->where('course_list.classification_id',$c_id);
		$this->db->group_by('course_list.classification_id');
		$this->db->where('course_list.status',1);
		$return=$this->db->get()->result_array();
		foreach($return as $li){
			 $videos_count=$this->course_wise_video_count($li['course_id']);
			 if(($videos_count['video_count'] )> 0){
				$courses[$li['course_id']]=$li;
				 $courses[$li['course_id']]['video_count']=isset($videos_count['video_count'])?$videos_count['video_count']:'';
			 }
		}
		if(!empty($courses)){
			return $courses;
		}
	}
	public  function course_wise_video_count($course_id){
		$this->db->select('COUNT(video_list.video_id) as video_count')->from('video_list');
		$this->db->where('status ',1);
		$this->db->where('course_name',$course_id);
		$this->db->where('public',1);
		$this->db->order_by('video_count');
		return $this->db->get()->row_array();
	}
	public  function course_wise_video_list($course_id){
		$this->db->select('course_list.course_id,video_list.video_id,video_list.i_id,video_list.v_title,video_list.video_file,video_list.org_video_file,video_list.t_name,video_list.course_content,course_list.c_name as coursename,video_list.training_mode,institute_list.i_name,institute_list.i_logo,institute_list.i_p_phone,institute_list.i_email_id,institute_list.i_founder,institute_list.i_s_phone,institute_list.i_address,institute_list.i_contact_person,CONCAT(location_list.location_name," ",city_list.city_name," ",countries_list.country_name) as address,countries_list.country_code')->from('video_list');
		$this->db->join('course_list', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->join('institute_list', 'institute_list.i_id = video_list.i_id', 'left');
		$this->db->join('location_list ', 'location_list.l_id = institute_list.location_name', 'left');
		$this->db->join('city_list ', 'city_list.city_id = institute_list.i_city', 'left');
		$this->db->join('countries_list ', 'countries_list.c_id = institute_list.country_name', 'left');
		$this->db->where('video_list.course_name',$course_id);
		$this->db->order_by('video_list.video_id','asc');
		$this->db->where('video_list.status',1);
		$this->db->where('video_list.public',1);
		$return=$this->db->get()->result_array();
		
		foreach($return as $list){
			$videos_count['video_count']='';
			$videos_count=$this->course_wise_video_count($list['course_id']);
			$data[$list['video_id']]=$list;
			$data[$list['video_id']]['video_count']=isset($videos_count['video_count'])?$videos_count['video_count']:'';
		}
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_video_details($video_id){
		$this->db->select('course_list.course_id,video_list.video_id,video_list.i_id,video_list.v_title,video_list.video_file,video_list.org_video_file,video_list.t_name,video_list.course_content,course_list.c_name as coursename,video_list.training_mode,institute_list.i_name,institute_list.i_logo,institute_list.i_p_phone,institute_list.i_email_id,institute_list.i_founder,institute_list.i_s_phone,institute_list.i_address,institute_list.i_contact_person,CONCAT(location_list.location_name," ",city_list.city_name," ",countries_list.country_name) as address,countries_list.country_code')->from('video_list');
		$this->db->join('course_list', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->join('institute_list', 'institute_list.i_id = video_list.i_id', 'left');
		$this->db->join('location_list ', 'location_list.l_id = institute_list.location_name', 'left');
		$this->db->join('city_list ', 'city_list.city_id = institute_list.i_city', 'left');
		$this->db->join('countries_list ', 'countries_list.c_id = institute_list.country_name', 'left');
		$this->db->where('video_list.video_id',$video_id);
		return $this->db->get()->row_array();
	}
	public  function get_course_name_details($course_id){
		$this->db->select('course_list.c_name,course_list.course_id')->from('course_list');
		$this->db->where('course_id',$course_id);
		return $this->db->get()->row_array();
	}
	public  function institue_wise_course_list($i_id){
		$this->db->select('video_list.i_id,institute_list.i_name,video_list.course_name,course_list.c_name')->from('video_list');
		$this->db->join('course_list', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->join('institute_list', 'institute_list.i_id = video_list.i_id', 'left');
		$this->db->where('video_list.i_id',$i_id);
		$this->db->group_by('video_list.course_name');
		$return=$this->db->get()->result_array();
		foreach($return as $list){
			$videos_count['video_count']='';
			$videos_count=$this->institue_course_wise_video_count($list['course_name'],$i_id);
			$data[$list['course_name']]=$list;
			$data[$list['course_name']]['video_count']=isset($videos_count['video_count'])?$videos_count['video_count']:'';
		}
		if(!empty($data)){
			return $data;
		}		
	}
	public  function institue_course_wise_video_count($course_id,$i_id){
		$this->db->select('COUNT(video_list.video_id) as video_count')->from('video_list');
		$this->db->where('status ',1);
		$this->db->where('course_name',$course_id);
		$this->db->where('i_id',$i_id);
		$this->db->where('public ',1);
		$this->db->order_by('video_count');
		return $this->db->get()->row_array();
	}
	
	
	

}