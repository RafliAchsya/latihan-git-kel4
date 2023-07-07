<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller 
{
    
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();
        
        $this->load->view('template/header', $data);
        $this->load->view('beranda/index', $data);
        $this->load->view('template/footer');
         }
    public function tambah_keranjang($id){
        
        $barang = $this->model_barang->find($id);

        $data = array(
            'id'      => $barang->id_brg, 
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg

    );
    
    $this->cart->insert($data);
    redirect('beranda');

    
    }
    public function detail_keranjang(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();
        $this->load->view('template/header', $data);
        $this->load->view('beranda/keranjang');
        $this->load->view('template/footer');
    }
    public function hapus_keranjang(){
        $this->cart->destroy();
        redirect('beranda/index');
    }
    public function Pembayaran(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();
        $this->load->view('template/header', $data);
        $this->load->view('beranda/pembayaran');
        $this->load->view('template/footer');
    }
    public function proses_pesanan(){
        $is_processed = $this->model_info->index();
        if($is_processed){
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();

            $this->cart->destroy();
            $this->load->view('template/header', $data);
            $this->load->view('proses_pesanan');
            $this->load->view('template/footer');
        }else{
            echo "Maaf Pesanan Anda Gagal Diproses!";
        }
    }
    public function detail($id_brg)
    {
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();
        $this->load->view('template/header', $data);
            $this->load->view('beranda/detail_barang', $data);
            $this->load->view('template/footer');
    }
    public function about()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();
        $this->load->view('template/header', $data);
        $this->load->view('beranda/about');
        $this->load->view('template/footer');
    }
    public function profil()
    {
       
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();
        
        $this->load->view('template/header',$data);
        $this->load->view('beranda/profil', $data);
        $this->load->view('template/footer');
        
     
    }
}