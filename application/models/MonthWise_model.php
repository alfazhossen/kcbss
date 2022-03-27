<?php defined('BASEPATH') or exit('No direct script access allowed');

class MonthWise_model extends CI_Model
{
	public function monthWiseRow($post)
	{
		return $this->db->select('daily.*, user.name, user.username,')
			->from('daily')
			->where('member_id', $post['memberId'])
			->where("DATE_FORMAT(date,'%Y-%m')", date('Y-m',strtotime($post['year'].'-'.$post['month'])))
			->join('user', 'user.username=daily.member_id')
			->order_by('daily_id', 'DESC')
			->get()->result();
	}
	public function monthWiseSum($post)
	{
		return $this->db->select_sum('amount')
			->from('daily')
			->where('member_id', $post['memberId'])
			->where("DATE_FORMAT(date,'%Y-%m')", date('Y-m',strtotime($post['year'].'-'.$post['month'])))
			->join('user', 'user.username=daily.member_id')
			->order_by('daily_id', 'DESC')
			->get()->row()->amount;
	}
	public function officeCostRow($post)
	{
		return $this->db->select('monthly.*, user.name, user.username,')
			->from('monthly')
			->where('member_id', $post['memberId'])
			->where("DATE_FORMAT(date,'%Y')", $post['year'])
			->join('user', 'user.username=monthly.member_id')
			->order_by('monthly_id', 'DESC')
			->get()->result();
	}
	public function officeCostSum($post)
	{
		return $this->db->select_sum('amount')
			->from('monthly')
			->where('member_id', $post['memberId'])
			->where("DATE_FORMAT(date,'%Y')", $post['year'])
			->join('user', 'user.username=monthly.member_id')
			->order_by('monthly_id', 'DESC')
			->get()->row()->amount;
	}
}