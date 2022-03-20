<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statement extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('statement_model');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
	    $data['title'] = "Statement";
		$this->template->load('template', 'statement/statement', $data);
	}
	
	public function process(){
		$post = $this->input->post(null, TRUE);
		if($post['deposite'] == 'daily'){
		    $data['row'] = $this->statement_model->daily($post);
			$data['total'] = $this->statement_model->dailySum($post);
		}
		if($post['deposite'] == 'monthly'){
		    $data['row'] = $this->statement_model->monthly($post);
		    $data['total'] = $this->statement_model->monthlySum($post); 
		}
		$data['title'] = 'Report View';
		$data['from_date'] =$post['from_date']; 
		$data['to_date'] =$post['to_date']; 
		$this->template->load('template', 'statement/statement_view', $data);
	}
}