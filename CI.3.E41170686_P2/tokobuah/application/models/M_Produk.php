<?php defined('BASEPATH') OR exit('No direct script access allow');

class M_produk extends CI_model {
	private $_table = "produk";

	public $produk_id;
	public $nama;
	public $harga;
	public $gambar;
	public $deskripsi;

	public function rules() {
		return [
			['field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'],
			['field' => 'harga',
			'label' => 'Harga',
			'rules' => 'Numeric'],
			['field' => 'deskripsi',
			'label' => 'Deskripsi',
			'rules' => 'required']
		];
	}
	//Menampilkan DB
	public function getAll() {
		return $this->db->get($this->_table)->result();
		//Select * FROM produk;
	}
	//HEAD = menampilkan berdasarkan ID
	public function getById($id){
		return $this->db->get_where($this->_table, ["produk_id"=> $id])->row();
		//SELECT * FROM produk WHERE produk._id=$id;
	}
	//CHEAT = mengisikan data
	public function save(){
		$post = $this->input->post();
		$this->produk_id =uniqid();
		$this->nama = $post["nama"];
		$this->harga = $post["harga"];
		$this->gambar = $this->_uploadImage();
		$this->deskripsi = $post["deskripsi"];

		$this->db->insert($this->_table,$this);
	}

	//update = edit data 
	public function update()
	{
		$post = $this->input->post();
		$this->produk_id = $post["id"];
		$this->nama = $post["nama"];
		$this->harga = $post["harga"];

		if (!empty($_FILES["image"]["name"])) {
	        $this->image = $this->_uploadImage();
	        } else {
	        $this->image = $post["old_image"];
        }
        $this->deskripsi = $post["deskripsi"];

		$this->db->update($this->_table,$this, array('produk_id'=> $post['id']));
	}
	//delet = menghapus data
	public function delete($id)
	{
		return $this->db->delete($this->_table, array("produk_id" => $id)); 
	}

	private function _uploadImage()
{
    $config['upload_path']          = './upload/produkkk/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->produk_id;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";

}

}