<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['projectModel','user_model']);
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] = 'Project';
        $data['row'] = $this->projectModel->get()->result();
		$this->template->load('template', 'project/project', $data);
	}
	 public function view($id)
	{
		$data['title'] = 'Project';
        $data['row'] = $this->projectModel->get($id)->row();
		$this->template->load('template', 'project/view_project', $data);
	}
    public function add()
	{
		$data['title'] = 'Add Project';
        $this->template->load('template', 'project/add_project', $data);
	}
    public function addProcess(){
        $post = $this->input->post(null, TRUE);
        $this->projectModel->add($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully Saved');
        }
        redirect('project');
    }
    public function edit($id)
	{
		$data['title'] = 'Edit Project';
        $data['row'] = $this->projectModel->get($id)->row();
        $this->template->load('template', 'project/edit_project', $data);
	}
    public function editProcess(){
        $post = $this->input->post(null, TRUE);
        $this->projectModel->edit($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully updated');
        }
        redirect('project');
    }
    public function delete($id){
        $this->projectModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully deleted');
        } 
        redirect('project');
    }
}