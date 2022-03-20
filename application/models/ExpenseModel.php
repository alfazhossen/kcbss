<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ExpenseModel extends CI_Model {
    public function get($id = null)
	{
		$this->db->from('expense');
		if ($id != null) {
			$this->db->where('expense_id', $id);
		}
		$this->db->order_by('expense_id', 'DESC');
		$this->db->join('category', 'category.category_id = expense.categoryId');
		$query = $this->db->get();
		return $query;
	}
    public function add($post)
	{
		$params = [
			'date'   		=> $post['date'],
			'categoryId'   	=> $post['categoryId'],
			'amount'   		=> $post['amount'],
			'note'   		=> $post['note'],
			'create_date' 	=> date('Y-m-d H:i:s'),
			'create_user' 	=> $this->login->user_login()->username
		];
		$this->db->insert('expense', $params);
	}

	public function edit($post)
	{
		$params = [
			'date'   		=> $post['date'],
			'categoryId'   	=> $post['categoryId'],
			'amount'   		=> $post['amount'],
			'note'   		=> $post['note'],
			'update_date' 	=> date('Y-m-d H:i:s'),
			'update_user' 	=> $this->login->user_login()->username
		];
		$this->db->where('expense_id', $post['expense_id']);
		$this->db->update('expense', $params);
	}
    public function delete($id){
        $this->db->where('expense_id', $id);
        $this->db->delete('expense');
    }
}