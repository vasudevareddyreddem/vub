<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_oa2 extends CI_Controller
{
    public function session($provider_name)
    {
        $this->load->library('session');
        $this->load->helper('url_helper');
		$this->load->library('user_agent');


        $this->load->library('oauth2/OAuth2');
				//$this->load->library('tank_auth');
				$this->load->model('User_model');
				$this->load->config('oauth2', TRUE);

        $provider = $this->oauth2->provider($provider_name, array(
            'id' => $this->config->item($provider_name.'_id', 'oauth2'),
            'secret' => $this->config->item($provider_name.'_secret', 'oauth2'),
        ));


        if ( ! $this->input->get('code'))
        {
            // By sending no options it'll come back here
            $provider->authorize();
        }
        else
        {
            // Howzit?
            try
            {
                //$token = $provider->access($_GET['code']);
                $token = $provider->access($this->input->get('code'));

                $user = $provider->get_user_info($token);
				//echo '<pre>';print_r($user);exit;
				if(isset($user['email']) && $user['email']!=''){
					$newadd=array(
					'username'=>isset($user['uid'])?$user['uid']:'',
					'role_id'=>2,
					'source'=>'google',
					'name'=>isset($user['name'])?$user['name']:'',
					'email_id'=>isset($user['email'])?$user['email']:'',
					'created_at'=>date('Y-m-d H:i:s'),
					);
					$check=$this->User_model->check_user_exists($user['email'],'google');
					if(count($check)>0){
							$user_details=$this->User_model->get_user_details($check['cust_id']);
								if($user_details['mobile_verified']==1){
									$this->session->set_userdata('vuebin_user',$user_details);
									redirect($this->agent->referrer());
								}else{
									$this->session->set_userdata('vuebin_user',$user_details);
									redirect('user/verification');
								}
					}else{
							$save=$this->User_model->save_new_user($newadd);
							if(count($save)>0){
								$user_details=$this->User_model->get_user_details($save);
								if($user_details['mobile_verified']==1){
									$this->session->set_userdata('vuebin_user',$user_details);
									redirect($this->agent->referrer());
								}else{
									$this->session->set_userdata('vuebin_user',$user_details);
									redirect('user/verification');
								}
								
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect($this->agent->referrer());
							}	
					}
					
					
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('');
				}
				//echo '<pre>';print_r($user);exit;
				


            }

            catch (OAuth2_Exception $e)
            {
                show_error('That didnt work: '.$e);
            }

        }
    }


	

}

/* End of file auth_oa2.php */
/* Location: ./application/controllers/auth_oa2.php */