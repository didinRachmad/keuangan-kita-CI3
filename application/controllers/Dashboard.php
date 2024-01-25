<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $bulan = date('n');
        $tahun = date('Y');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['title'] = 'Dashboard';
        $data['nama'] = $data['user']['namaUsaha'];
        $data['bulan'] = $this->Model_Keuangan->ambil_bulan($bulan);
        $data['total_debit'] = $this->Model_Keuangan->total_debit($user_id, $bulan, $tahun);
        $data['total_kredit'] = $this->Model_Keuangan->total_kredit($user_id, $bulan, $tahun);
        $data['total_saldo'] = $this->Model_Keuangan->total_saldo($user_id);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }
}
