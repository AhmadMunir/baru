<?php
defined('BASEPATH') OR exit('No direct script access alllowed');

class Download extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','download'));
	}
	public function index(){
		$this->load->view('v_download');
	}
	public function lakukan_download(){
		force_download('gambar/des.jpg',NULL);
	}
	public function lakukan_download1(){
		force_download('gambar/refo.jpg',NULL);
	}
	public function lakukan_download2(){
		force_download('gambar/rangga.jpg',NULL);
	}
	public function lakukan_download3(){
		force_download('gambar/ridi.jpg',NULL);
	}
}