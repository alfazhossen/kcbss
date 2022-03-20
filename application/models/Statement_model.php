<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Statement_model extends CI_Model {
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
}