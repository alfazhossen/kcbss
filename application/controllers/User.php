<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//check_not_login();
		//check_admin();
		$this->load->model(['user_model','dashboard_model','dailyDepositeModel','monthlyDepositeModel']);
		$this->load->library('form_validation');
	}

	
	public function index()
	{
		check_not_login();
		$data['title'] = 'Member';
		$data['row'] = $this->user_model->get();
		$this->template->load('template', 'user/user', $data);
	}
	
	public function view($id){
		$data['title'] = 'Member';
		$data['row'] = $this->user_model->get($id)->row();
		$this->template->load('template', 'user/view_user', $data);
	}
	public function print($id){
	    $this->load->library('mypdf');
		$data['title'] = 'Member';
		$data['row'] = $this->user_model->get($id)->row();
		$this->mypdf->generate('user/print_pdf', $data);
		//$this->template->load('template', 'user/view_user', $data);
	}
	
	public function qr($post){
        $this->load->library('Ciqrcode');
        QRcode::png(
            $post,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 6,
            $margin = 1
        );
    }

	public function profile()
	{
		$data['title'] = 'User Profile';
		$data['row'] = $this->user_model->get();
		$query = $this->user_model->get($this->login->user_login()->user_id);
		$data['row_update'] = $query->row();
		$this->template->load('template', 'user/profile', $data);
	}
	

	public function update_profile($id)
	{	
		$this->form_validation->set_rules('name', 'Full Name','required');
		$this->form_validation->set_rules('username', 'User Name','required|min_length[4]|callback_username_check');
		//$this->form_validation->set_rules('level', 'Level','required');
		$this->form_validation->set_message('required','%s plase required the Field');
		$this->form_validation->set_message('min_length','{field} plase minimum 4 charecter is require');
		$this->form_validation->set_message('is_unique','{field} Dont Available user Name plase unique user name is require');
		if($this->form_validation->run()==FALSE)
		{
			$query = $this->user_model->get($id);
			if($query->num_rows()>0){
				$data['title'] = 'Edit Profile';
				$data['row'] = $query->row();
				$this->template->load('template','user/edit_profile', $data);
			}else{
				echo "<script>alert('User Not Selected');";
				echo "window.location='".site_url('user/profile')."';</script>";
			}
			
		}else
		{
			$post = $this->input->post(null, TRUE);
			$this->user_model->edit($post);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('success', 'Your profile Data Updated');
			    
			}
			redirect('user/profile');	
		}
		
	}

	
	public function update_password(){
		$old_password = sha1($this->input->post('old_password'));
		$new_password = $this->input->post('new_password');
		$con_password = $this->input->post('con_password');
		$user_id = $this->login->user_login()->user_id;
		$password = $this->login->user_login()->password;

		if($old_password == $password){
			if($new_password == $con_password){

				$data = array(
					'password' => sha1($new_password)
				);

				$this->db->where('user_id', $user_id);
				$this->db->update('user', $data);

			    $this->session->set_flashdata('success', 'your password successfully change');
			    redirect('user/profile');
			}else{
				$this->session->set_flashdata('success', '<span style="color:red"> your confirm password not match</span>');
				redirect('user/profile');
			}
		}else{
			$this->session->set_flashdata('success', '<span style="color:red">Incorrect your old password.</span>');
			redirect('user/profile');
		}
		
	}
	public function update_photo(){
		$post = $this->input->post(null, TRUE);
		$this->user_model->edit_photo($post);	
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Your profile Picture Updated');
			
		}
		redirect('user/profile');	
	}

	public function add()
	{	
		//check_admin();
		$this->form_validation->set_rules('name', 'Full Name','required');
		$this->form_validation->set_rules('username', 'Username','required|min_length[4]|is_unique[user.username]');
		$this->form_validation->set_rules('phone', 'Phone Number','required');
		$this->form_validation->set_rules('password', 'Password','required|min_length[4]');
		$this->form_validation->set_rules('passconf', 'Conform password','required|matches[password]',array('matches' => '%s Dont Matches Conform Password'));
		$this->form_validation->set_message('required','%s the Field is required');
		$this->form_validation->set_message('min_length','{field} minimum 4 charecter is require');
		$this->form_validation->set_message('is_unique','{field} Dont Available user Name plase unique user name is require');

		if($this->form_validation->run()==FALSE)
		{
			$data['title'] = 'Add Member';
			$this->template->load('template' , 'user/add_user', $data);
		}else
		{
			$post = $this->input->post(null , TRUE);
			$this->user_model->add($post);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('success', 'your user Data Inserted successfully change');
			}
			redirect('user');	
		}	
	}

	public function edit($id)
	{	
		$this->form_validation->set_rules('name', 'Full Name','required');
		$this->form_validation->set_rules('username', 'User Name','required|min_length[4]|callback_username_check');
		if($this->input->post('password')){
			$this->form_validation->set_rules('password', 'Password','min_length[4]');
			$this->form_validation->set_rules('passconf', 'Conform password','matches[password]',array('matches' => '%s Dont Matches Conform Password'));
		}
		if($this->input->post('passconf')){
			$this->form_validation->set_rules('passconf', 'Conform password','matches[password]',array('matches' => '%s Dont Matches Conform Password'));
		}
		
		//$this->form_validation->set_rules('level', 'Level','required');
		$this->form_validation->set_message('required','%s plase required the Field');
		$this->form_validation->set_message('min_length','{field} plase minimum 4 charecter is require');
		$this->form_validation->set_message('is_unique','{field} Dont Available user Name plase unique user name is require');
		if($this->form_validation->run()==FALSE)
		{
			$query = $this->user_model->get($id);
			if($query->num_rows()>0){
				$data['title'] = 'Edit Member';
				$data['row'] = $query->row();
				$this->template->load('template','user/edit_user', $data);
			}else{
				echo "<script>alert('User Not Selected');";
				echo "window.location='".site_url('user')."';</script>";
			}
			
		}else
		{
			$post = $this->input->post(null, TRUE);
			$this->user_model->edit($post);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('success', 'Your User Data Updated');
			}
			redirect('user');
			
		}
		
	}

	public function username_check(){
		$post = $this->input->post(null , TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if($query->num_rows()>0){
			$this->form_validation->set_message('username_check','{field} User name Is not Available');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function delete($id)
	{
		$this->user_model->delete($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Your Data Deleted');
				echo "<script>alert('Data Deleted');</script>";
			}
			redirect('user');

	}
	public function delete_daily($id, $userId){
        $this->dailyDepositeModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully deleted');
        }
        redirect('user/view/'.$userId);
    }
	public function delete_monthly($id, $userId){
        $this->monthlyDepositeModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully deleted');
        }
        redirect('user/view/'.$userId);
    }
}
