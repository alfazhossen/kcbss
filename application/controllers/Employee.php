<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		//check_admin();
		$this->load->model(['dashboard_model','dueModel']);
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		//$username =$this->login->user_login()->username;
		$data['title'] = 'Dashboard';
		$data['todayDailyDeposite'] = $this->dashboard_model->todayDailyDeposite();
		$data['monthlyDailyDeposite'] = $this->dashboard_model->monthlyDailyDeposite();
		$data['yearlyDailyDeposite'] = $this->dashboard_model->yearlyDailyDeposite();
		$data['allDailyDeposite'] = $this->dashboard_model->allDailyDeposite();

		$data['todayMonthlyDeposite'] = $this->dashboard_model->todayMonthlyDeposite();
		$data['monthlyMonthlyDeposite'] = $this->dashboard_model->monthlyMonthlyDeposite();
		$data['yearlyMonthlyDeposite'] = $this->dashboard_model->yearlyMonthlyDeposite();
		$data['allMonthlyDeposite'] = $this->dashboard_model->allMonthlyDeposite();

// 		$data['todayExpense'] = $this->dashboard_model->todayExpense();
// 		$data['monthlyExpense'] = $this->dashboard_model->monthlyExpense();
// 		$data['yearlyExpense'] = $this->dashboard_model->yearlyExpense();
// 		$data['allExpense'] = $this->dashboard_model->allExpense();
		
		$data['totalDailyDue'] = $this->dueModel->totalDailyDue();
        $data['totalMonthlyDue'] = $this->dueModel->totalMonthlyDue();
        $data['titleDaily'] = 'Daily Deposite Due';
        $data['titleMonthly'] = 'Office Cost Deposite Due';
        $data['daily'] = $this->dueModel->get()->result();
        $data['monthly'] = $this->dueModel->getMonthly()->result();
		$this->template->load('template', 'employee', $data);
	}
	
	public function todayDeposite()
	{
	  	$data['title'] = 'Today Deposite';
	  	$data['date'] = date("Y-m-d"); 
	  	$data['row'] = $this->dashboard_model->todayDeposite($data['date'])->result();
	  	$this->template->load('template', 'employee/today_deposite', $data);
	}
	public function monthlyDeposite()
	{
	  	$data['title'] = 'Monthly Deposite';
	  	$data['date'] = date("Y-m"); 
	  	$data['row'] = $this->dashboard_model->monthlyDeposite($data['date'])->result();
	  	$this->template->load('template', 'employee/monthly_deposite', $data);
	}
	public function yearlyDeposite()
	{
	  	$data['title'] = 'Yearly Deposite';
	  	$data['date'] = date("Y"); 
	  	$data['row'] = $this->dashboard_model->yearlyDeposite($data['date'])->result();
	  	$this->template->load('template', 'employee/yearly_deposite', $data);
	}
	public function todayCost()
	{
	  	$data['title'] = 'Today Office Cost';
	  	$data['date'] = date("Y-m-d"); 
	  	$data['row'] = $this->dashboard_model->todayOffice($data['date'])->result();
	  	$this->template->load('template', 'employee/today_cost', $data);
	}
	public function monthlyCost()
	{
	  	$data['title'] = 'Monthly Office Cost';
	  	$data['date'] = date("Y-m"); 
	  	$data['row'] = $this->dashboard_model->monthlyOffice($data['date'])->result();
	  	$this->template->load('template', 'employee/monthly_cost', $data);
	}
	public function yearlyCost()
	{
	  	$data['title'] = 'Yearly Office Cost';
	  	$data['date'] = date("Y"); 
	  	$data['row'] = $this->dashboard_model->yearlyOffice($data['date'])->result();
	  	$this->template->load('template', 'employee/yearly_cost', $data);
	}
// 	public function todayExpense()
// 	{
// 	  	$data['title'] = 'Today Expense';
// 	  	$data['date'] = date("Y-m-d"); 
// 	  	$data['row'] = $this->dashboard_model->todaysExpense($data['date'])->result();
// 	  	$this->template->load('template', 'employee/today_expense', $data);
// 	}
// 	public function monthlyExpense()
// 	{
// 	  	$data['title'] = 'Monthly Expense';
// 	  	$data['date'] = date("Y-m"); 
// 	  	$data['row'] = $this->dashboard_model->monthlysExpense($data['date'])->result();
// 	  	$this->template->load('template', 'employee/monthly_expense', $data);
// 	}
// 	public function yearlyExpense()
// 	{
// 	  	$data['title'] = 'Yearly Expense';
// 	  	$data['date'] = date("Y"); 
// 	  	$data['row'] = $this->dashboard_model->yearlysExpense($data['date'])->result();
// 	  	$this->template->load('template', 'employee/yearly_expense', $data);
// 	}
	    
}
