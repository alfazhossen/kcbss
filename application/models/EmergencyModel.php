<?php defined('BASEPATH') OR exit('No direct script access allowed');

class EmergencyModel extends CI_Model {
    public function get($id = null)
	{
		$this->db->select('emergency.*');
		$this->db->from('emergency');
		if ($id != null) {
			$this->db->where('emergency_id', $id);
		}
		$this->db->order_by('emergency_id', 'DESC');
		$this->db->join('user', 'user.user_id = emergency.memberIdEmg');
		$query = $this->db->get();
		return $query;
	}
    public function add($post)
	{
		$params = [
			'date'   		=> $post['date'],
			'reason'   		=> $post['reason'],
			'memberIdEmg'   => $post['memberIdEmg'],
			'amount'   		=> $post['amount'],
			'note'   		=> $post['note'],
			'create_date' 	=> date('Y-m-d H:i:s'),
			'create_user' 	=> $this->login->user_login()->username
		];
		$this->db->insert('emergency', $params);
	}

	public function edit($post)
	{
		$params = [
			'date'   		=> $post['date'],
			'reason'   		=> $post['reason'],
			'memberIdEmg'   => $post['memberIdEmg'],
			'amount'   		=> $post['amount'],
			'note'   		=> $post['note'],
			'update_date' 	=> date('Y-m-d H:i:s'),
			'update_user' 	=> $this->login->user_login()->username
		];
		$this->db->where('emergency_id', $post['emergency_id']);
		$this->db->update('emergency', $params);
	}
    public function delete($id){
        $this->db->where('emergency_id', $id);
        $this->db->delete('emergency');
    }
}