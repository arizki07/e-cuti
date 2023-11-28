<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cuti_model');
        $this->load->model('userModel');
    }

    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['hrd'] = "active";
        $data['judul'] = "Dashboard-HRD";

        // Ambil data cuti dari model
        $data['data_cuti'] = $this->cuti_model->getAllCuti();

        $this->load->view('hrd/dashboard', $data);
    }

    public function add()
    {
        $this->load->view('hrd/cuti/cuti');
    }

    public function updateStatus()
    {
        $cuti_id = $this->input->post('cuti_id');
        $status = $this->input->post('status');

        $hrd_username = $this->session->userdata('username');

        if ($this->userModel->isHrd($hrd_username)) {
            $new_status = ($status == 'approve') ? 1 : 2;
            $affected_rows = $this->cuti_model->updateStatusCuti($cuti_id, $new_status);

            if ($affected_rows > 0) {
                $this->session->set_flashdata('success', 'Status cuti berhasil diupdate.');
            } else {
                $this->session->set_flashdata('error', 'Update status cuti gagal: Tidak ada baris yang terpengaruh.');
            }
        } else {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk melakukan ini.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }


    public function insert_approve($cuti_id)
    {
        $data = $this->cuti_model->updateStatusCuti($cuti_id, 1);

        if ($data > 0) {
            $this->session->set_flashdata('success', "Leave Approved Successfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Leave Approve Failed.");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function insert_reject($cuti_id)
    {
        $data = $this->cuti_model->updateStatusCuti($cuti_id, 2);

        if ($data > 0) {
            $this->session->set_flashdata('success', "Leave Rejected Successfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Leave Reject Failed.");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function detailcuti()
    {
        $this->load->view('hrd/cuti/histori-cuti');
    }
}
