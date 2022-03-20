<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['categoryModel','user_model']);
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] = 'Category';
        $data['row'] = $this->categoryModel->get()->result();
		$this->template->load('template', 'category/category', $data);
	}
	public function view($id){
		$data['title'] = 'Category Details';
		$data['row'] = $this->categoryModel->get($id)->row();
		$this->template->load('template', 'category/view_category', $data);
	}
    public function add()
	{
		$data['title'] = 'Add Category';
        $data['member'] = $this->user_model->getMember();
        $this->template->load('template', 'category/add_category', $data);
	}
    public function addProcess(){
        $post = $this->input->post(null, TRUE);
        $this->categoryModel->add($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully Saved');
        }
        redirect('category');
    }
    public function edit($id)
	{
		$data['title'] = 'Edit Category';
        $data['member'] = $this->user_model->getMember();
        $data['row'] = $this->categoryModel->get($id)->row();
        $this->template->load('template', 'category/edit_category', $data);
	}
    public function editProcess(){
        $post = $this->input->post(null, TRUE);
        $this->categoryModel->edit($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully updated');
        }
        redirect('category');
    }
    public function delete($id){
        $this->categoryModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully deleted');
        } 
        redirect('category');
    }
}