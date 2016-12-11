<?php 

/**
* 
*/
class Transaksi_detail_model extends CI_Model
{
	public $table='transaksi_detail';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_transaksi_detail($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getTransaksi_detail(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getTransaksi_detailById($id_transaksi_detail){
		$this->db->where('id_transaksi_detail',$id_transaksi_detail);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getTransaksi_detailByTran($id_transaksi){
		$this->db->where('transaksi_detail.id_transaksi',$id_transaksi);
		$this->db->join('barang', 'barang.id_barang = transaksi_detail.id_barang');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function insertTransaksi_detail($data){
		$this->db->insert($this->table,$data);
	}
	public function updateTransaksi_detail($id_transaksi_detail,$data){
		$this->db->where('id_transaksi_detail',$id_transaksi_detail);
		$this->db->update($this->table,$data);
	}
	public function deleteTransaksi_detail($id_transaksi_detail){
		if ($this->db->delete($this->table,array('id_transaksi_detail'=>$id_transaksi_detail))) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
 ?>