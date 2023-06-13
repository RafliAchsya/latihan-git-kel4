<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index() 
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'login user toko';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            // validasi nya berhasil
            $this->_login();
        }    
    }
    
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        // jika user nya ada
        if($user) {
            // jika usernya aktif
            if($user['is_active'] == 1) {
                // cek passwordnya
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                }else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah salah salah !</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email ini belum di aktivasi</div>');
                redirect('auth');
            }
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum pernah terdaftar</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'email ini udah pernah di pake buat register!'
        ]);
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register User Toko';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('template/auth_footer');
       } else {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Anda Telah terdaftar. Harap Login</div>');
        redirect('auth');
       }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu Berhasil Keluar</div>');
        redirect('auth');
    }
}