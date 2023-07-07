<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_barang extends CI_Controller 
{
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();
        
        $this->load->view('template_admin/header');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('template_admin/footer');  
    }
    public function tambah_aksi() {
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = ''){}else{
            $config ['upload_path'] = './assets/img';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar gagal di upload!";
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar,
        );

        $this->model_barang->tambah_barang($data, 'db_barang');
        redirect('data_barang/index');

    }
    public function edit($id){
        $where = array('id_brg' =>$id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'db_barang')->result();
        $this->load->view('template_admin/header');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('template_admin/footer');  
    }
    public function update() {
        $id = $this->input->post('id_brg');
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = array(
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok
        );
        $where = array(
            'id_brg' => $id
        );

        $this->model_barang->update_data($where,$data,'db_barang');
        redirect('data_barang/index');
    }
    public function hapus($id){
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'db_barang');
        redirect('data_barang/index');
    }
    
}