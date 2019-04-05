<?php
  class P_list extends CI_Controller  {
    public function __construct(){
      parent::__construct();
      $this->load->model('product');
      $this->load->helper('url');

      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }
    public function index(){
      $data['tbl_products'] = $this->product->getAll();
      $this->load->view('admin/product/list',$data);

    }
  }

?>
