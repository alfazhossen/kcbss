<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emergency extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['emergencyModel','user_model']);
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] = 'Emergency Deposite';
        $data['row'] = $this->emergencyModel->get()->result();
		$this->template->load('template', 'emergency/emergency', $data);
	}
	 public function view($id)
	{
		$data['title'] = 'Emergency Deposite';
        $data['row'] = $this->emergencyModel->get($id)->row();
		$this->template->load('template', 'emergency/view_emergency', $data);
	}
    public function add()
	{
		$data['title'] = 'Add Emergency Deposite';
		$data['member'] = $this->user_model->getMember()->result();
        $this->template->load('template', 'emergency/add_emergency', $data);
	}
    public function addProcess(){
        $post = $this->input->post(null, TRUE);
        $this->emergencyModel->add($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully Saved');
        }
        redirect('emergency');
    }
    public function edit($id)
	{
		$data['title'] = 'Edit Emergency Deposite';
        $data['row'] = $this->emergencyModel->get($id)->row();
        $data['member'] = $this->user_model->getMember()->result();
        $this->template->load('template', 'emergency/edit_emergency', $data);
	}
    public function editProcess(){
        $post = $this->input->post(null, TRUE);
        $this->emergencyModel->edit($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully updated');
        }
        redirect('emergency');
    }
    public function delete($id){
        $this->emergencyModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully deleted');
        } 
        redirect('emergency');
    }
}