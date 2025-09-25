<?php
class Profile extends CI_Controller
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
        $data['laporan'] = $this->db->get('laporan')->result_array();

        // Format NPWP dengan pola: ##.###.###.#-###.###
        if (strlen($data['user']['npwp']) == 15) {
            $data['formatted_npwp'] = substr($data['user']['npwp'], 0, 2) . '.' .
                substr($data['user']['npwp'], 2, 3) . '.' .
                substr($data['user']['npwp'], 5, 3) . '.' .
                substr($data['user']['npwp'], 8, 1) . '-' .
                substr($data['user']['npwp'], 9, 3) . '.' .
                substr($data['user']['npwp'], 12, 3);
        } else {
            $data['formatted_npwp'] = $data['user']['npwp'];
        }

        $data['title'] = "Dashboard";

        $this->load->view('templates/header', $data);
        $this->load->view('profile', $data);
        $this->load->view('templates/footer');
    }
}
