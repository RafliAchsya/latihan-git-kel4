<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller 
{
    public function index()
    {
       
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array();
        
        $this->load->view('template_admin/header');
        $this->load->view('profil/index', $data);
        $this->load->view('template_admin/footer');
        
     
    }
}