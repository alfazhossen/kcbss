<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DailyDepositeModel extends CI_Model {
    public function get($id = null)
	{
		return $this->db->from('daily')->join('user', 'user.username = daily.member_id')->get();
	}
    public function add($post)
	{
	    if($post['amount']%$post['fixt_amount']==0){
    		$total_row = $post['amount']/$post['fixt_amount'];
    		for($i=0;$i<$total_row;$i++){
    			$date =$this->db->select('date')->where('member_id',$post['member_id'])->order_by('daily_id','DESC')->limit(1)->get('daily')->row()->date;
    			if(!$date){
    				$date = date("Y-m-d", strtotime("2018-01-31"));
    			}
    			$params = [
    				'date'   		=> date("Y-m-d", strtotime('+1 days', strtotime($date))),
    				'member_id'   	=> $post['member_id'],
    				'fixt_amount'	=> $post['fixt_amount'],
    				'amount'   		=> $post['fixt_amount'],
    				'send_amount'   => $post['amount'],
    				'craete_date' 	=> date('Y-m-d H:i:s'),
    				'create_user' 	=> $this->login->user_login()->username
    			];
    			$this->db->insert('daily', $params);
    		}
	    }else{
	        $this->session->set_flashdata('error', 'please check fixt amount & deposite amount');
	        redirect('dailyDeposite/add');
	    }
		
	}

	public function edit($post)
	{
		$params = [
			'date'   		=> $post['date'],
			'member_id'   	=> $post['member_id'],
			'amount'   		=> $post['amount'],
			'update_date' 	=> date('Y-m-d H:i:s'),
			'update_user' 	=> $this->login->user_login()->username
		];
		$this->db->where('daily_id', $post['daily_id']);
		$this->db->update('daily', $params);
	}
    public function delete($id){
        $this->db->where('daily_id', $id);
        $this->db->delete('daily');
    }
}