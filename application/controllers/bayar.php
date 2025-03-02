<?php
class Bayar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }

    public function index()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $data['user'] = $this->db->get_where('user', ['npwp' => $npwp])->row_array();
        $data['laporan'] = $this->db->get('laporan')->result_array(); // Mengambil semua data laporan

        $data['title'] = "Bayar";

        $this->load->view('templates/header', $data);
        $this->load->view('bayar', $data);
        $this->load->view('templates/footer');
    }
}
