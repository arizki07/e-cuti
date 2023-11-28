<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model cuti_model.php
        $this->load->model('cuti_model');
        $this->load->model('userModel');
    }

    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['dashboard'] = "active";
        $data['judul'] = "Dashboard-Karyawan";
        $this->load->view('karyawan/dashboard', $data);
    }

    public function addcutii()
    {
        $data['addcuti'] = "active";
        $data['judul'] = "AddCuti";
        $this->load->view('karyawan/cuti', $data);
    }

    public function tambahCuti()
    {
        // Dapatkan username dari sesi
        $username = $this->session->userdata('username');

        // Dapatkan id_user dari userModel
        $id_user = $this->userModel->getIduserdByUsername($username);

        if ($id_user !== null) {
            // Memproses form cuti yang disubmit
            $data = array(
                'id_user' => $id_user, // Ganti 'id_user' menjadi 'user_id' sesuai field di tbcuti
                'bagian' => $this->input->post('bagian'),
                'stb' => $this->input->post('stb'),
                'alamat' => $this->input->post('alamat'),
                'tlpn' => $this->input->post('tlpn'),
                'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
                'tanggal_cuti' => $this->input->post('tanggal_cuti'),
                'jenis_cuti' => implode(',', $this->input->post('jenis_cuti')),
                'alasan' => $this->input->post('alasan'),
                'status' => 0, // Status default, misalnya "Diajukan"
            );

            $cuti_id = $this->cuti_model->insertCuti($data);

            if ($cuti_id) {
                redirect(base_url('karyawan/addcutii'));
            } else {
                $this->session->set_flashdata('error_message', 'Error while inserting data.');
                redirect(base_url('karyawan/addcutii'));
            }
        } else {
            $this->session->set_flashdata('error_message', 'User ID not found!');
            redirect(base_url('karyawan/addcutii'));
        }
    }

    public function detail()
    {
        // Get the username from the session
        $username = $this->session->userdata('username');

        // Get the id_user from the userModel
        $id_user = $this->userModel->getIduserdByUsername($username);

        // Get leave details for the user
        $data['data_cuti'] = $this->cuti_model->getCutiByUserId($id_user);

        $data['histori'] = "active";
        $data['judul'] = "HistoriCuti";
        $this->load->view('karyawan/histori-cuti', $data);
    }
}
