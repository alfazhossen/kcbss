<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ResignationModel extends CI_Model {
    public function get($id = null)
	{
		$this->db->from('resignation');
		if ($id != null) {
			$this->db->where('resign_id', $id);
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

	public function edit($post)
	{
		$params = [
			'resignation'   	=> $post['resignation'],
			'update_date' 	=> date('Y-m-d H:i:s'),
			'update_user' 	=> $this->login->user_login()->username
		];
		$this->db->where('resignation_id', $post['resignation_id']);
		$this->db->update('resignation', $params);
	}
    public function delete($id){
        $this->db->where('resignation_id', $id);
        $this->db->delete('resignation');
    }
}