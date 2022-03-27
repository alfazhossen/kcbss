<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ResignationModel extends CI_Model {
    public function get($id = null)
	{
		$this->db->from('resignation');
		if ($id != null) {
			$this->db->where('resign_id', $id);
			$this->db->join('user', 'user.username=resignation.create_user');
		}
		$this->db->order_by('resign_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}
    public function add($post)
	{
		$params = [
			'subject'   	=> $post['subject'],
			'details'   	=> $post['details'],
			'create_date' 	=> date('Y-m-d H:i:s'),
			'create_user' 	=> $this->login->user_login()->username
		];
		$this->db->insert('resignation', $params);
	}

	public function approve($post)
	{
		$params = [
			'daily'   				=> $post['daily'],
			'office_cost'   		=> $post['office_cost'],
			'emg_deposit'   		=> $post['emg_deposit'],
			'total_amount_deposit' => (int)$post['daily']+ (int)$post['office_cost']+ (int)$post['emg_deposit'],
			'return_amount' 		=> $post['return_amount'],
			'total_balance' 		=>((int)$post['daily']+(int)$post['office_cost']+(int)$post['emg_deposit'])-(int)$post['return_amount'],
			'update_date' 			=> date('Y-m-d H:i:s'),
			'update_user' 			=> $this->login->user_login()->username
		];
		$this->db->where('resign_id', $post['resign_id']);
		$this->db->update('resignation', $params);
	}

    public function delete($id){
        $this->db->where('resignation_id', $id);
        $this->db->delete('resignation');
    }
}