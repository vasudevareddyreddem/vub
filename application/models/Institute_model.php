<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institute_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	/* front_end  purpose*/
	public  function get_institue_details($i_id){
		$this->db->select('*')->from('institute_list');
		$this->db->where('i_id',$i_id);
		return $this->db->get()->row_array();
	}
	public  function get_lastest_institute_list(){
		$this->db->select('institute_list.i_id,institute_list.i_name,institute_list.i_logo,institute_list.i_address,institute_list.i_p_phone,institute_list.i_email_id,countries_list.country_name,countries_list.country_code,countries_list.num_code,city_list.city_name,location_list.location_name')->from('institute_list');
		$this->db->join('countries_list', 'countries_list.c_id = institute_list.country_name', 'left');
		$this->db->join('city_list', 'city_list.city_id = institute_list.i_city', 'left');
		$this->db->join('location_list', 'location_list.l_id = institute_list.location_name', 'left');
		
		$this->db->where('institute_list.status',1);
		$this->db->order_by('institute_list.i_id','desc');
		$this->db->limit(20);
		$return=$this->db->get()->result_array();
			foreach($return as $list){
			$videos_count=$this->get_institue_video_count_list($list['i_id']);
			if($videos_count['video_count']>0){
					$data[$list['i_id']]=$list;
					$data[$list['i_id']]['video_list']=isset($videos_count['video_count'])?$videos_count['video_count']:'';
				}
			}
			if(!empty($data)){
				return $data;
				
			}

	}

	public  function get_institues_list_for_front_end(){
		$this->db->select('institute_list.i_id,institute_list.i_name,institute_list.i_logo,institute_list.i_address,institute_list.i_p_phone,institute_list.i_email_id,institute_list.i_founder,institute_list.i_s_phone,countries_list.country_name,countries_list.num_code,countries_list.country_code,city_list.city_name,location_list.location_name')->from('institute_list');
		$this->db->join('countries_list', 'countries_list.c_id = institute_list.country_name', 'left');
		$this->db->join('city_list', 'city_list.city_id = institute_list.i_city', 'left');
		$this->db->join('location_list', 'location_list.l_id = institute_list.location_name', 'left');
		$this->db->where('institute_list.status',1);
		//$this->db->order_by('institute_list.i_id','asc');
		$return=$this->db->get()->result_array();
			foreach($return as $list){
			$course=$this->get_institue_course_list($list['i_id']);
			$videos_count=$this->get_institue_video_count_list($list['i_id']);
			$course_list=array();
			if(count($course)>0){
				foreach($course as $lis){
					$course_list[]=ucwords($lis['c_name']);
					
				}
				$imp = implode(', ',$course_list );
			}else{
				$imp='';
			}
			//echo '<pre>';print_r($videos_count);exit;
				if($videos_count['video_count']>0){
					$data[$list['i_id']]=$list;
					$data[$list['i_id']]['course_list']=isset($imp)?$imp:'';
					$data[$list['i_id']]['video_list']=isset($videos_count['video_count'])?$videos_count['video_count']:'';
				
				}
				
			}
			foreach($data as $key => $row) {
				//echo '<pre>';print_r($row);
				$dates[$key]  = $row['video_list'];
			}
			$sort_data=array_multisort($dates, SORT_DESC, $data);
			//echo '<pre>';print_r($sort_data);exit;
			if(!empty($data)){
				return $data;
				
			}
			
			
		
	}
	
	public  function get_institue_course_list($i_id){
		$this->db->select('course_list.c_name,course_list.c_logo,video_list.course_name')->from('video_list');
		$this->db->join('course_list', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->group_by('course_list.c_name');
		$this->db->where('video_list.i_id',$i_id);
		return $this->db->get()->result_array();
	}
	public  function get_institue_video_count_list($i_id){
		$this->db->select('COUNT(video_list.video_id) as video_count')->from('video_list');
		$this->db->where('status ',1);
		$this->db->where('i_id',$i_id);
		$this->db->where('public ',1);
		$this->db->order_by('video_count');
		return $this->db->get()->row_array();
		
	}
	public  function get_institues_details_for_front_end($i_id){
		$this->db->select('institute_list.i_id,institute_list.i_name,institute_list.i_logo,institute_list.i_address,institute_list.i_p_phone,institute_list.i_about,institute_list.i_email_id,institute_list.i_founder,institute_list.i_s_phone,countries_list.country_name,countries_list.country_code,countries_list.num_code,city_list.city_name,location_list.location_name')->from('institute_list');
		$this->db->join('countries_list', 'countries_list.c_id = institute_list.country_name', 'left');
		$this->db->join('city_list', 'city_list.city_id = institute_list.i_city', 'left');
		$this->db->join('location_list', 'location_list.l_id = institute_list.location_name', 'left');
		$this->db->where('institute_list.i_id',$i_id);
		//$this->db->order_by('institute_list.i_id','asc');
		$return=$this->db->get()->row_array();
		$videos_count=$this->get_institue_video_count_list($return['i_id']);
		$data=isset($return)?$return:'';
		$data['video_list']=isset($videos_count['video_count'])?$videos_count['video_count']:'';
		if(!empty($data)){
				return $data;
		}
	}
	public  function get_institues_video_list($i_id,$course_id){
		$this->db->select('course_list.c_name,video_list.t_name,video_list.course_name,video_list.v_desc,video_list.i_id,video_list.video_id,video_list.video_file,video_list.org_video_file,video_list.training_mode,video_list.v_title,video_list.a_author,video_list.u_b_schedule,video_list.created_by,video_list.created_at')->from('video_list');
		$this->db->join('course_list', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->where('video_list.status ',1);
		if(isset($course_id) && $course_id!=''){
		$this->db->where('video_list.course_name ',$course_id);	
		}
		$this->db->where('video_list.public ',1);
		$this->db->where('video_list.i_id ',$i_id);
		$return=$this->db->get()->result_array();
		foreach($return as $lis){
			$videos_view_count=$this->get_institue_video_view_count($lis['video_id']);
			$videos_likes_count=$this->get_institue_video_likes_count($lis['video_id']);
			if($videos_view_count['view_count']==0){
				$view_cnt='';
			}else{
				$view_cnt=$videos_view_count['view_count'];
			}
			if($videos_likes_count['like_count']==0){
				$like_cnt='';
			}else{
				$like_cnt=$videos_likes_count['like_count'];
			}
			
				$data[$lis['video_id']]=$lis;
				$data[$lis['video_id']]['likes_count']=isset($like_cnt)?$like_cnt:'';
				$data[$lis['video_id']]['view_count']=isset($view_cnt)?$view_cnt:'';
		}
		//echo '<pre>';print_r($data);exit;
		if(!empty($data)){
			return $data;
		}
				
	}
	public  function get_institue_video_likes_count($video_id){
		$this->db->select('COUNT(video_likes_list.v_l_id) as like_count')->from('video_likes_list');
		$this->db->where('status ',1);
		$this->db->where('video_id',$video_id);
		return $this->db->get()->row_array();
	}
	public  function get_institue_video_view_count($video_id){
		$this->db->select('COUNT(video_view_list.v_l_id) as view_count')->from('video_view_list');
		$this->db->where('status ',1);
		$this->db->where('v_id',$video_id);
		return $this->db->get()->row_array();
	}
	public  function get_video_details($video_id){
		$this->db->select('course_list.c_name,video_list.t_name,video_list.v_desc,video_list.video_id,video_list.video_file,video_list.org_video_file,video_list.training_mode,video_list.v_title,video_list.a_author,video_list.u_b_schedule,video_list.created_by,video_list.course_content')->from('video_list');
		$this->db->join('course_list', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->where('video_list.status ',1);
		$this->db->where('video_list.public ',1);
		$this->db->where('video_list.video_id ',$video_id);
		return $this->db->get()->row_array();
	}
	
	public  function get_course_wise_video_list($i_id,$course_id,$v_id){
		$this->db->select('course_list.c_name,video_list.t_name,video_list.i_id,video_list.course_name,video_list.video_id,video_list.video_file,video_list.org_video_file,video_list.v_title')->from('video_list');
		$this->db->join('course_list', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->where('video_list.status ',1);
		$this->db->where('video_list.public ',1);
		$this->db->where('video_list.i_id ',$i_id);
		$this->db->where('video_list.video_id!=',$v_id);
		$this->db->order_by('video_list.video_id ','asc');
		$this->db->where('video_list.course_name',$course_id);
		return $this->db->get()->result_array();
	}
		
	/* front_end  purpose*/
	
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
		$this->db->where('city_id ',$c_id);
		return $this->db->get()->result_array();
	}
	public  function save_institute($data){
		$this->db->insert('institute_list',$data);
		return $this->db->insert_id();
	}
	
	public  function get_institute_details($cut_id){
		$this->db->select('institute_list.*,countries_list.country_name as c_name,city_list.city_name,location_list.location_name as l_name')->from('institute_list');
		$this->db->join('countries_list', 'countries_list.c_id = institute_list.country_name', 'left');
		$this->db->join('city_list', 'city_list.city_id = institute_list.i_city', 'left');
		$this->db->join('location_list', 'location_list.l_id = institute_list.location_name', 'left');
		$this->db->where('institute_list.created_by ',$cut_id);
		return $this->db->get()->row_array();
	}
	
	public  function get_institute_basic_details($i_id){
		$this->db->select('i_id,i_logo')->from('institute_list');
		$this->db->where('institute_list.i_id ',$i_id);
		return $this->db->get()->row_array();
	}
	public  function update_institute_details($i_id,$data){
		$this->db->where('i_id',$i_id);
		return  $this->db->update('institute_list',$data);
	}
	
	
	/* add institue user*/
	
	public  function add_institute_user($data){
		$this->db->insert('customers_list',$data);
		return $this->db->insert_id();
		
	}
	public  function get_all_institute_list(){
		$this->db->select('institute_list.*,countries_list.country_name as c_name,city_list.city_name,location_list.location_name as l_name')->from('institute_list');
		$this->db->join('countries_list', 'countries_list.c_id = institute_list.country_name', 'left');
		$this->db->join('city_list', 'city_list.city_id = institute_list.i_city', 'left');
		$this->db->join('location_list', 'location_list.l_id = institute_list.location_name', 'left');
		$this->db->where('institute_list.status!=',2);
		$return=$this->db->get()->result_array();
				
		foreach($return as $list){
			$videos_count=$this->get_instituewise_video_count_list($list['i_id']);
			$data[$list['i_id']]=$list;
			$data[$list['i_id']]['video_count']=isset($videos_count['video_count'])?$videos_count['video_count']:'';
		}
		if(!empty($data)){
			return $data;
			
		}
	}
	public  function get_instituewise_video_count_list($i_id){
		$this->db->select('COUNT(video_list.video_id) as video_count')->from('video_list');
		$this->db->where('status ',1);
		$this->db->where('i_id',$i_id);
		$this->db->order_by('video_count');
		return $this->db->get()->row_array();
	}
	public  function get_institute_login_details($i_id){
		$this->db->select('i_id,created_by')->from('institute_list');
		$this->db->where('i_id ',$i_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_user_login_details($c_id,$data){
		$this->db->where('cust_id',$c_id);
		return $this->db->update('customers_list',$data);
		
	}
	public  function get_all_institute_details($i_id){
		$this->db->select('institute_list.*,countries_list.country_name as c_name,city_list.city_name,location_list.location_name as l_name')->from('institute_list');
		$this->db->join('countries_list', 'countries_list.c_id = institute_list.country_name', 'left');
		$this->db->join('city_list', 'city_list.city_id = institute_list.i_city', 'left');
		$this->db->join('location_list', 'location_list.l_id = institute_list.location_name', 'left');
		$this->db->where('institute_list.i_id ',$i_id);
		return $this->db->get()->row_array();
	}
	
	/* add institue user*/
	/* add  add institute wise  upload  video  functionality*/
	public  function get_institue_wise_video_list($i_id){
		$this->db->select('institute_list.i_name,admin.name as created_by,video_list.video_id,video_list.i_id,video_list.video_file,video_list.org_video_file,course_list.c_name as coursename,video_list.training_mode,video_list.public,video_list.private,video_list.status,video_list.created_at')->from('video_list');
		$this->db->join('course_list ', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->join('institute_list ', 'institute_list.i_id = video_list.i_id', 'left');
		$this->db->join('admin ', 'admin.cust_id = video_list.created_by', 'left');
		$this->db->where('video_list.i_id',$i_id);
		$this->db->where('video_list.status !=',2);
		return $this->db->get()->result_array();
	
	}
	public  function get_video_purpose_institute_details($i_id){
		$this->db->select('i_id,i_name,country_name,i_city,location_name')->from('institute_list');
		$this->db->where('i_id',$i_id);
		return $this->db->get()->row_array();
	}
	/* add  add institute wise  upload  video  functionality*/
	
	/* institur page  purpose*/
	
	public function get_institues_wise_courses_offered($i_id){
		$this->db->select('course_list.c_name,video_list.i_id,video_list.course_name')->from('video_list');
		$this->db->join('course_list ', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->group_by('course_list.c_name');
		$this->db->where('video_list.i_id',$i_id);
		$return=$this->db->get()->result_array();
		foreach($return as $list){
			$videos_count=$this->get_institue_course_video_count_list($list['i_id'],$list['course_name']);
				$data[$list['course_name']]=$list;
				$data[$list['course_name']]['video_list']=isset($videos_count['video_count'])?$videos_count['video_count']:'';
				
			}
			if(isset($data) && count($data)>0){
			//echo '<pre>';print_r($data);exit;
				foreach($data as $key => $row) {
					//echo '<pre>';print_r($row);
					$dates[$key]  = $row['video_list'];
				}
				$sort_data=array_multisort($dates, SORT_DESC, $data);
				//echo '<pre>';print_r($sort_data);exit;
				if(!empty($data)){
					return $data;
					
				}
			}
		//echo '<pre>';print_r($data);exit;
	}
	public  function get_institue_course_video_count_list($i_id,$course_id){
		$this->db->select('COUNT(video_list.video_id) as video_count')->from('video_list');
		$this->db->where('status ',1);
		$this->db->where('i_id',$i_id);
		$this->db->where('course_name',$course_id);
		$this->db->where('public ',1);
		$this->db->order_by('video_count');
		return $this->db->get()->row_array();
		
	}
	/* institur page  purpose*/
	
	public  function get_institue_id($cust_id){
		$this->db->select('i_id')->from('institute_list');
		$this->db->where('institute_list.created_by',$cust_id);
		return $this->db->get()->row_array();
	}
	public  function get_subscribeers_list($institue_id){
		$this->db->select('institute_list.i_name,video_subscribe_list.*,customers_list.name,customers_list.email_id,customers_list.mobile,video_list.v_title')->from('video_subscribe_list');
		$this->db->join('customers_list', 'customers_list.cust_id = video_subscribe_list.cust_id', 'left');
		$this->db->join('video_list', 'video_list.video_id = video_subscribe_list.video_id', 'left');
		$this->db->join('institute_list', 'institute_list.i_id = video_list.i_id', 'left');
		$this->db->where('video_subscribe_list.status',1);
		if(isset($institue_id) && $institue_id!=''){
		 $this->db->where('video_list.i_id',$institue_id);
		}
		return $this->db->get()->result_array();
	}
	public function get_users_list(){
		$this->db->select('customers_list.cust_id,customers_list.created_at,customers_list.source,customers_list.email_id,customers_list.name,customers_list.mobile')->from('customers_list');
		$this->db->join('institute_list', 'institute_list.created_by = customers_list.cust_id', 'left');
		$this->db->order_by('customers_list.cust_id','desc');
		return $this->db->get()->result_array();
	}
	
	public  function get_leads_details_list($institue_id){
		$this->db->select('institute_list.i_name,leads.*')->from('leads');
		$this->db->join('institute_list', 'institute_list.i_id = leads.in_id', 'left');
		if(isset($institue_id) && $institue_id!=''){
		 $this->db->where('leads.in_id',$institue_id);
		}
		$this->db->order_by('leads.l_id','desc');
		return $this->db->get()->result_array();
	}
	/* institue  related video  list*/
	public  function get_institue_related_video_list($l_id){
		$this->db->select('course_name')->from('video_list');
		$this->db->where('video_list.i_id',$l_id);
		$this->db->group_by('video_list.course_name');
		$return=$this->db->get()->result_array();
		foreach($return as $lis){
			$video_list=$this->get_related_video_list($lis['course_name'],$l_id);
			if(count($video_list)>0){
				$data[$lis['course_name']]=$video_list;
			}
		}
		if(!empty($data)){
			return $data;
		}
	}
	
	public  function get_related_video_list($course_id,$i_id){
			$this->db->select('course_list.c_name,video_list.t_name,video_list.course_name,video_list.v_desc,video_list.i_id,video_list.video_id,video_list.video_file,video_list.org_video_file,video_list.training_mode,video_list.v_title,video_list.a_author,video_list.u_b_schedule,video_list.created_by,video_list.created_at')->from('video_list');
		$this->db->join('course_list ', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->join('institute_list ', 'institute_list.i_id = video_list.i_id', 'left');
		$this->db->join('admin ', 'admin.cust_id = video_list.created_by', 'left');
		$this->db->where('video_list.i_id !=',$i_id);
		$this->db->where('video_list.course_name',$course_id);
		$this->db->where('video_list.status !=',2);
		return $this->db->get()->result_array();
	}
	
	public  function get_banner_details($int_id){
		$this->db->select('*')->from('institute_banners');
		$this->db->where('institute_banners.i_id',$int_id);
		return $this->db->get()->row_array();
	}
	public  function update_banner_details($b_id,$data){
		$this->db->where('institute_banners.b_id',$b_id);
		return $this->db->update('institute_banners',$data);
	}
	public  function insert_banner_details($data){
		$this->db->insert('institute_banners',$data);
		return $this->db->insert_id();
	}
	
	
	/* institue  related video  list*/

}