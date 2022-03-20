<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdash extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		//check_admin();
		$this->load->model('userdash_model');
	}
	
	public function index()
	{
		$username =$this->login->user_login()->username;
		$data['title'] = 'Dashboard';

		$data['todayDailyDepositeUser'] = $this->userdash_model->todayDailyDepositeUser($username);
		$data['monthlyDailyDepositeUser'] = $this->userdash_model->monthlyDailyDepositeUser($username);
		$data['yearlyDailyDepositeUser'] = $this->userdash_model->yearlyDailyDepositeUser($username);
		$data['allDailyDepositeUser'] = $this->userdash_model->allDailyDepositeUser($username);

        $data['todayMonthlyDeposite'] = $this->userdash_model->todayMonthlyDeposite($username);
		$data['monthlyMonthlyDeposite'] = $this->userdash_model->monthlyMonthlyDeposite($username);
		$data['yearlyMonthlyDeposite'] = $this->userdash_model->yearlyMonthlyDeposite($username);
		$data['allMonthlyDeposite'] = $this->userdash_model->allMonthlyDeposite($username);
		$data['dailyTotalDue'] = $this->userdash_model->dailyTotalDue($username);
		$data['monthlyTotalDue'] = $this->userdash_model->monthlyTotalDue($username);
		$data['titleDaily'] = 'Daily Deposite Due';
        $data['titleMonthly'] = 'Office Cost Deposite Due';
		$data['titleDailyHistory'] = 'Daily Deposite Payments History';
        $data['titleMonthlyHistory'] = 'Office Cost Deposite Payments History';
		$data['daily'] = $this->userdash_model->dailyDue($username)->result();
        $data['monthly'] = $this->userdash_model->monthlyDue($username)->result();
		$data['dailyHistory'] = $this->userdash_model->dailyDueHistory($username)->result();
        $data['monthlyHistory'] = $this->userdash_model->monthlyDueHistory($username)->result();
		$this->template->load('template', 'userdash', $data);
	}
}
