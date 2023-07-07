<?php

class Info extends CI_Controller {
    public function index(){
        $data['info'] = $this->model_info->tampil_data();
        $this->load->view('template_admin/header');
        $this->load->view('admin/info', $data);
        $this->load->view('template_admin/footer');
    }
    public function detail($id_info)
    {
        $data['info'] = $this->model_info->ambil_id_info($id_info);
        $data['pesanan'] = $this->model_info->ambil_id_pesanan($id_info);
        $this->load->view('template_admin/header');
        $this->load->view('admin/detail_info', $data);
        $this->load->view('template_admin/footer');
    }
}