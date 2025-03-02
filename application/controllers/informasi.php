<?php
class Informasi extends CI_Controller
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

        $data['title'] = "Informasi";

        $this->load->view('templates/header', $data);
        $this->load->view('informasi', $data);
        $this->load->view('templates/footer');
    }


    public function update_profile()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $email = $this->input->post('email');
        $no_telpon = $this->input->post('no_telpon');

        // Validasi input
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak valid!</div>');
            redirect('informasi');
        } else {
            $data = [
                'email' => $email,
                'no_telpon' => $no_telpon
            ];

            $this->db->where('npwp', $npwp);
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil diperbarui!</div>');
            redirect('informasi');
        }
    }
}
