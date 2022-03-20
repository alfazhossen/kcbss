<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {
    //Daily Start
    public function allDaily($post){
       return $this->db->select('daily.*, user.name, user.username,')
                       ->from('daily')
                       ->where('daily.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('user','user.username=daily.member_id')
                       ->order_by('daily_id','DESC')
                       ->get()->result();
    }
    public function allDailySum($post){
       return $this->db->select_sum('amount')
                       ->from('daily')
                       ->where('daily.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('user','user.username=daily.member_id')
                       ->order_by('daily_id','DESC')
                       ->get()->row()->amount;
    }
    public function daily($post){
       return $this->db->select('daily.*, user.name, user.username,')
                       ->from('daily')
                       ->where('member_id',$post['memberId'])
                       ->where('daily.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('user','user.username=daily.member_id')
                       ->order_by('daily_id','DESC')
                       ->get()->result();
    }
    public function dailySum($post){
       return $this->db->select_sum('amount')
                       ->from('daily')
                       ->where('member_id',$post['memberId'])
                       ->where('daily.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('user','user.username=daily.member_id')
                       ->order_by('daily_id','DESC')
                       ->get()->row()->amount;
    }
    //Daily End
    
    // Office Cost Start
    public function allMonthly($post){
       return $this->db->select('monthly.*, user.name, user.username,')
                       ->from('monthly')
                       ->where('monthly.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('user','user.username=monthly.member_id')
                       ->order_by('monthly_id','DESC')
                       ->get()->result();
    }
    public function allMonthlySum($post){
       return $this->db->select_sum('amount')
                       ->from('monthly')
                       ->where('monthly.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('user','user.username=monthly.member_id')
                       ->order_by('monthly_id','DESC')
                       ->get()->row()->amount;
    }
    public function monthly($post){
       return $this->db->select('monthly.*, user.name, user.username,')
                       ->from('monthly')
                       ->where('member_id',$post['memberId'])
                       ->where('monthly.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('user','user.username=monthly.member_id')
                       ->order_by('monthly_id','DESC')
                       ->get()->result();
    }
    public function monthlySum($post){
       return $this->db->select_sum('amount')
                       ->from('monthly')
                       ->where('member_id',$post['memberId'])
                       ->where('monthly.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('user','user.username=monthly.member_id')
                       ->order_by('monthly_id','DESC')
                       ->get()->row()->amount;
    }
    // Office Cost End
    
    // Profit Start
    public function allProfit($post){
       return $this->db->select('profit.*, project.project,')
                       ->from('profit')
                       ->where('profit.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('project','project.project_id=profit.projectId')
                       ->order_by('profit_id','DESC')
                       ->get()->result();
    }
    public function allProfitSum($post){
       return $this->db->select_sum('amount')
                       ->from('profit')
                       ->where('profit.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('project','project.project_id=profit.projectId')
                       ->order_by('profit_id','DESC')
                       ->get()->row()->amount;
    }
    public function profit($post){
       return $this->db->select('profit.*, project.project,')
                       ->from('profit')
                       ->where('projectId',$post['projectId'])
                       ->where('profit.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('project','project.project_id=profit.projectId')
                       ->order_by('profit_id','DESC')
                       ->get()->result();
    }
    public function profitSum($post){
       return $this->db->select_sum('amount')
                       ->from('profit')
                       ->where('projectId',$post['projectId'])
                       ->where('profit.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('project','project.project_id=profit.projectId')
                       ->order_by('profit_id','DESC')
                       ->get()->row()->amount;
    }
    // Profit End 
    
    // Loss Start 
    public function allLoss($post){
       return $this->db->select('loss.*, project.project,')
                       ->from('loss')
                       ->where('loss.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('project','project.project_id=loss.projectId')
                       ->order_by('loss_id','DESC')
                       ->get()->result();
    }
    public function allLossSum($post){
       return $this->db->select_sum('amount')
                       ->from('loss')
                       ->where('loss.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('project','project.project_id=loss.projectId')
                       ->order_by('loss_id','DESC')
                       ->get()->row()->amount;
    }
    public function loss($post){
       return $this->db->select('loss.*, project.project,')
                       ->from('loss')
                       ->where('projectId',$post['projectId'])
                       ->where('loss.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('project','project.project_id=loss.projectId')
                       ->order_by('loss_id','DESC')
                       ->get()->result();
    }
    public function lossSum($post){
       return $this->db->select_sum('amount')
                       ->from('loss')
                       ->where('projectId',$post['projectId'])
                       ->where('loss.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('project','project.project_id=loss.projectId')
                       ->order_by('loss_id','DESC')
                       ->get()->row()->amount;
    }
    // Loss End
    
    // Expense Start 
    public function allExpense($post){
       return $this->db->select('expense.*, category.category,')
                       ->from('expense')
                       ->where('expense.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('category','category.category_id=expense.categoryId')
                       ->order_by('expense_id','DESC')
                       ->get()->result();
    }
    public function allExpenseSum($post){
       return $this->db->select_sum('amount')
                       ->from('expense')
                       ->where('expense.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('category','category.category_id=expense.categoryId')
                       ->order_by('expense_id','DESC')
                       ->get()->row()->amount;
    }
    public function expense($post){
       return $this->db->select('expense.*, project.project,')
                       ->from('expense')
                       ->where('categoryId',$post['categoryId'])
                       ->where('expense.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('category','category.category_id=expense.categoryId')
                       ->order_by('expense_id','DESC')
                       ->get()->result();
    }
    public function expenseSum($post){
       return $this->db->select_sum('amount')
                       ->from('expense')
                       ->where('categoryId',$post['categoryId'])
                       ->where('expense.date BETWEEN "'. date('Y-m-d', strtotime($post['from_date'])). '" and "'. date('Y-m-d', strtotime($post['to_date'])).'"')
                       ->join('category','category.category_id=expense.categoryId')
                       ->order_by('expense_id','DESC')
                       ->get()->row()->amount;
    }
    // Expense End
}