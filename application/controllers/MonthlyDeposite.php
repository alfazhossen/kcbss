<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MonthlyDeposite extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['monthlyDepositeModel','user_model']);
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] = 'Office Cost Deposite';
        $data['row'] = $this->monthlyDepositeModel->get()->result();
		$this->template->load('template', 'monthly_deposite/monthly', $data);
	}
    public function add()
	{
		$data['title'] = 'Add Office Cost Deposite';
        $data['member'] = $this->user_model->getMember();
        $this->template->load('template', 'monthly_deposite/add_monthly', $data);
	}
    public function addProcess(){
        $post = $this->input->post(null, TRUE);
        $this->monthlyDepositeModel->add($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully Saved');
        }
        redirect('monthlyDeposite');
    }
    public function edit($id)
	{
		$data['title'] = 'Edit Office Cost Deposite';
        $data['member'] = $this->user_model->getMember();
        $data['row'] = $this->monthlyDepositeModel->get($id)->row();
        $this->template->load('template', 'monthly_deposite/edit_monthly', $data);
	}
    public function editProcess(){
        $post = $this->input->post(null, TRUE);
        $this->monthlyDepositeModel->edit($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully updated');
        }
        redirect('monthlyDeposite');
    }
    public function delete($id){
        $this->monthlyDepositeModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Your Data is successfully deleted');
        } 
        redirect('monthlyDeposite');
    }
    public function showMonthly()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search= $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";
        if(!empty($order))
        {
            foreach($order as $o)
            {
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }

        if($dir != "asc" && $dir != "desc")
        {
            $dir = "desc";
        }
        $valid_columns = array(
            0=>'monthly_id',
            1=>'date',
            2=>'member_id',
            3=>'amount',
        );
        if(!isset($valid_columns[$col]))
        {
            $order = null;
        }
        else
        {
            $order = $valid_columns[$col];
        }
        if($order !=null)
        {
            $this->db->order_by($order, $dir);
        }
        
        if(!empty($search))
        {
            $x=0;
            foreach($valid_columns as $sterm)
            {
                if($x==0)
                {
                    $this->db->like($sterm,$search);
                }
                else
                {
                    $this->db->or_like($sterm,$search);
                }
                $x++;
            }                 
        }
        $this->db->limit($length,$start);
        $employees = $this->db->get("monthly");
        $data = array();
        $n = 1;
        foreach($employees->result() as $rows)
        {

            $data[]= array(
                $n++,
                date("d/m/Y", strtotime($rows->date)),
                $rows->member_id,
                $rows->amount,
                '<a href='."'".base_url('monthlyDeposite/edit/' . $rows->monthly_id)."'".' class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                <a href='."'".base_url('monthlyDeposite/delete/' . $rows->monthly_id)."'".' class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>'
            );     
        }
        $total_employees = $this->totalEmployees();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }
    public function totalEmployees()
    {
        $query = $this->db->select("COUNT(*) as num")->get("monthly");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
}