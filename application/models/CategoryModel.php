<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {
    public function get($id = null)
	{
		$this->db->from('category');
		if ($id != null) {
			$this->db->where('category_id', $id);
		}
		$this->db->order_by('category_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}
    public function add($post)
	{
		$params = [
			'category'   	=> $post['category'],
			'create_date' 	=> date('Y-m-d H:i:s'),
			'create_user' 	=> $this->login->user_login()->username
		];
		$this->db->insert('category', $params);
	}

	public function edit($post)
	{
		$params = [
			'category'   	=> $post['category'],
			'update_date' 	=> date('Y-m-d H:i:s'),
			'update_user' 	=> $this->login->user_login()->username
		];
		$this->db->where('category_id', $post['category_id']);
		$this->db->update('category', $params);
	}
    public function delete($id){
        $this->db->where('category_id', $id);
        $this->db->delete('category');
    }
}