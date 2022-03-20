<?php defined('BASEPATH') or exit('No direct script access allowed');

class MonthlyDepositeModel extends CI_Model
{
	public function get($id = null)
	{
		$this->db->from('monthly');
		if ($id != null) {
			$this->db->where('monthly_id', $id);
		}
		$this->db->order_by('monthly_id', 'DESC');
		$this->db->limit(500); 
		$this->db->join('user', 'user.username = monthly.member_id');
		$query = $this->db->get();
		return $query;
	}
	public function add($post)
	{
	    if($post['amount']%$post['fixt_amount']==0){
    		$total_row = $post['amount'] / $post['fixt_amount'];
    		for ($i = 0; $i < $total_row; $i++) {
    			$date = $this->db->select('date')->where('member_id', $post['member_id'])->order_by('monthly_id', 'DESC')->limit(1)->get('monthly')->row()->date;
    			if (!$date) {
    				$date = date("Y-m-d", strtotime("2018-01-25"));
    			}
    			$params = [
    				'date'   		=> date("Y-m-d", strtotime('+1 month', strtotime($date))),
    				'member_id'   	=> $post['member_id'],
    				'fixt_amount'	=> $post['fixt_amount'],
    				'amount'   		=> $post['fixt_amount'],
    				'send_amount'   => $post['amount'],
    				'craete_date' 	=> date('Y-m-d H:i:s'),
    				'create_user' 	=> $this->login->user_login()->username
    			];
    			$this->db->insert('monthly', $params);
    		}
	    }else{
	        $this->session->set_flashdata('error', 'please check fixt amount & deposite amount');
	        redirect('MonthlyDeposite/add');
	    }
	}

	public function edit($post)
	{
		$params = [
			'date'   		=> $post['date'],
			'member_id'   	=> $post['member_id'],
			'amount'   		=> $post['amount'],
			'update_date' 	=> date('Y-m-d H:i:s'),
			'update_user' 	=> $this->login->user_login()->username
		];
		$this->db->where('monthly_id', $post['monthly_id']);
		$this->db->update('monthly', $params);
	}
	public function delete($id)
	{
		$this->db->where('monthly_id', $id);
		$this->db->delete('monthly');
	}
}
