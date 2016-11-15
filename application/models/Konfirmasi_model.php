<?php 

/**
* 
*/
class Konfirmasi_model extends CI_Model
{
	public $table='konfirmasi';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_konfirmasi($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getKonfirmasi(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getKonfirmasiByTran($id_transaksi){
		$this->db->where('id_transaksi',$id_transaksi);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getkonfirmasibyId($id_konfirmasi){
		$this->db->where('id_konfirmasi',$id_konfirmasi);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function insertKonfirmasi($data){
		$this->db->insert($this->table,$data);
	}
	public function updateKonfirmasi($id_konfirmasi,$data){
		$this->db->where('id_konfirmasi',$id_konfirmasi);
		$this->db->update($this->table,$data);
	}
	public function deleteKonfirmasi($id_konfirmasi){
		$this->db->delete($this->table,array('id_konfirmasi'=>$id_konfirmasi));
	}
}
 ?>