<?php 

/**
* 
*/
class Kategori_model extends CI_Model
{
	public $table='kategori';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_kategori($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getKategori(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getKategoriDropdown(){
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	public function getKategoriNoAdmin(){
		$this->db->where('level!=','admin');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getKategoriById($id_kategori){
		$this->db->where('id_kategori',$id_kategori);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getKategoriBySlug($slug){
		$this->db->where('slug',$slug);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function insertKategori($data){
		$this->db->insert($this->table,$data);
	}
	public function updateKategori($id_kategori,$data){
		$this->db->where('id_kategori',$id_kategori);
		$this->db->update($this->table,$data);
	}
	public function deleteKategori($id_kategori){
		if ($this->db->delete($this->table,array('id_kategori'=>$id_kategori))) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
 ?>