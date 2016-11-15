<?php 

/**
* 
*/
class Kota_model extends CI_Model
{
	public $table='kota';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_kota($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}

	public function getKota(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getKotaById($id_kota){
		$this->db->where('id_kota',$id_kota);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function insertKota($data){
		$this->db->insert($this->table,$data);
	}
	public function updateKota($id_kota,$data){
		$this->db->where('id_kota',$id_kota);
		$this->db->update($this->table,$data);
	}
	public function deleteKota($id_kota){
		$this->db->delete($this->table,array('id_kota'=>$id_kota));
	}
}
 ?>