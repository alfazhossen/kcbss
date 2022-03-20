<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['expenseModel','categoryModel']);
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] = 'Expense';
        $data['row'] = $this->expenseModel->get()->result();
		$this->template->load('template', 'expense/expense', $data);
	}
    public function add()
	{
		$data['title'] = 'Add Expense';
        $data['category'] = $this->categoryModel->get();
        $this->template->load('template', 'expense/add_expense', $data);
	}
    public function addProcess(){
        $post = $this->input->post(null, TRUE);
        $this->expenseModel->add($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully Saved');
        }
        redirect('expense');
    }
    public function edit($id)
	{
		$data['title'] = 'Edit Expense';
        $data['category'] = $this->categoryModel->get();
        $data['row'] = $this->expenseModel->get($id)->row();
        $this->template->load('template', 'expense/edit_expense', $data);
	}
    public function editProcess(){
        $post = $this->input->post(null, TRUE);
        $this->expenseModel->edit($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully updated');
        }
        redirect('expense');
    }
    public function delete($id){
        $this->expenseModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully deleted');
        } 
        redirect('expense');
    }
}