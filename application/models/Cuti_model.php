<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertCuti($data)
    {
        // Validasi data sebelum penyisipan
        if (empty($data) || !is_array($data)) {
            return false;
        }

        // Pastikan semua nilai dalam $data adalah skalar (bukan array atau objek)
        foreach ($data as $value) {
            if (is_array($value) || is_object($value)) {
                return false;
            }
        }

        // Menambahkan data cuti ke dalam tabel cuti
        $this->db->insert('tbcuti', $data);

        // Mengembalikan ID dari data cuti yang baru saja dimasukkan
        return $this->db->insert_id();
    }

    public function updateStatusCuti($cuti_id, $status)
    {
        $data = array('status' => $status);
        $this->db->where('id', $cuti_id);
        $this->db->update('tbcuti', $data);

        return $this->db->affected_rows();
    }

    public function getCutiById($cuti_id)
    {
        // Mendapatkan data cuti berdasarkan ID
        $this->db->select('*');
        $this->db->from('tbcuti');
        $this->db->where('id', $cuti_id);
        $query = $this->db->get();

        return $query->row();
    }

    public function getAllCuti()
    {
        try {
            $query = $this->db->get('tbcuti');
            log_message('debug', 'Query: ' . $this->db->last_query()); // Tambahkan log untuk debug
            return $query->result();
        } catch (Exception $e) {
            log_message('error', 'Error: ' . $e->getMessage()); // Tambahkan log untuk error
            return false;
        }
    }

    public function getCutiByUserId($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->get('tbcuti')->result();
    }

    public function getPendingCuti()
    {
        // Mendapatkan data cuti yang belum di-"approve" atau "reject"
        $this->db->where('status', 0); // Anda mungkin perlu menyesuaikan status sesuai kebutuhan
        return $this->db->get('tbcuti')->result();
    }
}
