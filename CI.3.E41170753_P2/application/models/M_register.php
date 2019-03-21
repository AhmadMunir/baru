<?php
  class M_register extends CI_Model{
    function tampil_data(){
      return $this->db->get('tbl_user');
    }

    function input_data($data,$table){
      $this->db->insert($table,$data);
    }
  }
 ?>
