<?php
  class Register extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->model('m_register');
      $this->load->helper('url');
    }

    function index(){
      $data['user'] = $this->m_register->tampil_data()->result();
      $this->load->view('register');
    }

    function tambah_aksi(){
      $nama = $this->input->post('nama');
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $data = array(
        'nama' => $nama,
        'username' => $username,
        'password' => $password
      );
      $this->m_register->input_data($data,'tbl_user');
      redirect('login');
    }
  }
 ?>
