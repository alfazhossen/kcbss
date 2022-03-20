<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Userdash_model extends CI_Model {

	public function todayDailyDepositeUser($username){
		return $this->db->select_sum('amount')->from('daily')->where('date',date("Y-m-d"))->where('member_id',$username)->get()->row()->amount;
	}
	public function monthlyDailyDepositeUser($username){
		return $this->db->select_sum('amount')->from('daily')->where("DATE_FORMAT(date,'%Y-%m')",date("Y-m"))->where('member_id',$username)->get()->row()->amount;
	}
	public function yearlyDailyDepositeUser($username){
		return $this->db->select_sum('amount')->from('daily')->where("DATE_FORMAT(date,'%Y')",date("Y"))->where('member_id',$username)->get()->row()->amount;
	}
	public function allDailyDepositeUser($username){
		return $this->db->select_sum('amount')->from('daily')->where('member_id',$username)->get()->row()->amount;
	}

	public function todayMonthlyDeposite($username){
		return $this->db->select_sum('amount')->from('monthly')->where('date',date("Y-m-d"))->where('member_id',$username)->get()->row()->amount;
	}
	public function monthlyMonthlyDeposite($username){
		return $this->db->select_sum('amount')->from('monthly')->where("DATE_FORMAT(date,'%Y-%m')",date("Y-m"))->where('member_id',$username)->get()->row()->amount;
	}
	public function yearlyMonthlyDeposite($username){
		return $this->db->select_sum('amount')->from('monthly')->where("DATE_FORMAT(date,'%Y')",date("Y"))->where('member_id',$username)->get()->row()->amount;
	}
	public function allMonthlyDeposite($username){
		return $this->db->select_sum('amount')->from('monthly')->where('member_id',$username)->get()->row()->amount;
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
	public function dailyTotalDue($username){
	    return $this->db->select('total_due')->where('memberId',$username)->get('duedaily')->row()->total_due;
	}
	public function monthlyTotalDue($username){
	    return $this->db->select('total_due')->where('memberId',$username)->get('duemonthly')->row()->total_due;
	}
	public function dailyDue($username){
	    return $this->db->where('memberId',$username)->get('duedaily');
	}
	public function monthlyDue($username){
	    return $this->db->where('memberId',$username)->get('duemonthly');
	}
	public function dailyDueHistory($username){
	    return $this->db->where('member_id',$username)->order_by('daily_id','DESC')->get('daily');
	}
	public function monthlyDueHistory($username){
	    return $this->db->where('member_id',$username)->order_by('monthly_id','DESC')->get('monthly');
	}
}
