<?php 

/**
* 
*/
class Transaksi_model extends CI_Model
{
	public $table='transaksi';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_transaksi($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getSumPerMonth($month){
		$this->db->select_sum('total_bayar');
		$this->db->where('MONTH(tgl_pesan)',$month);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function getTransaksi(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getGrafikMonth($month)
	{
		$this->db->select_sum('total_bayar');
		$this->db->select('day(tgl_pesan) as day');
		$this->db->where('month(tgl_pesan)',$month);
		$this->db->group_by('day(tgl_pesan)');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getTransaksiKotaPelanggan(){
		$this->db->join('kota','kota.id_kota = transaksi.id_kota');
		$this->db->join('user','user.id_user = transaksi.id_user');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getTransaksiById($id_transaksi){
		$this->db->where('id_transaksi',$id_transaksi);
		$query = $this->db->get($this->table);
		return $query->row();
	}
	public function getTransaksiByIdUser($id_user){
		$this->db->where('id_user',$id_user);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getTransaksiForLaporan($bulan,$tahun){
		$this->db->where('MONTH(tgl_pesan)',$bulan);
		$this->db->where('YEAR(tgl_pesan)',$tahun);
		$this->db->join('kota','kota.id_kota = transaksi.id_kota');
		$this->db->join('user','user.id_user = transaksi.id_user');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getTransaksiAll($id_transaksi){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->join('kota','kota.id_kota = transaksi.id_kota');
		$this->db->join('user','user.id_user = transaksi.id_user');
		$query = $this->db->get();
		return $query->result();
	}
	public function getTransaksiNoVou($id_transaksi){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->join('kota','kota.id_kota = transaksi.id_kota');
		$this->db->join('user','user.id_user = transaksi.id_user');
		$query = $this->db->get();
		return $query->result();		
	}
	public function insertTransaksi($data){
		$this->db->insert($this->table,$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function updateTransaksi($id_transaksi,$data){
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->update($this->table,$data);
	}
	public function deleteTransaksi($id_transaksi){
		$this->db->delete($this->table,array('id_transaksi'=>$id_transaksi));
	}
}
 ?>