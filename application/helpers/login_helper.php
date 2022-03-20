<?php

function check_already_login()
{
	$ci =& get_instance();
	$user_session = $ci->session->userdata('user_id');
	if($user_session)
	{
		redirect('dashboard');
	}
}
function check_not_login()
{
	$ci =& get_instance();
	$user_session = $ci->session->userdata('user_id');
	if(!$user_session)
	{
		redirect('auth');
	}
}
function check_admin()
{
	$ci =& get_instance();
	$ci->load->library('login');
	if($ci->login->user_login()->level == 1){
		redirect('dashboard');
	}
	if($ci->login->user_login()->level == 3){
		redirect('employee');
	}else{
	   redirect('userdash');
	}
}
