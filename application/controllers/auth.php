<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function Index()
    {
        $this->form_validation->set_rules('npwp', 'Npwp', 'trim|required');

        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login | DJP X UNAKI';
            $this->load->view('auth/templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/templates/auth_footer');
        } else {
            // Validasinya succeess
            $this->_login();
        }
    }

    private function _login()
    {
        $npwp = $this->input->post('npwp');
        $password = $this->input->post('password');

        // Bersihkan format NPWP
        $npwp_clean = preg_replace('/[^0-9]/', '', $npwp);

        // Validasi panjang NPWP
        if (strlen($npwp_clean) !== 15) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NPWP harus 15 digit angka!</div>');
            redirect('auth');
            return;
        }

        // Cek user di database dengan NPWP yang sudah dibersihkan
        $user = $this->db->get_where('user', ['npwp' => $npwp_clean])->row_array();

        // Jika user ada
        if ($user) {
            // Check Password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'npwp' => $user['npwp'],
                ];
                $this->session->set_userdata($data);
                redirect('informasi');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NPWP tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama_lengkap', 'required|trim');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required|trim|is_unique[user.npwp]|callback_validate_npwp', [
            'is_unique' => 'NPWP sudah terdaftar!',
            'validate_npwp' => 'NPWP harus 15 digit angka dan tidak boleh mengandung huruf atau simbol!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar Akun | DJP X UNAKI';
            $this->load->view('auth/templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('auth/templates/auth_footer');
        } else {
            $npwp = $this->input->post('npwp', true);
            $npwp = str_replace(['.', '-'], '', $npwp); // Hilangkan format NPWP untuk disimpan ke database

            $data_user = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'npwp' => $npwp,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'no_telpon' => htmlspecialchars($this->input->post('no_telpon', true)),
                'efin' => '1234567123',
            ];

            $data_form_index_a = [
                'npwp' => $npwp,
                'nama_wajib_pajak' => htmlspecialchars($this->input->post('nama_lengkap', true)),
            ];

            $data_form_index_b = [
                'npwp_user' => $npwp,
            ];

            $this->db->insert('user', $data_user);
            $this->db->insert('form_index_a', $data_form_index_a);
            $this->db->insert('form_index_b', $data_form_index_b);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, akun mu berhasil dibuat!</div>');
            redirect('auth');
        }
    }

    // Custom validation function untuk NPWP
    public function validate_npwp($npwp)
    {
        // Hapus semua karakter non-digit
        $npwp_cleaned = preg_replace('/[^0-9]/', '', $npwp);

        // Pastikan panjangnya 15 digit dan hanya mengandung angka
        if (strlen($npwp_cleaned) !== 15 || !ctype_digit($npwp_cleaned)) {
            $this->form_validation->set_message('validate_npwp', 'NPWP harus 15 digit angka dan tidak boleh mengandung huruf atau simbol!');
            return false;
        }

        return true;
    }

    public function logout()
    {
        $this->session->unset_userdata('npwp');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu sudah keluar!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
