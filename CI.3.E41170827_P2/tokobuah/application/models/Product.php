<?php defined('BASEPATH') OR exit('No direct script access allowed');
  class Product extends CI_Model{
    private $_table = "tbl_products";

    private $id_product;
    private $nama;
    private $harga;
    private $gambar;
    private $deskripsi;

    public function rules(){
      return [
        ['field' => 'name',
         'label' => 'Nama',
         'rules' => 'required'],
        ['field' => 'harga',
         'label' => 'Harga',
         'rules' => 'numeric'],
        ['field' => 'deskripsi',
         'label' => 'Deskripsi',
         'rules' => 'required']
      ];
    }
    // menampilkan db
    public function getAll(){
      return $this->db->get($this->_table)->result();
      // Select * dari Products
    }

    public function geById($id){
      //ambil by ID
      return $this->db->get($this->_table, ["id_product" => $id])->row();
    }

    public function save(){
      $post = $this->input->post();
      $this->id_product = uniqid();
      $this->nama = $post["name"];
      $this->harga = $post["harga"];
      $this->deskripsi = $post["deskripsi"];

      $this->db->insert($table,$this);
    }

    public function update(){
      $post = $this->input->post();
      $this->id_product = uniqid();
      $this->nama = $post["name"];
      $this->harga = $post["harga"];
      $this->deskripsi = $post["deskripsi"];

      $this->db->update($table, $this, array('id_product' => $post['id']));
    }

    public function delete($id){
      return $this->db->delete($table, array("id_product" => $id));
    }
  }
?>
