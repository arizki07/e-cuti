<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cuti_model');
        $this->load->model('userModel');
    }

    public function admin()
    {
        $data['username'] = $this->session->userdata('username');

        $data['dashboard'] = "active";
        $data['judul'] = "Dashboard-Admin";
        $this->load->view('admin/dashboard', $data);
    }

    public function user()
    {
        $data['user'] = "active";
        $data['judul'] = "Data-User";
        $this->load->view('admin/data-user/index', $data);
    }

    public function cuti()
    {
        // Load the model (assuming you have a model named 'Cuti_model')
        $this->load->model('Cuti_model');

        // Fetch cuti data from the model
        $data['data_cuti'] = $this->cuti_model->getAllCuti();


        // Data for the 'cuti' view
        $data['judul'] = "Cuti-Index";

        // Load the 'admin/cuti/index' view with data
        $this->load->view('admin/cuti/index', $data);
    }
}
