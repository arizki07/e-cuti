    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Auth extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $model = array(
                'userModel' => 'usr',
            );

            foreach ($model as $file => $object_name) {
                $this->load->model($file, $object_name);
            }
            $this->load->library('session');
        }

        public function index()
        {
            $data['judul'] = "Login | E-CUTI";
            $this->load->view('auth/login1', $data);
        }

        public function ceklogin()
        {
            $user = $this->input->post('username', true);
            $pass = $this->input->post('password', true);
            $cek = $this->usr->proseslogin($user, $pass);

            if ($cek == 'error') {
                redirect(base_url() . 'Auth/index?st=error');
            } elseif ($cek == 'admin') {
                redirect(base_url() . 'Dashboard/admin');
            } elseif ($cek == 'hrd') {
                redirect(base_url() . 'Hrd/index');
            } elseif ($cek == 'karyawan') {
                redirect(base_url() . 'Karyawan/index');
            }
        }

        public function tambahUser()
        {
            // Fetch the total number of users
            $totalUsers = $this->usr->getTotalUsers();

            // Handle form submission
            if ($this->input->post('username')) {
                // Ambil data dari form
                $username = $this->input->post('username', true);
                $password = $this->input->post('password', true);
                $level = $this->input->post('level', true);

                // Panggil model untuk menambahkan user
                $result = $this->userModel->tambahUser($username, $password, $level);

                if ($result) {
                    // Jika berhasil, redirect ke halaman data user atau sesuai kebutuhan
                    redirect(base_url() . 'Dashboard/user');
                } else {
                    // Jika gagal, tampilkan pesan error atau lakukan tindakan yang sesuai
                    echo "Gagal menambahkan user.";
                }
            } else {
                // Pass the total number of users to the view
                $data['totalUsers'] = $totalUsers;

                // Tampilkan halaman tambah user
                $this->load->view('admin/data-user/tambah_user', $data);
            }
        }
        public function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url('Auth/login1'));
        }
    }
