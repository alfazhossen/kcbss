<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectModel extends CI_Model {
    public function get($id = null)
	{
		$this->db->from('project');
		if ($id != null) {
			$this->db->where('project_id', $id);
		}
		$this->db->order_by('project_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}
    public function add($post)
	{
		$params = [
			'date'   		=> $post['date'],
			'project'   	=> $post['project'],
			'amount'   		=> $post['amount'],
			'note'   		=> $post['note'],
			'create_date' 	=> date('Y-m-d H:i:s'),
			'create_user' 	=> $this->login->user_login()->username
		];
		$this->db->insert('project', $params);
	}

	public function edit($post)
	{
		$params = [
			'date'   		=> $post['date'],
			'project'   	=> $post['project'],
			'amount'   		=> $post['amount'],
			'note'   		=> $post['note'],
			'update_date' 	=> date('Y-m-d H:i:s'),
			'update_user' 	=> $this->login->user_login()->username
		];
		$this->db->where('project_id', $post['project_id']);
		$this->db->update('project', $params);
	}
    public function delete($id){
        $this->db->where('project_id', $id);
        $this->db->delete('project');
    }
}