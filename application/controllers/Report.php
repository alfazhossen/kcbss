<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		//check_admin();
		$this->load->model(['report_model','user_model','projectModel','categoryModel']);
		$this->load->library('form_validation');
	}
	
	public function index()
	{
	    $data['title'] = "Report Deposite";
	    $data['titleProfit'] = "Report Profit Loss";
	    $data['titleExpense'] = "Report Expense";
		$data['member'] = $this->user_model->get()->result();
		$data['project'] = $this->projectModel->get()->result();
		$data['category'] = $this->categoryModel->get()->result();
		$this->template->load('template', 'report/report', $data);
	}
	public function process(){
		$post = $this->input->post(null, TRUE);
		if($post['deposite'] == 'daily'){
		    if($post['memberId'] == 'all'){
		        $data['row'] = $this->report_model->allDaily($post);
			    $data['total'] = $this->report_model->allDailySum($post);
		    }else{
			    $data['row'] = $this->report_model->daily($post);
			    $data['total'] = $this->report_model->dailySum($post);
		    }
		}
		if($post['deposite'] == 'monthly'){
		    if($post['memberId'] == 'all'){
		        $data['row'] = $this->report_model->allMonthly($post);
			    $data['total'] = $this->report_model->allMonthlySum($post);
		    }else{
		        $data['row'] = $this->report_model->monthly($post);
			    $data['total'] = $this->report_model->monthlySum($post); 
		    }
		}
		$data['title'] = 'Report Deposite';
		$data['from_date'] =$post['from_date']; 
		$data['to_date'] =$post['to_date']; 
		$this->template->load('template', 'report/report_view', $data);
	}
	public function processProject(){
		$post = $this->input->post(null, TRUE);
		if($post['income'] == 'profit'){
		    if($post['projectId'] == 'all'){
		        $data['row'] = $this->report_model->allProfit($post);
			    $data['total'] = $this->report_model->allProfitSum($post);
		    }else{
			    $data['row'] = $this->report_model->profit($post);
			    $data['total'] = $this->report_model->profitSum($post);
		    }
		}
		if($post['income'] == 'loss'){
		    if($post['projectId'] == 'all'){
		        $data['row'] = $this->report_model->allLoss($post);
			    $data['total'] = $this->report_model->allLossSum($post);
		    }else{
		        $data['row'] = $this->report_model->loss($post);
			    $data['total'] = $this->report_model->lossSum($post); 
		    }
		}
		$data['title'] = 'Report Profit Loss';
		$data['from_date'] =$post['from_date']; 
		$data['to_date'] =$post['to_date']; 
		$this->template->load('template', 'report/project_view', $data);
	}
	public function processExpense(){
		$post = $this->input->post(null, TRUE);
		    if($post['categoryId'] == 'all'){
		        $data['row'] = $this->report_model->allExpense($post);
			    $data['total'] = $this->report_model->allExpenseSum($post);
		    }else{
			    $data['row'] = $this->report_model->expense($post);
			    $data['total'] = $this->report_model->expenseSum($post);
		    }
		$data['title'] = 'Report Expense';
		$data['from_date'] =$post['from_date']; 
		$data['to_date'] =$post['to_date']; 
		$this->template->load('template', 'report/expense_view', $data);
	}
}