<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resignation extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['resignationModel','user_model']);
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] = 'Resignation';
		$this->template->load('template', 'resignation/resignation', $data);
	}
	
	public function list()
	{
		$data['title'] = 'All Resignation';
		$data['row'] = $this->resignationModel->get()->result();
		$this->template->load('template', 'resignation/resignation_list', $data);
	}
	public function resignMember()
	{
		$data['title'] = 'All Resignation Member';
		$data['row'] = $this->resignationModel->get()->result();
		$this->template->load('template', 'resignation/resignation_member', $data);
	}
	public function view($id){
		$data['title'] = 'Resignation View';
		$data['row'] = $this->resignationModel->get($id)->row();
		$this->template->load('template', 'resignation/resignation_view', $data);
	}
    public function addProcess(){
        $post = $this->input->post(null, TRUE);
        $this->resignationModel->add($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully Saved');
        }
        redirect('resignation');
    }
    public function approve($id)
	{
		$data['title'] = 'Approved Resign';
        $data['row'] = $this->resignationModel->get($id)->row();
        $this->template->load('template', 'resignation/resignation_approve', $data);
	}
    public function approveProcess(){
        $post = $this->input->post(null, TRUE);
        $this->resignationModel->approve($post);
		if($this->db->affected_rows() > 0){
			$this->user_model->resign($post['create_user']);
		}
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your user is successfully Resign');
        }
        redirect('resignation/list');
    }
    public function delete($id){
        $this->resignationModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully deleted');
        } 
        redirect('resignation');
    }
}