<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load form model
        $this->load->model('form_model');
    }

    public function index()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        // Ambil data tabel lain
        $data['user'] = $this->db->get_where('user', ['npwp' => $npwp])->row_array();
        $data['form_empat_b'] = $this->db->get_where('form-empat-b', ['npwp_user' => $npwp])->row_array();

        // Ambil total penghasilan_neto_c dari form-lima-c
        $this->db->select_sum('penghasilan_neto_c');
        $this->db->where('npwp_user', $npwp);
        $data['total_penghasilan_neto_c'] = $this->db->get('form-lima-c')->row()->penghasilan_neto_c ?? 0;

        // Ambil total penghasilan_neto_d dari form-lima-d
        $this->db->select_sum('penghasilan_neto_d');
        $this->db->where('npwp_user', $npwp);
        $data['total_penghasilan_neto_d'] = $this->db->get('form-lima-d')->row()->penghasilan_neto_d ?? 0;

        // Ambil total jumlah_pph_yang_dipotong dari form-tiga
        $this->db->select_sum('jumlah_pph_yang_dipotong');
        $this->db->where('npwp_user', $npwp);
        $data['total_jumlah_pph_yang_dipotong'] = $this->db->get('form-tiga')->row()->jumlah_pph_yang_dipotong ?? 0;

        // Ambil data form_index_a, jika tidak ditemukan, inisialisasi dengan array kosong
        $form_index_a = $this->db->get_where('form_index_a', ['npwp' => $npwp])->row_array();
        if (!$form_index_a) {
            $form_index_a = [
                'npwp' => '',
                'nama_wajib_pajak' => '',
                'jenis_usaha_pekerjaan_bebas' => '',
                'klu' => '',
                'no_telepon_faksimili' => '',
                'fax' => '',
                'status_kewajiban_perpajakan' => '',
                'npwp_suami_istri' => ''
            ];
        }

        // Format NPWP untuk tampilan
        if (!empty($form_index_a['npwp'])) {
            $form_index_a['npwp'] = $this->format_npwp($form_index_a['npwp']);
        }

        // Ambil data form_index_b, jika tidak ditemukan, inisialisasi dengan array kosong
        $form_index_b = $this->db->get_where('form_index_b', ['npwp_user' => $npwp])->row_array();
        if (!$form_index_b) {
            $form_index_b = [
                'a1' => '',
                'a2' => '',
                'a3' => '',
                'a4' => '',
                'a5' => '',
                'a6' => '',
                'a7' => '',
                'b8' => '',
                'b9' => '',
                'b10' => '',
                'b10_radio' => '',
                'b11' => '',
                'b11_option' => '',
                'c12' => '',
                'c12_checkbox' => '',
                'c13' => '',
                'c14' => '',
                'd15' => '',
                'd16' => '',
                'd16_option' => '',
                'd17_a' => '',
                'd17_b' => '',
                'd18' => '',
                'e19' => '',
                'e19_option' => '',
                'tgl_lunas' => '',
                'e20_checkbox_a' => '',
                'e20_checkbox_b' => '',
                'e20_checkbox_c' => '',
                'e20_checkbox_d' => '',
                'f21' => '',
                'f21_checkbox_a' => '',
                'f21_checkbox_b' => '',
                'f21_checkbox_c' => '',
                'g_checkbox_a' => '',
                'g_checkbox_b' => '',
                'g_checkbox_c' => '',
                'g_checkbox_d' => '',
                'g_checkbox_e' => '',
                'g_checkbox_f' => '',
                'g_checkbox_g' => '',
                'g_checkbox_h' => '',
                'g_checkbox_i' => '',
                'g_checkbox_j' => '',
                'g_checkbox_k' => '',
                'g_checkbox_l' => '',
                'tanggal' => ''
            ];
        }

        // Jika c12_checkbox tidak dicentang, set nilai c12 ke 0
        if ($form_index_b['c12_checkbox'] !== '1') {
            $form_index_b['c12'] = 0;
        }

        $data['form_index_a'] = $form_index_a;
        $data['form_index_b'] = $form_index_b;

        $this->load->view('form/form_view', $data);
    }

    public function update()
    {
        $npwp_session = $this->session->userdata('npwp');
        if (!$npwp_session) {
            redirect('auth');
        }

        // Ambil data dari form
        $postData = $this->input->post();

        // Bersihkan input NPWP
        $postData['npwp'] = preg_replace('/[^0-9]/', '', $postData['npwp'] ?? '');

        // Validasi panjang NPWP
        if (strlen($postData['npwp']) !== 15) {
            die('NPWP harus 15 digit');
        }

        // Bersihkan nilai b10 dari simbol non-numerik
        $postData['b10'] = preg_replace('/[^0-9]/', '', $postData['b10'] ?? '');

        // Atur nilai checkbox yang tidak dicentang menjadi 0
        $checkboxes = [
            'c12_checkbox',
            'e20_checkbox_a',
            'e20_checkbox_b',
            'e20_checkbox_c',
            'e20_checkbox_d',
            'f21_checkbox_a',
            'f21_checkbox_b',
            'f21_checkbox_c',
            'g_checkbox_a',
            'g_checkbox_b',
            'g_checkbox_c',
            'g_checkbox_d',
            'g_checkbox_e',
            'g_checkbox_f',
            'g_checkbox_g',
            'g_checkbox_h',
            'g_checkbox_i',
            'g_checkbox_j',
            'g_checkbox_k',
            'g_checkbox_l'
        ];

        foreach ($checkboxes as $checkbox) {
            $postData[$checkbox] = isset($postData[$checkbox]) ? 1 : 0;
        }

        // Hapus field 'action' dari data yang akan diupdate
        unset($postData['action']);

        // Data untuk form_index_a
        $form_index_a_data = [
            'npwp' => $postData['npwp'] ?? '',
            'nama_wajib_pajak' => $postData['nama_wajib_pajak'] ?? '',
            'jenis_usaha_pekerjaan_bebas' => $postData['jenis_usaha_pekerjaan_bebas'] ?? '',
            'klu' => $postData['klu'] ?? '',
            'no_telepon_faksimili' => $postData['no_telepon_faksimili'] ?? '',
            'fax' => $postData['fax'] ?? '',
            'status_kewajiban_perpajakan' => $postData['status_kewajiban_perpajakan'] ?? '',
            'npwp_suami_istri' => $postData['npwp_suami_istri'] ?? ''
        ];

        // Update data ke form_index_a
        $this->db->where('npwp', $npwp_session);
        $this->db->update('form_index_a', $form_index_a_data);

        // Data untuk form_index_b
        $form_index_b_data = [
            'a1' => $postData['a1'] ?? '',
            'a2' => $postData['a2'] ?? '',
            'a3' => $postData['a3'] ?? '',
            'a4' => $postData['a4'] ?? '',
            'a5' => $postData['a5'] ?? '',
            'a6' => $postData['a6'] ?? '',
            'a7' => $postData['a7'] ?? '',
            'b8' => $postData['b8'] ?? '',
            'b9' => $postData['b9'] ?? '',
            'b10' => $postData['b10'] ?? '',
            'b10_radio' => $postData['b10_radio'] ?? '',
            'b11' => $postData['b11'] ?? '',
            'b11_option' => $postData['b11_option'] ?? '',
            'c12' => $postData['c12'] ?? '',
            'c12_checkbox' => $postData['c12_checkbox'] ?? '',
            'c13' => $postData['c13'] ?? '',
            'c14' => $postData['c14'] ?? '',
            'd15' => $postData['d15'] ?? '',
            'd16' => $postData['d16'] ?? '',
            'd16_option' => $postData['d16_option'] ?? '',
            'd17_a' => $postData['d17_a'] ?? '',
            'd17_b' => $postData['d17_b'] ?? '',
            'd18' => $postData['d18'] ?? '',
            'e19' => $postData['e19'] ?? '',
            'e19_option' => $postData['e19_option'] ?? '',
            'tgl_lunas' => $postData['tgl_lunas'] ?? '',
            'e20_checkbox_a' => $postData['e20_checkbox_a'] ?? '',
            'e20_checkbox_b' => $postData['e20_checkbox_b'] ?? '',
            'e20_checkbox_c' => $postData['e20_checkbox_c'] ?? '',
            'e20_checkbox_d' => $postData['e20_checkbox_d'] ?? '',
            'f21' => $postData['f21'] ?? '',
            'f21_checkbox_a' => $postData['f21_checkbox_a'] ?? '',
            'f21_checkbox_b' => $postData['f21_checkbox_b'] ?? '',
            'f21_checkbox_c' => $postData['f21_checkbox_c'] ?? '',
            'g_checkbox_a' => $postData['g_checkbox_a'] ?? '',
            'g_checkbox_b' => $postData['g_checkbox_b'] ?? '',
            'g_checkbox_c' => $postData['g_checkbox_c'] ?? '',
            'g_checkbox_d' => $postData['g_checkbox_d'] ?? '',
            'g_checkbox_e' => $postData['g_checkbox_e'] ?? '',
            'g_checkbox_f' => $postData['g_checkbox_f'] ?? '',
            'g_checkbox_g' => $postData['g_checkbox_g'] ?? '',
            'g_checkbox_h' => $postData['g_checkbox_h'] ?? '',
            'g_checkbox_i' => $postData['g_checkbox_i'] ?? '',
            'g_checkbox_j' => $postData['g_checkbox_j'] ?? '',
            'g_checkbox_k' => $postData['g_checkbox_k'] ?? '',
            'g_checkbox_l' => $postData['g_checkbox_l'] ?? '',
            'tanggal' => $postData['tanggal'] ?? ''
        ];

        // Update data ke form_index_b
        $this->db->where('npwp_user', $npwp_session);
        $this->db->update('form_index_b', $form_index_b_data);

        // Redirect sesuai tombol yang diklik
        if ($this->input->post('action') === 'sebelumnya') {
            redirect('form/form_lima'); // Pindah ke halaman form_lima setelah save
        } else {
            redirect('bayar'); // Pindah ke halaman bayar setelah save
        }
    }

    private function format_npwp($npwp)
    {
        $clean = preg_replace('/[^0-9]/', '', $npwp);
        return preg_replace('/^(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})$/', '$1.$2.$3.$4-$5.$6', $clean);
    }

    public function form_lima()
    {

        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $data['user'] = $this->db->get_where('user', ['npwp' => $npwp])->row_array();

        // Pagination setup C
        $this->load->library('pagination');
        $config['base_url'] = base_url('form/form_lima');
        $config['total_rows_c'] = $this->db->where('npwp_user', $npwp)->count_all_results('form-lima-c');

        $config['per_page'] = 5;

        // Pagination styling (Bootstrap 4) A
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $this->pagination->initialize($config);

        // Ambil data sesuai halaman C
        $start = $this->uri->segment(3);
        $data['form_lima_c'] = $this->db->where('npwp_user', $npwp)
            ->limit($config['per_page'], $start)
            ->get('form-lima-c')
            ->result_array();

        // Hitung total semua penghasilan_neto_c tanpa pagination C
        $data['penghasilanNetoC'] = $this->db->select_sum('penghasilan_neto_c')
            ->where('npwp_user', $npwp)
            ->get('form-lima-c')
            ->row()->penghasilan_neto_c ?? 0; // Tambahkan fallback value 0 jika null

        // pagination
        $data['pagination'] = $this->pagination->create_links();

        // Ambil data dari tabel form_lima_b dan form_lima_d berdasarkan npwp_user
        $data['form_data_b'] = $this->db->get_where('form-lima-b', ['npwp_user' => $npwp])->result_array();
        $data['form_data_d'] = $this->db->get_where('form-lima-d', ['npwp_user' => $npwp])->result_array();

        $data['mode_b'] = !empty($data['form_data_b']) ? 'edit' : 'input';
        $data['mode_d'] = !empty($data['form_data_d']) ? 'edit' : 'input';

        // Proses form saat disubmit
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Proses data form BAGIAN B
            $jenis_usaha = $this->input->post('jenis_usaha');
            $perederan_usaha = $this->input->post('perederan_usaha');
            $norma = $this->input->post('norma');
            $penghasilan_neto = $this->input->post('penghasilan_neto');

            if (!empty($jenis_usaha)) {
                $data_insert_b = [];
                foreach ($jenis_usaha as $key => $jenis) {
                    $data_insert_b[] = [
                        'npwp_user' => $npwp,
                        'jenis_usaha' => $jenis,
                        'perederan_usaha' => str_replace('.', '', $perederan_usaha[$key] ?? '0'),
                        'norma' => $norma[$key] ?? '',
                        'penghasilan_neto' => str_replace('.', '', $penghasilan_neto[$key] ?? '0'),
                    ];
                }

                if ($data['mode_b'] === 'edit') {
                    $this->db->where('npwp_user', $npwp)->delete('form-lima-b');
                }
                $this->db->insert_batch('form-lima-b', $data_insert_b);
            }

            // Proses data form BAGIAN D
            $jenis_usaha_d = $this->input->post('jenis_usaha_d');
            $penghasilan_neto_d = $this->input->post('penghasilan_neto_d');

            if (!empty($jenis_usaha_d)) {
                $data_insert_d = [];
                foreach ($jenis_usaha_d as $key => $jenis) {
                    $data_insert_d[] = [
                        'npwp_user' => $npwp,
                        'jenis_usaha_d' => $jenis,
                        'penghasilan_neto_d' => str_replace('.', '', $penghasilan_neto_d[$key] ?? '0'),
                    ];
                }

                if ($data['mode_d'] === 'edit') {
                    $this->db->where('npwp_user', $npwp)->delete('form-lima-d');
                }
                $this->db->insert_batch('form-lima-d', $data_insert_d);
            }

            // Redirect berdasarkan tombol yang diklik
            $redirect_to = match ($this->input->post('action')) {
                'previous' => 'form/form_empat',
                'next' => 'form/index',
                default => 'form/form_lima',
            };

            redirect($redirect_to);
        }

        $this->load->view('form/form-view-lima', $data);
    }

    public function form_empat()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $data['user'] = $this->db->get_where('user', ['npwp' => $npwp])->row_array();

        // Cek apakah data sudah ada di form-empat-a
        $data['form_empat_a'] = $this->db->get_where('form-empat-a', ['npwp_user' => $npwp])->row_array();

        // Cek apakah data sudah ada di form-empat-b
        $form_empat_b = $this->db->get_where('form-empat-b', ['npwp_user' => $npwp])->row_array();

        // Format nilai numerik sebelum dikirim ke view
        if (!empty($form_empat_b)) {
            foreach ($form_empat_b as $key => $value) {
                if (is_numeric($value)) {
                    $form_empat_b[$key] = number_format($value, 0, ',', '.'); // Format dengan titik sebagai pemisah ribuan
                }
            }
        }

        $data['form_empat_b'] = $form_empat_b;

        // Set action berdasarkan apakah data sudah ada atau belum
        $data['action'] = (!empty($data['form_empat_a']) || !empty($data['form_empat_b'])) ? 'EDIT' : 'INPUT';

        $this->load->view('form/form-view-empat', $data);
    }

    function cleanNumber($input)
    {
        return preg_replace('/[^0-9]/', '', $input); // Hapus semua karakter selain angka
    }

    public function save_form_empat()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        // Ambil data dari form
        $action = $this->input->post('action');

        // Data untuk tabel form-empat-a
        $data_a = array(
            'npwp_user' => $npwp,
            'pembukuan_laporan' => $this->input->post('pembukuan_laporan'),
            'opini_akuntan' => $this->input->post('opini_akuntan'),
            'nama_akuntan' => $this->input->post('nama_akuntan'),
            'npwp_akuntan' => $this->input->post('npwp_akuntan'),
            'nama_kantor_akuntan' => $this->input->post('nama_kantor_akuntan'),
            'npwp_kantor_akuntan' => $this->input->post('npwp_kantor_akuntan'),
            'nama_konsultan' => $this->input->post('nama_konsultan'),
            'npwp_konsultan' => $this->input->post('npwp_konsultan'),
            'nama_kantor_konsultan' => $this->input->post('nama_kantor_konsultan'),
            'npwp_kantor_konsultan' => $this->input->post('npwp_kantor_konsultan')
        );

        // Data untuk tabel form-empat-b
        $data_b = array(
            'npwp_user' => $npwp,
            '_1a' => $this->cleanNumber($this->input->post('_1a')),
            '_1b' => $this->cleanNumber($this->input->post('_1b')),
            '_1d' => $this->cleanNumber($this->input->post('_1d')),
            '_2a' => $this->cleanNumber($this->input->post('_2a')),
            '_2b' => $this->cleanNumber($this->input->post('_2b')),
            '_2c' => $this->cleanNumber($this->input->post('_2c')),
            '_2d' => $this->cleanNumber($this->input->post('_2d')),
            '_2e' => $this->cleanNumber($this->input->post('_2e')),
            '_2f' => $this->cleanNumber($this->input->post('_2f')),
            '_2g' => $this->cleanNumber($this->input->post('_2g')),
            '_2h' => $this->cleanNumber($this->input->post('_2h')),
            '_2i' => $this->cleanNumber($this->input->post('_2i')),
            '_2j' => $this->cleanNumber($this->input->post('_2j')),
            '_2k' => $this->cleanNumber($this->input->post('_2k')),
            '_3a' => $this->cleanNumber($this->input->post('_3a')),
            '_3b' => $this->cleanNumber($this->input->post('_3b')),
            '_3c' => $this->cleanNumber($this->input->post('_3c')),
            '_4a' => $this->cleanNumber($this->input->post('_4a'))
        );

        // Cek apakah action adalah EDIT atau INPUT
        if ($action == 'EDIT') {
            // Update data di tabel form-empat-a
            $this->db->where('npwp_user', $npwp);
            $this->db->update('form-empat-a', $data_a);

            // Update data di tabel form-empat-b
            $this->db->where('npwp_user', $npwp);
            $this->db->update('form-empat-b', $data_b);
        } else {
            // Insert data ke tabel form-empat-a
            $this->db->insert('form-empat-a', $data_a);

            // Insert data ke tabel form-empat-b
            $this->db->insert('form-empat-b', $data_b);
        }

        // Redirect ke halaman yang sesuai
        $redirect_url = $this->input->post('redirect_url');
        redirect($redirect_url);
    }

    public function form_tiga()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $data['user'] = $this->db->get_where('user', ['npwp' => $npwp])->row_array();

        // Pagination setup A
        $this->load->library('pagination');
        $config['base_url'] = base_url('form/form_tiga');
        $config['total_rows_a'] = $this->db->where('npwp_user', $npwp)->count_all_results('form-tiga');

        $config['per_page'] = 5;

        // Pagination styling (Bootstrap 4) A
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $this->pagination->initialize($config);

        // Ambil data sesuai halaman A
        $start = $this->uri->segment(3);
        $data['form_tiga'] = $this->db->where('npwp_user', $npwp)
            ->limit($config['per_page'], $start)
            ->get('form-tiga')
            ->result_array();

        // Hitung total semua jumlah_pph_yang_dipotong tanpa pagination A
        $data['jumlahPPh'] = $this->db->select_sum('jumlah_pph_yang_dipotong')
            ->where('npwp_user', $npwp)
            ->get('form-tiga')
            ->row()->jumlah_pph_yang_dipotong;

        // pagination
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('form/form-view-tiga', $data);
    }

    public function form_dua()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        // Ambil data user
        $data['user'] = $this->db->get_where('user', ['npwp' => $npwp])->row_array();

        // Ambil data dari tabel form_dua_a dan form_dua_b berdasarkan npwp_user
        $data['form_data_a'] = $this->db->get_where('form-dua-a', ['npwp_user' => $npwp])->result_array();
        $data['form_data_b'] = $this->db->get_where('form-dua-b', ['npwp_user' => $npwp])->result_array();

        // Ambil status checkbox dari database
        $existing_checkbox = $this->db->get_where('form-dua-checkbox', ['npwp_user' => $npwp])->row_array();
        $data['checkbox_status'] = $existing_checkbox['checkbox'] ?? 0; // Default unchecked jika tidak ada data

        $data['mode_a'] = !empty($data['form_data_a']) ? 'edit' : 'input';
        $data['mode_b'] = !empty($data['form_data_b']) ? 'edit' : 'input';

        // Proses form saat disubmit
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Proses data form A dan B (sama seperti sebelumnya)
            $jenis_penghasilan_a = $this->input->post('jenis_penghasilan');
            $dasar_pengenaan_pajak_a = $this->input->post('dasar_pengenaan_pajak');
            $pph_terutang_a = $this->input->post('pph_terutang');

            if (!empty($jenis_penghasilan_a)) {
                $data_insert_a = [];
                foreach ($jenis_penghasilan_a as $key => $jenis) {
                    $data_insert_a[] = [
                        'npwp_user' => $npwp,
                        'jenis_penghasilan' => $jenis,
                        'dasar_pengenaan_pajak' => str_replace('.', '', $dasar_pengenaan_pajak_a[$key] ?? '0'),
                        'pph_terutang' => str_replace('.', '', $pph_terutang_a[$key] ?? '0'),
                    ];
                }

                if ($data['mode_a'] === 'edit') {
                    $this->db->where('npwp_user', $npwp)->delete('form-dua-a');
                }
                $this->db->insert_batch('form-dua-a', $data_insert_a);
            }

            // Data form B
            $jenis_penghasilan_b = $this->input->post('jenis_penghasilan_b');
            $dasar_pengenaan_pajak_b = $this->input->post('dasar_pengenaan_pajak_b');

            if (!empty($jenis_penghasilan_b)) {
                $data_insert_b = [];
                foreach ($jenis_penghasilan_b as $key => $jenis) {
                    $data_insert_b[] = [
                        'npwp_user' => $npwp,
                        'jenis_penghasilan_b' => $jenis,
                        'dasar_pengenaan_pajak_b' => str_replace('.', '', $dasar_pengenaan_pajak_b[$key] ?? '0'),
                    ];
                }

                if ($data['mode_b'] === 'edit') {
                    $this->db->where('npwp_user', $npwp)->delete('form-dua-b');
                }
                $this->db->insert_batch('form-dua-b', $data_insert_b);
            }

            // Tangkap nilai checkbox (1 untuk checked, 0 untuk unchecked)
            $pp46_23_status = $this->input->post('pp46_23_checkbox_value');

            // Periksa apakah npwp_user sudah ada di database
            if ($existing_checkbox) {
                // Jika npwp_user sudah ada, lakukan UPDATE
                $this->db->where('npwp_user', $npwp)
                    ->update('form-dua-checkbox', ['checkbox' => $pp46_23_status]);
            } else {
                // Jika npwp_user belum ada, lakukan INSERT
                $this->db->insert('form-dua-checkbox', [
                    'npwp_user' => $npwp,
                    'checkbox' => $pp46_23_status
                ]);
            }

            // Redirect berdasarkan tombol yang diklik
            $redirect_to = match ($this->input->post('action')) {
                'previous' => 'form/form_satu',
                'next' => 'form/form_tiga',
                'pp' => 'form/form_pp',
                default => 'form/form_dua',
            };

            redirect($redirect_to);
        }

        $this->load->view('form/form-view-dua', $data);
    }

    public function form_pp()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $data['user'] = $this->db->get_where('user', ['npwp' => $npwp])->row_array();

        // Pagination setup A
        $this->load->library('pagination');
        $config['base_url'] = base_url('form/form_pp');
        $config['total_rows_a'] = $this->db->where('npwp_user', $npwp)->count_all_results('form-pp');
        $config['per_page'] = 5;

        // Pagination styling (Bootstrap 4) A
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $this->pagination->initialize($config);

        // Ambil data sesuai halaman A
        $start = $this->uri->segment(3);
        $data['form_pp'] = $this->db->where('npwp_user', $npwp)
            ->limit($config['per_page'], $start)
            ->get('form-pp')
            ->result_array();

        // Hitung total semua perederan_bruto tanpa pagination A
        $data['totalBruto'] = $this->db->select_sum('perederan_bruto')
            ->where('npwp_user', $npwp)
            ->get('form-pp')
            ->row()->perederan_bruto;

        // Hitung total semua perederan_bruto tanpa pagination A
        $data['totalPPh'] = $this->db->select_sum('jumlah_pph')
            ->where('npwp_user', $npwp)
            ->get('form-pp')
            ->row()->jumlah_pph;

        // pagination
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('form/form_pp', $data);
    }

    public function form_satu()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        // Ambil data user
        $data['user'] = $this->db->get_where('user', ['npwp' => $npwp])->row_array();
        $data['kode_harta'] = $this->db->get('kode_harta')->result_array();
        $data['kode_utang'] = $this->db->get('kode_utang')->result_array();

        // Pagination setup A
        $this->load->library('pagination');
        $config['base_url'] = base_url('form/form_satu');
        $config['total_rows_a'] = $this->db->where('npwp_user', $npwp)->count_all_results('form-satu-a');
        $config['total_rows_b'] = $this->db->where('npwp_user', $npwp)->count_all_results('form-satu-b');
        $config['total_rows_c'] = $this->db->where('npwp_user', $npwp)->count_all_results('form-satu-c');
        $config['per_page'] = 5;

        // Pagination styling (Bootstrap 4) A
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $this->pagination->initialize($config);

        // Ambil data sesuai halaman A
        $start = $this->uri->segment(3);
        $data['form_data_a'] = $this->db->where('npwp_user', $npwp)
            ->limit($config['per_page'], $start)
            ->get('form-satu-a')
            ->result_array();

        // Hitung total semua harga_perolehan tanpa pagination A
        $data['totalAmount'] = $this->db->select_sum('harga_perolehan')
            ->where('npwp_user', $npwp)
            ->get('form-satu-a')
            ->row()->harga_perolehan;


        // Ambil data sesuai halaman B
        $start = $this->uri->segment(3);
        $data['form_data_b'] = $this->db->where('npwp_user', $npwp)
            ->limit($config['per_page'], $start)
            ->get('form-satu-b')
            ->result_array();

        // Hitung total semua jumlah_peminjaman tanpa pagination B
        $data['totalPeminjam'] = $this->db->select_sum('jumlah_peminjaman')
            ->where('npwp_user', $npwp)
            ->get('form-satu-b')
            ->row()->jumlah_peminjaman;


        // Ambil data sesuai halaman B
        $start = $this->uri->segment(3);
        $data['form_data_c'] = $this->db->where('npwp_user', $npwp)
            ->limit($config['per_page'], $start)
            ->get('form-satu-c')
            ->result_array();

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('form/form-view-satu', $data);
    }

    public function form_satu_save_a()
    {
        $this->load->library('form_validation');

        // Set rules untuk validasi
        $this->form_validation->set_rules('tahun_perolehan', 'Tahun Perolehan', 'required|exact_length[4]|less_than_equal_to[' . date('Y') . ']');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke form dengan pesan error
            $this->session->set_flashdata('error', validation_errors());
            redirect('form/form_satu');
        } else {
            $data = [
                'kode_harta' => $this->input->post('kode_harta'),
                'nama_harta' => $this->input->post('nama_harta'),
                'tahun_perolehan' => $this->input->post('tahun_perolehan'),
                'harga_perolehan' => $this->input->post('harga_perolehan'),
                'keterangan' => $this->input->post('keterangan'),
                'npwp_user' => $this->session->userdata('npwp')
            ];

            $this->db->insert('form-satu-a', $data);
            redirect('form/form_satu');
        }
    }

    public function form_satu_save_b()
    {
        $this->load->library('form_validation');

        // Set rules untuk validasi
        $this->form_validation->set_rules('tahun_peminjaman', 'Tahun Peminjaman', 'required|exact_length[4]|less_than_equal_to[' . date('Y') . ']');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke form dengan pesan error
            $this->session->set_flashdata('error', validation_errors());
            redirect('form/form_satu');
        } else {
            $data = [
                'kode_utang' => $this->input->post('kode_utang'),
                'nama_pemberi_pinjaman' => $this->input->post('nama_pemberi_pinjaman'),
                'alamat_pemberi_pinjaman' => $this->input->post('alamat_pemberi_pinjaman'),
                'tahun_peminjaman' => $this->input->post('tahun_peminjaman'),
                'jumlah_peminjaman' => $this->input->post('jumlah_peminjaman'),
                'npwp_user' => $this->session->userdata('npwp')
            ];

            $this->db->insert('form-satu-b', $data);
            redirect('form/form_satu');
        }
    }

    public function form_satu_save_c()
    {
        $this->load->library('form_validation');

        // Set rules untuk validasi
        $this->form_validation->set_rules('nik', 'NIK', 'required|exact_length[16]|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke form dengan pesan error
            $this->session->set_flashdata('error', validation_errors());
            redirect('form/form_satu');
        } else {
            $data = [
                'nama_anggota_keluarga' => $this->input->post('nama_anggota_keluarga'),
                'nik' => $this->input->post('nik'),
                'hubungan' => $this->input->post('hubungan'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'npwp_user' => $this->session->userdata('npwp')
            ];

            $this->db->insert('form-satu-c', $data);
            redirect('form/form_satu');
        }
    }

    public function form_pp_save_a()
    {

        $data = [
            'npwp' => $this->input->post('npwp'),
            'masa_pajak' => $this->input->post('masa_pajak'),
            'alamat' => $this->input->post('alamat'),
            'perederan_bruto' => $this->input->post('perederan_bruto'),
            'jumlah_pph' => $this->input->post('jumlah_pph'),
            'npwp_user' => $this->session->userdata('npwp')
        ];

        $this->db->insert('form-pp', $data);
        redirect('form/form_pp');
    }

    public function form_tiga_save()
    {
        $this->load->library('form_validation');

        // Set rules untuk validasi
        $this->form_validation->set_rules('npwp_pemotong', 'NPWP Pemotong', 'required|exact_length[15]|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke form dengan pesan error
            $this->session->set_flashdata('error', validation_errors());
            redirect('form/form_tiga');
        } else {
            $data = [
                'nama_pemotong' => $this->input->post('nama_pemotong'),
                'npwp_pemotong' => $this->input->post('npwp_pemotong'), // Simpan tanpa simbol
                'bukti_pemotongan_nomor' => $this->input->post('bukti_pemotongan_nomor'),
                'bukti_pemotongan_tanggal' => $this->input->post('bukti_pemotongan_tanggal'),
                'jenis_pajak' => $this->input->post('jenis_pajak'),
                'jumlah_pph_yang_dipotong' => str_replace('.', '', $this->input->post('jumlah_pph_yang_dipotong')), // Hapus titik sebelum simpan
                'npwp_user' => $this->session->userdata('npwp')
            ];

            $this->db->insert('form-tiga', $data);
            redirect('form/form_tiga');
        }
    }

    // Custom callback function untuk memeriksa tanggal
    public function check_date($date)
    {
        $input_date = strtotime($date);
        $current_date = strtotime(date('Y-m-d'));

        if ($input_date > $current_date) {
            $this->form_validation->set_message('check_date', 'Tanggal tidak boleh lebih dari hari ini.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function form_lima_save()
    {
        $this->load->library('form_validation');

        // Bersihkan input NPWP dari karakter non-angka
        $npwp = preg_replace('/[^0-9]/', '', $this->input->post('npwp_pemberi_kerja'));

        // Set rules untuk validasi
        $this->form_validation->set_rules('npwp_pemberi_kerja', 'NPWP Pemberi Kerja', 'required|exact_length[15]|numeric');
        $this->form_validation->set_rules('penghasilan_bruto', 'Penghasilan Bruto', 'required|numeric');
        $this->form_validation->set_rules('pengurangan_penghasilan_bruto', 'Pengurangan Penghasilan Bruto', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke form dengan pesan error
            $this->session->set_flashdata('error', validation_errors());
            redirect('form/form_lima');
        } else {
            // Hitung penghasilan neto
            $penghasilanBruto = (float) $this->input->post('penghasilan_bruto');
            $penguranganBruto = (float) $this->input->post('pengurangan_penghasilan_bruto');
            $penghasilanNeto = $penghasilanBruto - $penguranganBruto;

            // Simpan data ke database
            $data = [
                'npwp_pemberi_kerja' => $npwp,
                'nama_pemberi_kerja' => $this->input->post('nama_pemberi_kerja'),
                'penghasilan_bruto' => $penghasilanBruto,
                'pengurangan_penghasilan_bruto' => $penguranganBruto,
                'penghasilan_neto_c' => $penghasilanNeto, // Simpan hasil perhitungan
                'npwp_user' => $this->session->userdata('npwp')
            ];

            $this->db->insert('form-lima-c', $data);
            redirect('form/form_lima');
        }
    }

    public function hapus_form_lima_c()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $data_ke_c = $this->input->post('data_ke_c');

        // Validasi input
        if (!$data_ke_c || !is_numeric($data_ke_c)) {
            echo json_encode(['status' => 'error', 'message' => 'Input tidak valid']);
            return;
        }

        // Hitung indeks berdasarkan data ke-
        $this->db->where('npwp_user', $npwp);
        $form_data = $this->db->get('form-lima-c')->result_array();

        if (isset($form_data[$data_ke_c - 1])) {
            $row_id = $form_data[$data_ke_c - 1]['id'];
            $this->db->where('id', $row_id);
            $this->db->delete('form-lima-c');

            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
    }

    public function hapus_form_tiga()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $data_ke_a = $this->input->post('data_ke_a');

        // Validasi input
        if (!$data_ke_a || !is_numeric($data_ke_a)) {
            echo json_encode(['status' => 'error', 'message' => 'Input tidak valid']);
            return;
        }

        // Hitung indeks berdasarkan data ke-
        $this->db->where('npwp_user', $npwp);
        $form_data = $this->db->get('form-tiga')->result_array();

        if (isset($form_data[$data_ke_a - 1])) {
            $row_id = $form_data[$data_ke_a - 1]['id'];
            $this->db->where('id', $row_id);
            $this->db->delete('form-tiga');

            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
    }

    public function hapus_form_pp()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $data_ke_a = $this->input->post('data_ke_a');

        // Validasi input
        if (!$data_ke_a || !is_numeric($data_ke_a)) {
            echo json_encode(['status' => 'error', 'message' => 'Input tidak valid']);
            return;
        }

        // Hitung indeks berdasarkan data ke-
        $this->db->where('npwp_user', $npwp);
        $form_data = $this->db->get('form-pp')->result_array();

        if (isset($form_data[$data_ke_a - 1])) {
            $row_id = $form_data[$data_ke_a - 1]['id'];
            $this->db->where('id', $row_id);
            $this->db->delete('form-pp');

            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
    }

    public function hapus_form_satu_a()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $data_ke_a = $this->input->post('data_ke_a');

        // Validasi input
        if (!$data_ke_a || !is_numeric($data_ke_a)) {
            echo json_encode(['status' => 'error', 'message' => 'Input tidak valid']);
            return;
        }

        // Hitung indeks berdasarkan data ke-
        $this->db->where('npwp_user', $npwp);
        $form_data = $this->db->get('form-satu-a')->result_array();

        if (isset($form_data[$data_ke_a - 1])) {
            $row_id = $form_data[$data_ke_a - 1]['id'];
            $this->db->where('id', $row_id);
            $this->db->delete('form-satu-a');

            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
    }

    public function hapus_form_satu_b()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $data_ke_b = $this->input->post('data_ke_b');

        // Validasi input
        if (!$data_ke_b || !is_numeric($data_ke_b)) {
            echo json_encode(['status' => 'error', 'message' => 'Input tidak valid']);
            return;
        }

        // Hitung indeks berdasarkan data ke-
        $this->db->where('npwp_user', $npwp);
        $form_data = $this->db->get('form-satu-b')->result_array();

        if (isset($form_data[$data_ke_b - 1])) {
            $row_id = $form_data[$data_ke_b - 1]['id'];
            $this->db->where('id', $row_id);
            $this->db->delete('form-satu-b');

            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
    }

    public function hapus_form_satu_c()
    {
        $npwp = $this->session->userdata('npwp');
        if (!$npwp) {
            redirect('auth');
        }

        $data_ke_c = $this->input->post('data_ke_c');

        // Validasi input
        if (!$data_ke_c || !is_numeric($data_ke_c)) {
            echo json_encode(['status' => 'error', 'message' => 'Input tidak valid']);
            return;
        }

        // Hitung indeks berdasarkan data ke-
        $this->db->where('npwp_user', $npwp);
        $form_data = $this->db->get('form-satu-c')->result_array();

        if (isset($form_data[$data_ke_c - 1])) {
            $row_id = $form_data[$data_ke_c - 1]['id'];
            $this->db->where('id', $row_id);
            $this->db->delete('form-satu-c');

            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
    }
}
