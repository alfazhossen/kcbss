<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ProfitModel extends CI_Model {
    public function get($id = null)
	{
		$this->db->select('profit.*, project.project as project');
		$this->db->from('profit');
		if ($id != null) {
			$this->db->where('profit_id', $id);
		}
		$this->db->order_by('profit_id', 'DESC');
		$this->db->join('project', 'project.project_id = profit.projectId');
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
		$this->db->insert('profit', $params);
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
		$this->db->where('profit_id', $post['profit_id']);
		$this->db->update('profit', $params);
	}
    public function delete($id){
        $this->db->where('profit_id', $id);
        $this->db->delete('profit');
    }
}