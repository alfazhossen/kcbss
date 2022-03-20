<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function index()
	{
		check_already_login();
		$data['title'] ='Member Login';
		$this->load->view('login', $data);
	}
	public function register()
	{
		check_already_login();
		$data['title'] ='Member Registration';
		$this->load->view('register',$data);
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('auth_model');
			$query = $this->auth_model->login($post);
			if($query->num_rows() > 0 )
			{
				$row = $query->row();
				$params = array(
					'user_id' => $row->user_id,
					'level' => $row->level,
				);
				$this->session->set_userdata($params);
				if($row->level == 1){
					redirect('dashboard');
				}
				if($row->level == 3){
				    redirect('employee');
				}else{
					redirect('userdash');
				}
			}else{
				echo "<script>
						alert('Faild , Your User ID Password Incorrect');
						window.location='".site_url('auth')."';

					</script>";
			}
		}
	}
	public function logout()
	{
		$params = array('user_id', 'lavel');
		$this->session->unset_userdata($params);
		redirect('auth');
	}
}
