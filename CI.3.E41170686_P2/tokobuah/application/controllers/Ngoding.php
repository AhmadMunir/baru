<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Ngoding extends CI_Controller {
	
	function index(){
		$this->load->library('alexngoding');
		$this->alexngoding->nama_saya();
                echo "<br/>";
                $this->alexngoding->nama_kamu("Paijo");
	}
 
}