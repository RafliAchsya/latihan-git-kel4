<?php

class Model_info extends CI_Model{
    public function index(  )
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama  = $this->input->post('nama');
        $alamat  = $this->input->post('alamat');

        $info = array (
            'nama' => $nama,
            'alamat' => $alamat,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
        );
        $this->db->insert('db_info', $info);
        $id_info = $this->db->insert_id();

        foreach ($this->cart->contents() as $item){
            $data = array (
                'id_info'       => $id_info,
                'id_brg'        => $item['id'],
                'nama_brg'      => $item['name'],
                'jumlah'        => $item['qty'],
                'harga'         => $item['price'],
            );
            $this->db->insert('db_pesanan', $data);
        }
        return TRUE;
    }
    public function tampil_data()
    {
        $result = $this->db->get('db_info');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function ambil_id_info($id_info)
    {
        $result = $this->db->where('id', $id_info)->limit(1)->get('db_info');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }
    public function ambil_id_pesanan($id_info)
    {
        $result = $this->db->where('id_info', $id_info)->get('db_pesanan');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }
}