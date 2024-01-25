<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
    public function kredit()
    {
        if ($this->session->userdata('bulanJual')) {
            $bulan =  $this->session->userdata('bulanJual');
        } else {
            $bulan = date('n');
        }
        if ($this->session->userdata('tahunJual')) {
            $tahun = $this->session->userdata('tahunJual');
        } else {
            $tahun = date('Y');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Kredit Produk';
        $data['kredit'] = $this->Model_Keuangan->get_kredit($user_id, $bulan, $tahun);


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('kredit/kredit', $data);
        $this->load->view('template/footer');
    }

    public function cariKredit()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = [
            'bulanJual' => $bulan,
            'tahunJual' => $tahun
        ];
        $this->session->set_userdata($data);
        redirect('keuangan/kredit');
    }

    public function tambah_kredit()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Tambah Debit';
        $keterangan = $this->input->post('keterangan');
        $tanggal_transaksi = date('Y-m-d', strtotime($this->input->post('tanggal_transaksi')));
        $total_transaksi = str_replace('.', '', $this->input->post('total_transaksi'));
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'Harap isi Keterangan'
        ]);
        $this->form_validation->set_rules('tanggal_transaksi', 'tanggal_transaksi', 'required', [
            'required' => 'Harap isi tanggal transaksi'
        ]);
        $this->form_validation->set_rules('total_transaksi', 'total_transaksi', 'required', [
            'required' => 'Harap isi total transaksi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('kredit/tambah_kredit', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'user_id' => $user_id,
                'keterangan' => $keterangan,
                'tanggal_transaksi' => $tanggal_transaksi,
                'total_transaksi' => $total_transaksi
            ];

            $this->db->insert('kredit', $data);
            $this->session->set_flashdata('pesan', 'Tambah Data kredit');
            redirect('keuangan/kredit');
        }
    }

    public function debit()
    {
        if ($this->session->userdata('bulanBeli')) {
            $bulan =  $this->session->userdata('bulanBeli');
        } else {
            $bulan = date('n');
        }
        if ($this->session->userdata('tahunBeli')) {
            $tahun = $this->session->userdata('tahunBeli');
        } else {
            $tahun = date('Y');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Debit Produk';
        $data['debit'] = $this->Model_Keuangan->get_debit($user_id, $bulan, $tahun);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('debit/debit', $data);
        $this->load->view('template/footer');
    }

    public function cariDebit()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = [
            'bulanBeli' => $bulan,
            'tahunBeli' => $tahun
        ];
        $this->session->set_userdata($data);
        redirect('keuangan/debit');
    }

    public function tambah_debit()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Tambah Debit';
        $keterangan = $this->input->post('keterangan');
        $tanggal_transaksi = date('Y-m-d', strtotime($this->input->post('tanggal_transaksi')));
        $total_transaksi = str_replace('.', '', $this->input->post('total_transaksi'));
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'Harap isi Keterangan'
        ]);
        $this->form_validation->set_rules('tanggal_transaksi', 'tanggal_transaksi', 'required', [
            'required' => 'Harap isi tanggal transaksi'
        ]);
        $this->form_validation->set_rules('total_transaksi', 'total_transaksi', 'required', [
            'required' => 'Harap isi total transaksi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('debit/tambah_debit', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'user_id' => $user_id,
                'keterangan' => $keterangan,
                'tanggal_transaksi' => $tanggal_transaksi,
                'total_transaksi' => $total_transaksi
            ];

            $this->db->insert('debit', $data);
            $this->session->set_flashdata('pesan', 'Tambah Data debit');
            redirect('keuangan/debit');
        }
    }

    public function edit_debit($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Edit Debit';
        $keterangan = $this->input->post('keterangan');
        $tanggal_transaksi = date('Y-m-d', strtotime($this->input->post('tanggal_transaksi')));
        $total_transaksi = str_replace('.', '', $this->input->post('total_transaksi'));
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'Harap isi Keterangan'
        ]);
        $this->form_validation->set_rules('tanggal_transaksi', 'tanggal_transaksi', 'required', [
            'required' => 'Harap isi tanggal transaksi'
        ]);
        $this->form_validation->set_rules('total_transaksi', 'total_transaksi', 'required', [
            'required' => 'Harap isi total transaksi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['edit_debit'] = $this->Model_Keuangan->edit_debit($user_id, $id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('debit/edit_debit', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'keterangan' => $keterangan,
                'tanggal_transaksi' => $tanggal_transaksi,
                'total_transaksi' => $total_transaksi
            ];

            // Contoh kondisi WHERE untuk mengupdate berdasarkan user_id dan id tertentu
            $where = [
                'user_id' => $user_id,
                'id' => $id // Ganti dengan kolom kunci utama yang sesuai
            ];

            $this->db->where($where);
            $this->db->update('debit', $data);
            $this->session->set_flashdata('pesan', 'Update Data debit');
            redirect('keuangan/debit');
        }
    }

    public function hapus_debit($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];

        $where = [
            'user_id' => $user_id,
            'id' => $id
        ];

        $this->db->where($where);
        $this->db->delete('debit');
        $this->session->set_flashdata('pesan', 'Hapus Data Debit');
        redirect('keuangan/debit');
    }

    // Cetak PDF
    public function kreditToPdf()
    {
        if ($this->session->userdata('bulanJual')) {
            $bulan =  $this->session->userdata('bulanJual');
        } else {
            $bulan = date('n');
        }
        if ($this->session->userdata('tahunJual')) {
            $tahun = $this->session->userdata('tahunJual');
        } else {
            $tahun = date('Y');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $this->load->library('dompdf_gen');
        $data['laporan'] = $this->Model_Keuangan->kredit_pdf($user_id, $bulan, $tahun);
        $data['bulan'] = $this->Model_Keuangan->ambil_bulan($bulan);
        $data['tahun'] = $tahun;
        $data['total'] = $this->Model_Keuangan->total_kredit($user_id, $bulan, $tahun);
        $this->load->view('kredit/laporan_pdf', $data);
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render('');
        $this->dompdf->stream('laporan_kredit.pdf', array('Attachment' => 0));
    }

    // Cetak PDF
    public function debitToPdf()
    {
        if ($this->session->userdata('bulanJual')) {
            $bulan =  $this->session->userdata('bulanJual');
        } else {
            $bulan = date('n');
        }
        if ($this->session->userdata('tahunJual')) {
            $tahun = $this->session->userdata('tahunJual');
        } else {
            $tahun = date('Y');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $this->load->library('dompdf_gen');
        $data['laporan'] = $this->Model_Keuangan->debit_pdf($user_id, $bulan, $tahun);
        $data['bulan'] = $this->Model_Keuangan->ambil_bulan($bulan);
        $data['tahun'] = $tahun;
        $data['total'] = $this->Model_Keuangan->total_debit($user_id, $bulan, $tahun);
        $this->load->view('debit/laporan_pdf', $data);
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render('');
        $this->dompdf->stream('laporan_debit.pdf', array('Attachment' => 0));
    }
}
