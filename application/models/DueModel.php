<?php defined('BASEPATH') OR exit('No direct script access allowed');
class DueModel extends CI_Model {
    public function get($id = null)
	{
		$this->db->from('duedaily');
		if ($id != null) {
			$this->db->where('due_id', $id);
		}
		$this->db->order_by('due_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}
    public function getMonthly($id = null)
	{
		$this->db->from('duemonthly');
		if ($id != null) {
			$this->db->where('due_monthly_id', $id);
		}
		$this->db->order_by('due_monthly_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}
    public function totalDailyDue(){
        return $this->db->select_sum('total_due')->get('duedaily')->row()->total_due;
    }
    public function totalMonthlyDue(){
        return $this->db->select_sum('total_due')->get('duemonthly')->row()->total_due;
    }
    
}