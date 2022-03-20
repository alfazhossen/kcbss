<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Due extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['dueModel', 'user_model']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Daily Deposite Due';
        $data['titleMonthly'] = 'Office Cost Deposite Due';
        $data['row'] = $this->dueModel->get()->result();
        $data['monthly'] = $this->dueModel->getMonthly()->result();
        $data['totalDailyDue'] = $this->dueModel->totalDailyDue();
        $data['totalMonthlyDue'] = $this->dueModel->totalMonthlyDue();
        $this->template->load('template', 'due/due', $data);
    }
    public function add()
    {
        $data['title'] = 'Daily Due Process';
        $data['member'] = $this->user_model->getMember();
        $this->template->load('template', 'due/process', $data);
    }
    public function addMonthly()
    {
        $data['title'] = 'Office Cost Due Process';
        $data['member'] = $this->user_model->getMember();
        $this->template->load('template', 'due/processMonthly', $data);
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);

        if ($post['member_id'] != 'all') {
            $last_date = $this->db->select('date')->from('daily')->where('member_id', $post['member_id'])->order_by('daily_id', 'DESC')->limit(1)->get()->row()->date;
            $member = $this->db->select('name')->from('user')->where('username', $post['member_id'])->order_by('user_id', 'DESC')->limit(1)->get()->row()->name;
            $date_last = date('Y-m-d', strtotime($last_date));
            $date_today = date('Y-m-d', strtotime($post['process_date']));
            $datetime1 = new DateTime($date_last);
            $datetime2 = new DateTime($date_today);
            $interval = $datetime1->diff($datetime2);
            $param = [
                'process_date' => $date_today,
                'memberId' => $post['member_id'],
                'member' => $member,
                'last_pay_date' => $date_last,
                'total_due' => $interval->days * 150,
                'process_user' => $this->login->user_login()->name
            ];
            $entry = $this->db->where('memberId', $param['memberId'])->get('duedaily')->row();
            if ($entry == '') {
                $this->db->insert('duedaily', $param);
            } else {
                $this->db->where('due_id', $entry->due_id);
                $this->db->update('duedaily', $param);
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Your Data is successfully Process');
            }
            redirect('due');
        } else {
            $all_member = $this->user_model->getMember()->result();

            foreach ($all_member as $key) {
                $last_date = $this->db->select('date')->from('daily')->where('member_id', $key->username)->order_by('daily_id', 'DESC')->limit(1)->get()->row()->date;
                $date_last = date('Y-m-d', strtotime($last_date));
                $date_today = date('Y-m-d', strtotime($post['process_date']));
                $datetime1 = new DateTime($date_last);
                $datetime2 = new DateTime($date_today);
                $interval = $datetime1->diff($datetime2);
                $param = [
                    'process_date' => $date_today,
                    'memberId' => $key->username,
                    'member' => $key->name,
                    'last_pay_date' => $date_last,
                    'total_due' => $interval->days * 150,
                    'process_user' => $this->login->user_login()->name
                ];
                $entry = $this->db->where('memberId', $param['memberId'])->get('duedaily')->row();
                if ($entry == '') {
                    $this->db->insert('duedaily', $param);
                } else {
                    $this->db->where('due_id', $entry->due_id);
                    $this->db->update('duedaily', $param);
                }
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Your Data is successfully Process');
            }
            redirect('due');
        }
    }
    public function processMonthly()
    {
        $post = $this->input->post(null, TRUE);
        if ($post['member_id'] != 'all') {
            $last_date = $this->db->select('date')->from('monthly')->where('member_id', $post['member_id'])->order_by('monthly_id', 'DESC')->limit(1)->get()->row()->date;
            $member = $this->db->select('name')->from('user')->where('username', $post['member_id'])->order_by('user_id', 'DESC')->limit(1)->get()->row()->name;
            $date_last = date('Y-m-d', strtotime($last_date));
            $date_today = date('Y-m-d', strtotime($post['process_date']));
            $datetime1 = new DateTime($date_last);
            $datetime2 = new DateTime($date_today);
            $interval = $datetime1->diff($datetime2);
            $param = [
                'process_date' => $date_today,
                'memberId' => $post['member_id'],
                'member' => $member,
                'last_pay_date' => $date_last,
                'total_due' => round($interval->days/30)*100,
                'process_user' => $this->login->user_login()->name
            ];
            $entry = $this->db->where('memberId', $param['memberId'])->get('duemonthly')->row();
            if ($entry == '') {
                $this->db->insert('duemonthly', $param);
            } else {
                $this->db->where('due_monthly_id', $entry->due_id);
                $this->db->update('duemonthly', $param);
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Your Data is successfully Process');
            }
            redirect('due');
        } else {
            $all_member = $this->user_model->getMember()->result();
            foreach ($all_member as $key) {
                $last_date = $this->db->select('date')->from('monthly')->where('member_id', $key->username)->order_by('monthly_id', 'DESC')->limit(1)->get()->row()->date;
                $date_last = date('Y-m-d', strtotime($last_date));
                $date_today = date('Y-m-d', strtotime($post['process_date']));
                $datetime1 = new DateTime($date_last);
                $datetime2 = new DateTime($date_today);
                $interval = $datetime1->diff($datetime2);
                $param = [
                    'process_date' => $date_today,
                    'memberId' => $key->username,
                    'member' => $key->name,
                    'last_pay_date' => $date_last,
                    'total_due' => round($interval->days/30)*100,
                    'process_user' => $this->login->user_login()->name
                ];
                $entry = $this->db->where('memberId', $param['memberId'])->get('duemonthly')->row();
                if ($entry == '') {
                    $this->db->insert('duemonthly', $param);
                } else {
                    $this->db->where('due_monthly_id', $entry->due_monthly_id);
                    $this->db->update('duemonthly', $param);
                }
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Your Data is successfully Process');
            }
            redirect('due');
        }
    }
}
