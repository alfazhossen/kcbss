<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	public function todayDailyDeposite(){
		return $this->db->select_sum('amount')->from('daily')->where('date',date("Y-m-d"))->get()->row()->amount;
	}
	public function monthlyDailyDeposite(){
		return $this->db->select_sum('amount')->from('daily')->where("DATE_FORMAT(date,'%Y-%m')",date("Y-m"))->get()->row()->amount;
	}
	public function yearlyDailyDeposite(){
		return $this->db->select_sum('amount')->from('daily')->where("DATE_FORMAT(date,'%Y')",date("Y"))->get()->row()->amount;
	}
	public function allDailyDeposite(){
		return $this->db->select_sum('amount')->from('daily')->get()->row()->amount;
	}

	public function todayMonthlyDeposite(){
		return $this->db->select_sum('amount')->from('monthly')->where('date',date("Y-m-d"))->get()->row()->amount;
	}
	public function monthlyMonthlyDeposite(){
		return $this->db->select_sum('amount')->from('monthly')->where("DATE_FORMAT(date,'%Y-%m')",date("Y-m"))->get()->row()->amount;
	}
	public function yearlyMonthlyDeposite(){
		return $this->db->select_sum('amount')->from('monthly')->where("DATE_FORMAT(date,'%Y')",date("Y"))->get()->row()->amount;
	}
	public function allMonthlyDeposite(){
		return $this->db->select_sum('amount')->from('monthly')->get()->row()->amount;
	}

	public function todayExpense(){
		return $this->db->select_sum('amount')->from('expense')->where('date',date("Y-m-d"))->get()->row()->amount;
	}
	public function monthlyExpense(){
		return $this->db->select_sum('amount')->from('expense')->where("DATE_FORMAT(date,'%Y-%m')",date("Y-m"))->get()->row()->amount;
	}
	public function yearlyExpense(){
		return $this->db->select_sum('amount')->from('expense')->where("DATE_FORMAT(date,'%Y')",date("Y"))->get()->row()->amount;
	}
	public function allExpense(){
		return $this->db->select_sum('amount')->from('expense')->get()->row()->amount;
	}
	
	public function todayDeposite($date){
		return $this->db->select('daily.*,user.name')->from('daily')->join('user','user.username=daily.member_id')->where('date',$date)->order_by('daily_id', 'DESC')->get();
	}
	public function monthlyDeposite($date){
		return $this->db->select('daily.*,user.name')->from('daily')->join('user','user.username=daily.member_id')->where("DATE_FORMAT(date,'%Y-%m')",$date)->order_by('daily_id', 'DESC')->limit('1000')->get();
	}
	public function yearlyDeposite($date){
		return $this->db->select('daily.*,user.name')->from('daily')->join('user','user.username=daily.member_id')->where("DATE_FORMAT(date,'%Y')",$date)->order_by('daily_id', 'DESC')->limit('1000')->get();
	}
	public function todayOffice($date){
		return $this->db->select('monthly.*,user.name')->from('monthly')->join('user','user.username = monthly.member_id')->where('date',$date)->order_by('monthly_id', 'DESC')->get();
	}
	public function monthlyOffice($date){
		return $this->db->select('monthly.*,user.name')->from('monthly')->join('user','user.username = monthly.member_id')->where("DATE_FORMAT(date,'%Y-%m')",$date)->order_by('monthly_id', 'DESC')->limit('1000')->get();
	}
	public function yearlyOffice($date){
		return $this->db->select('monthly.*,user.name')->from('monthly')->join('user','user.username = monthly.member_id')->where("DATE_FORMAT(date,'%Y')",$date)->order_by('monthly_id', 'DESC')->limit('1000')->get();
	}
	public function todaysExpense($date){
		return $this->db->select('expense.*,category.category')->from('expense')->join('category','category.category_id=expense.categoryId')->where('date',$date)->order_by('expense_id', 'DESC')->get();
	}
	public function monthlysExpense($date){
		return $this->db->select('expense.*,category.category')->from('expense')->join('category','category.category_id=expense.categoryId')->where("DATE_FORMAT(date,'%Y-%m')",$date)->order_by('expense_id', 'DESC')->limit('1000')->get();
	}
	public function yearlysExpense($date){
		return $this->db->select('expense.*,category.category')->from('expense')->join('category','category.category_id=expense.categoryId')->where("DATE_FORMAT(date,'%Y')",$date)->order_by('expense_id', 'DESC')->limit('1000')->get();
	}
}
