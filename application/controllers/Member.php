<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['user_model','dashboard_model','dueModel']);
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] = 'All Member';
        $data['row'] = $this->user_model->get()->result();
        $data['allDaily'] = $this->dashboard_model->allDailyDeposite();
        $data['allMonthly'] = $this->dashboard_model->allMonthlyDeposite();
        $data['allDueDaily'] = $this->dueModel->totalDailyDue();
        $data['allDueMonthly'] = $this->dueModel->totalmonthlyDue();
		$this->template->load('template', 'member/member', $data);
	}
	
}