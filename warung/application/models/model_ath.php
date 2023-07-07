<?php 

class Model_ath extends CI_Model{

    public function cek_login()
    {
        $name = set_value('name');
        $password = set_value('password');

        $result   = $this->db->where('name', $name)
                             ->where('password', $password)
                             ->limit(1)
                             ->get('user');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }
}