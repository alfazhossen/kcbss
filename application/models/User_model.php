<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('user');
		if ($id != null) {
			$this->db->where('user_id', $id);
		}
		$this->db->order_by('username', 'asc');
		$query = $this->db->get();
		return $query;
	}
	public function getMember()
	{
		$this->db->from('user');
		$this->db->where('level', 2);
		$this->db->order_by('user_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		if (isset($_FILES['user_image']['name'])) {
			$prev_photo = $this->input->post('user_image');
			$photo = $_FILES['user_image']['name'];
			$photo_type = $_FILES['user_image']['type'];

			if ($photo != "") {
				if (
					$photo_type == 'image/jpeg' || $photo_type == 'image/pjpeg' ||
					$photo_type == 'image/jpg' || $photo_type == 'image/png' ||
					$photo_type == 'image/x-png' || $photo_type == 'image/gif'
				) {

					$destination = 'assets/images/user/';

					$file_type = explode(".", $photo);
					$extension = strtolower($file_type[count($file_type) - 1]);
					$photo_path = 'user-' . time() . '.' . $extension;

					move_uploaded_file($_FILES['user_image']['tmp_name'], $destination . $photo_path);
					$params['user_image'] = $photo_path;
				}
			}
		}

		$params['name'] 		= $post['name'];
		$params['username'] 	= $post['username'];
		$params['password'] 	= sha1($post['password']);
		$params['email'] 		= $post['email'];
		$params['phone'] 		= $post['phone'];
		$params['nid'] 			= $post['nid'];
		$params['address'] 		= $post['address'];
		$params['level'] 		= 2;
		$params['create_date'] 	= date('Y-m-d H:i:s');

		$this->db->insert('user', $params);
	}

	public function edit($post)
	{
		if (isset($_FILES['user_image']['name'])) {
			$prev_photo = $this->input->post('user_image');
			$photo = $_FILES['user_image']['name'];
			$photo_type = $_FILES['user_image']['type'];

			if ($photo != "") {
				if (
					$photo_type == 'image/jpeg' || $photo_type == 'image/pjpeg' ||
					$photo_type == 'image/jpg' || $photo_type == 'image/png' ||
					$photo_type == 'image/x-png' || $photo_type == 'image/gif'
				) {

					$destination = 'assets/images/user/';

					$file_type = explode(".", $photo);
					$extension = strtolower($file_type[count($file_type) - 1]);
					$photo_path = 'user-' . time() . '.' . $extension;

					move_uploaded_file($_FILES['user_image']['tmp_name'], $destination . $photo_path);
					$params['user_image'] = $photo_path;
				}
			}
		}
		$params['name'] = $post['name'];
		$params['username'] = $post['username'];
		$params['email'] = $post['email'];
		$params['nid'] 			= $post['nid'];
		$params['phone'] = $post['phone'];
		$params['address'] = $post['address'];
		if (!empty($post['password'])) {
			$params['password'] = sha1($post['password']);
		}
		$params['update_date'] 	= date('Y-m-d H:i:s');
		$this->db->where('user_id', $post['user_id']);
		$this->db->update('user', $params);
	}
	public function edit_photo($post){
		if (isset($_FILES['user_image']['name'])) {
			$prev_photo = $this->input->post('user_image');
			$photo = $_FILES['user_image']['name'];
			$photo_type = $_FILES['user_image']['type'];

			if ($photo != "") {
				if (
					$photo_type == 'image/jpeg' || $photo_type == 'image/pjpeg' ||
					$photo_type == 'image/jpg' || $photo_type == 'image/png' ||
					$photo_type == 'image/x-png' || $photo_type == 'image/gif'
				) {

					$destination = 'assets/images/user/';

					$file_type = explode(".", $photo);
					$extension = strtolower($file_type[count($file_type) - 1]);
					$photo_path = 'user-' . time() . '.' . $extension;

					move_uploaded_file($_FILES['user_image']['tmp_name'], $destination . $photo_path);
					$params['user_image'] = $photo_path;
				}
			}
		}
		$this->db->where('user_id', $this->login->user_login()->user_id);
		$this->db->update('user', $params);
	}

	public function delete($id)
	{
	    $params['deleted'] 	    = 1;
	    $params['deleted_by'] 	= $this->login->user_login()->username;
	    $params['deleted_date'] = date('Y-m-d H:i:s');
		$this->db->where('user_id', $id);
		$this->db->update('user', $params);
	}
	
}
