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
//     public function edit($id)
// 	{
// 		$data['title'] = 'Edit Category';
//         $data['member'] = $this->user_model->getMember();
//         $data['row'] = $this->categoryModel->get($id)->row();
//         $this->template->load('template', 'category/edit_category', $data);
// 	}
//     public function editProcess(){
//         $post = $this->input->post(null, TRUE);
//         $this->categoryModel->edit($post);
//         if ($this->db->affected_rows() > 0) {
//             $this->session->set_flashdata('success', 'Your Data is successfully updated');
//         }
//         redirect('category');
//     }
//     public function delete($id){
//         $this->categoryModel->delete($id);
//         if ($this->db->affected_rows() > 0) {
//             $this->session->set_flashdata('success', 'Your Data is successfully deleted');
//         } 
//         redirect('category');
//     }
}