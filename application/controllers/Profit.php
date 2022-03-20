<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profit extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['profitModel','projectModel']);
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] = 'Profit';
        $data['row'] = $this->profitModel->get()->result();
		$this->template->load('template', 'profit/profit', $data);
	}
    public function add()
	{
		$data['title'] = 'Add Profit';
        $data['project'] = $this->projectModel->get();
        $this->template->load('template', 'profit/add_profit', $data);
	}
    public function addProcess(){
        $post = $this->input->post(null, TRUE);
        $this->profitModel->add($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully Saved');
        }
        redirect('profit');
    }
    public function edit($id)
	{
		$data['title'] = 'Edit Profit';
        $data['project'] = $this->projectModel->get();
        $data['row'] = $this->profitModel->get($id)->row();
        $this->template->load('template', 'profit/edit_profit', $data);
	}
    public function editProcess(){
        $post = $this->input->post(null, TRUE);
        $this->profitModel->edit($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully updated');
        }
        redirect('profit');
    }
    public function delete($id){
        $this->profitModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully deleted');
        } 
        redirect('profit');
    }
}