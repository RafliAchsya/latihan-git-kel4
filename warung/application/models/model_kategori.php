<?php

class Model_kategori extends CI_Model{
    public function data_sembako(){
        return $this->db->get_where("db_barang", array('kategori' => 'sembako'));
    }
    public function data_makanan(){
        return $this->db->get_where("db_barang", array('kategori' => 'makanan'));
    }
    public function data_minuman(){
        return $this->db->get_where("db_barang", array('kategori' => 'minuman'));
    }
}