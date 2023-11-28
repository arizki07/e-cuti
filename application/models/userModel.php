<?php
defined('BASEPATH') or exit('No direct script access allowed');

class userModel extends CI_Model
{
    public function proseslogin($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('tbuser');
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        $query = $this->db->get();

        // Periksa apakah ada hasil kueri dan apakah hasilnya bukan boolean
        if ($query && $query->num_rows() > 0) {
            $userData = $query->row();
            // Set the username in the session
            $this->session->set_userdata('username', $userData->username);
            return $userData->level;
        } else {
            return 'error';
        }
    }

    public function getIduserdByUsername($username)
    {
        $this->db->select('id_user');
        $this->db->from('tbuser');
        $this->db->where('username', $username);
        $query = $this->db->get();

        if ($query === FALSE) {
            die($this->db->error());
        }

        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result['id_user'];
        } else {
            return null;
        }
    }

    public function tambahUser($username, $password, $level)
    {
        $data = array(
            'username' => $username,
            'password' => $password, // Pastikan menggunakan enkripsi seperti password_hash
            'level' => $level
        );

        $this->db->insert('tbuser', $data);

        return $this->db->affected_rows() > 0;
    }

    public function isHrd($userId)
    {
        // Lakukan query untuk mendapatkan data user berdasarkan ID
        $query = $this->db->get_where('tbuser', ['id_user' => $userId]);

        // Periksa apakah query berhasil
        if (!$query) {
            die($this->db->error()['message']); // Tampilkan pesan kesalahan jika query tidak berhasil
        }

        // Periksa apakah ada hasil
        if ($query->num_rows() > 0) {
            $user = $query->row();

            // Pastikan user memiliki peran HRD
            return $user->role == 'HRD';
        } else {
            return false;
        }
    }

    public function getTotalUsers()
    {
        return $this->db->count_all('tbuser'); // Replace 'your_users_table_name' with the actual table name
    }
}
