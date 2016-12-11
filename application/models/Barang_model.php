<?php 

/**
* 
*/
class Barang_model extends CI_Model
{
	public $table='barang';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_barang($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getBarang(){
		$this->db->select('*,barang.slug as slug_barang');
		$this->db->order_by('barang.id_barang','DESC');
		$this->db->join('kategori','kategori.id_kategori=barang.id_kategori');
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getBarangRow(){
		$this->db->select('*,barang.slug as slug_barang');
		$this->db->order_by('barang.id_barang','DESC');
		$this->db->join('kategori','kategori.id_kategori=barang.id_kategori');
		$query = $this->db->get($this->table);
		return $query;
	}

	public function getBarangPagination($start,$limit){
		$this->db->select('*,barang.slug as slug_barang');
		$this->db->order_by('barang.id_barang','DESC');
		$this->db->join('kategori','kategori.id_kategori=barang.id_kategori');
		$this->db->limit($limit,$start);
		$query = $this->db->get($this->table);
		return $query;
	}

	public function getBarangNoAdmin(){
		$this->db->where('level!=','admin');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getBarangById($id_barang){
		$this->db->where('id_barang',$id_barang);
		$query = $this->db->get($this->table);
		return $query->row();
	}
	public function getBarangBySlug($slug){
		$this->db->select('*,barang.slug as slug_barang');
		// $this->db->where('kategori.slug',$slug);
		$this->db->where('barang.slug',$slug);
		// $this->db->join('kategori','kategori.id_kategori=barang.id_kategori');
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getBarangByKategori($id_kategori){
		$this->db->where('id_kategori',$id_kategori);
		$this->db->where('status','aktif');
		$this->db->order_by('rand()');
		$this->db->limit(3,0);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getBarangByKeyword($arr_keyword){
		foreach ($arr_keyword as $keyword) {
			$this->db->or_where("meta_keyword like '%$keyword%' ");
		}
		$this->db->where('status','aktif');
		$this->db->order_by('rand()');
		$query = $this->db->get($this->table)->result();
		return $query;
	}
	
	public function getBarangByCatSlugPagination($slug,$start,$limit){
		$this->db->select('*,barang.slug as slug_barang');
		$this->db->where('kategori.slug',$slug);
		$this->db->join('kategori','kategori.id_kategori=barang.id_kategori');
		$this->db->limit($limit,$start);
		$query = $this->db->get($this->table);
		return $query;
	}
	public function getBarangByCatSlugRow($slug){
		$this->db->select('*,barang.slug as slug_barang');
		$this->db->where('kategori.slug',$slug);
		$this->db->join('kategori','kategori.id_kategori=barang.id_kategori');
		$query = $this->db->get($this->table);
		return $query;
	}


	public function insertBarang($data){
		$this->db->insert($this->table,$data);
	}
	public function updateBarang($id_barang,$data){
		$this->db->where('id_barang',$id_barang);
		$this->db->update($this->table,$data);
	}
	public function deleteBarang($id_barang){
		if ($this->db->delete($this->table,array('id_barang'=>$id_barang))) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getBarangWin($id_user){
		$this->db->where(array('barang.status'=>'closed','bidding.status'=>'win','id_user'=>$id_user));
		$this->db->join('bidding','bidding.id_barang = barang.id_barang');
		$query = $this->db->get($this->table);
		return $query->result();
	}
}
 ?>