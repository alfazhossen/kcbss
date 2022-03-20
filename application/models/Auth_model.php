<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $post['username']);
		$this->db->where('password',sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}

	public function get($id = null)
	{
		$this->db->from('user');
		if($id != null){
			$this->db->where('user_id', $id);
		}
		$this->db->order_by('user_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}
}