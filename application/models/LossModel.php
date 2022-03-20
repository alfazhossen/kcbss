<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LossModel extends CI_Model {
    public function get($id = null)
	{
		$this->db->select('loss.*, project.project');
		$this->db->from('loss');
		if ($id != null) {
			$this->db->where('loss_id', $id);
		}
		$this->db->order_by('loss_id', 'DESC');
		$this->db->join('project', 'project.project_id = loss.projectId');
		$query = $this->db->get();
		return $query;
	}
    public function add($post)
	{
		$params = [
			'date'   		=> $post['date'],
			'projectId'   	=> $post['projectId'],
			'amount'   		=> $post['amount'],
			'note'   		=> $post['note'],
			'create_date' 	=> date('Y-m-d H:i:s'),
			'create_user' 	=> $this->login->user_login()->username
		];
		$this->db->insert('loss', $params);
	}

	public function edit($post)
	{
		$params = [
			'date'   		=> $post['date'],
			'projectId'   	=> $post['projectId'],
			'amount'   		=> $post['amount'],
			'note'   		=> $post['note'],
			'update_date' 	=> date('Y-m-d H:i:s'),
			'update_user' 	=> $this->login->user_login()->username
		];
		$this->db->where('loss_id', $post['loss_id']);
		$this->db->update('loss', $params);
	}
    public function delete($id){
        $this->db->where('loss_id', $id);
        $this->db->delete('loss');
    }
}