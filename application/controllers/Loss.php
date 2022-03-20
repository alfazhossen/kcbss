<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loss extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['lossModel','projectModel']);
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] = 'Loss';
        $data['row'] = $this->lossModel->get()->result();
		$this->template->load('template', 'loss/loss', $data);
	}
    public function add()
	{
		$data['title'] = 'Add Loss';
        $data['project'] = $this->projectModel->get();
        $this->template->load('template', 'loss/add_loss', $data);
	}
    public function addProcess(){
        $post = $this->input->post(null, TRUE);
        $this->lossModel->add($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully Saved');
        }
        redirect('loss');
    }
    public function edit($id)
	{
		$data['title'] = 'Edit Loss';
        $data['project'] = $this->projectModel->get();
        $data['row'] = $this->lossModel->get($id)->row();
        $this->template->load('template', 'loss/edit_loss', $data);
	}
    public function editProcess(){
        $post = $this->input->post(null, TRUE);
        $this->lossModel->edit($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully updated');
        }
        redirect('loss');
    }
    public function delete($id){
        $this->lossModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully deleted');
        } 
        redirect('loss');
    }
}