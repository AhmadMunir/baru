<?php

defined('BASEPATH') OR exit('No direct script access allow');

class Produk extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_produk');
		$this->load->library('form_validation');
	}
	public function index() {
		$data["produk"]=$this->M_produk->getAll();
		$this->load->view('admin/produk/list', $data);
	}
	public function add(){
		$product = $this->M_produk;
		$validation = $this->form_validation;
		$validation->set_rules($product->rules());

		if ($validation->run()) {
			$product->save();
			$this->session->set_flashdata('success','berhasil disimpan');

		}
		$this->load->view('admin/form/new_form');
	}
	public function edit($id = null) {
		if (!isset($id)) redirect('admin/produk');

		$produks = $this->M_produk;
		$validation = $this->form_validation;
		$validation->set_rules($produks->rules());

		if($validation->run()){
			$produks->update();
			$this->session->set_flashdata('success','Berhasil Diedit');
		}

		$data["produk"] = $produks->getById($id);
		if(!$data["produk"]) show_404();

		$this->load->view('admin/form/edit_form',$data);
	 }

		public function delete($id=null){
			if (!isset($id)) show_404();

			if ($this->M_produk->delete($id)) {
				redirect(site_url('admin/produk'));
				}
			}
}