<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MonthWise extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(['MonthWise_model', 'user_model']);
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['title'] = 'Month Wise Deposite History';
		$data['title1'] = 'Year Wise Office Cost History';
		$data['user'] = $this->user_model->get()->result();
		$this->template->load('template', 'monthWise/monthWise', $data);
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);

		$data['row'] = $this->MonthWise_model->monthWiseRow($post);
		$data['total'] = $this->MonthWise_model->monthWiseSum($post);
		$data['title'] = 'Month Wise Deposite History view';
		$data['from_date'] = $post['month'];
		$data['to_date'] = $post['year'];
		$this->template->load('template', 'monthWise/monthWise_view', $data);
	}
	public function officeCost()
	{
		$post = $this->input->post(null, TRUE);
		$data['row'] = $this->MonthWise_model->officeCostRow($post);
		$data['total'] = $this->MonthWise_model->officeCostSum($post);
		$data['title'] = 'Year Wise Office Cost History view';
		$data['year'] = $post['year'];
		$this->template->load('template', 'monthWise/officeCost_view', $data);
	}
}
