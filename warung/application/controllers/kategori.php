<?php

class Kategori extends CI_Controller{
    public function sembako()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();
        $data['sembako'] = $this->model_kategori->data_sembako()->result();
        $this->load->view('template/header', $data);
        $this->load->view('beranda/sembako', $data);
        $this->load->view('template/footer');
    }
    public function makanan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();
        $data['makanan'] = $this->model_kategori->data_makanan()->result();
        $this->load->view('template/header', $data);
        $this->load->view('beranda/makanan', $data);
        $this->load->view('template/footer');
    }
    public function minuman()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();
        $data['minuman'] = $this->model_kategori->data_minuman()->result();
        $this->load->view('template/header', $data);
        $this->load->view('beranda/minuman', $data);
        $this->load->view('template/footer');
    }
}