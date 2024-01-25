<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Keuangan extends CI_Model
{

    // Dashboard Punya
    public function ambil_bulan($bulan)
    {
        $data = array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );

        return $data[$bulan];
    }

    public function total_saldo($id)
    {
        $tahun = date('Y');

        // Total Debit
        $query_debit = "SELECT SUM(total_transaksi) as total_debit FROM debit WHERE user_id = $id AND YEAR(tanggal_transaksi) = $tahun";
        $result_debit = $this->db->query($query_debit)->row_array();
        $total_debit = $result_debit['total_debit'];

        // Total Kredit
        $query_kredit = "SELECT SUM(total_transaksi) as total_kredit FROM kredit WHERE user_id = $id AND YEAR(tanggal_transaksi) = $tahun";
        $result_kredit = $this->db->query($query_kredit)->row_array();
        $total_kredit = $result_kredit['total_kredit'];

        // Hitung Total Saldo
        $total_saldo = $total_kredit - $total_debit;

        return $total_saldo;
    }

    public function get_debit($id, $bulan, $tahun)
    {
        $query = "SELECT id, keterangan, tanggal_transaksi, total_transaksi FROM debit  
                WHERE user_id = $id && MONTH(tanggal_transaksi) = $bulan && YEAR(tanggal_transaksi) = $tahun";
        return $this->db->query($query)->result_array();
    }

    public function edit_debit($user_id, $id)
    {
        $query = "SELECT keterangan, tanggal_transaksi, total_transaksi FROM debit  
                WHERE id = $id and user_id = $user_id";
        return $this->db->query($query)->result_array();
    }

    public function get_kredit($id, $bulan, $tahun)
    {
        $query = "SELECT id, keterangan, tanggal_transaksi, total_transaksi FROM kredit  
                WHERE user_id = $id && MONTH(tanggal_transaksi) = $bulan && YEAR(tanggal_transaksi) = $tahun";
        return $this->db->query($query)->result_array();
    }

    public function kredit_pdf($id, $bulan, $tahun)
    {
        $query = "SELECT id, SUM(total_transaksi) as total_transaksi, tanggal_transaksi, COUNT(keterangan) as input, keterangan FROM kredit WHERE user_id = $id && MONTH(tanggal_transaksi) = $bulan && YEAR(tanggal_transaksi) = $tahun 
        GROUP BY keterangan, DAY(tanggal_transaksi) ORDER BY id DESC";
        return $this->db->query($query)->result_array();
    }

    public function total_kredit($id, $bulan, $tahun)
    {
        $query = "SELECT sum(total_transaksi) as total_transaksi from kredit where user_id = $id && MONTH(tanggal_transaksi) = $bulan && YEAR(tanggal_transaksi) = $tahun";
        return $this->db->query($query)->row_array();
    }

    public function debit_pdf($id, $bulan, $tahun)
    {
        $query = "SELECT id,  SUM(total_transaksi) as total_transaksi, tanggal_transaksi, COUNT(keterangan) as input, keterangan FROM debit WHERE user_id = $id && MONTH(tanggal_transaksi) = $bulan && YEAR(tanggal_transaksi) = $tahun 
        GROUP BY keterangan, DAY(tanggal_transaksi) ORDER BY id DESC";
        return $this->db->query($query)->result_array();
    }

    public function total_debit($id, $bulan, $tahun)
    {
        $query = "SELECT sum(total_transaksi) as total_transaksi from debit where user_id = $id && MONTH(tanggal_transaksi) = $bulan && YEAR(tanggal_transaksi) = $tahun";
        return $this->db->query($query)->row_array();
    }
}
