<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Belajar3 extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('M_data');
	}
 
	function user(){
		$data['user'] = $this->M_data->ambil_data()->result();
		$this->load->view('v_user.php',$data);
	}
 
}