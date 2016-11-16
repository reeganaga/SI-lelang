<?php 

/**
* 
*/
class Bidding_model extends CI_Model
{
	public $table='bidding';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_bidding($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getBidding(){
		$this->db->order_by('bidding.id_bidding','DESC');
		$this->db->join('barang','barang.id_barang=bidding.id_barang');
		$this->db->join('user','user.id_user=bidding.id_user');
		$this->db->order_by('bidding.jml_bidding', 'desc');
		$this->db->group_by('bidding.id_barang');
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getAmountBidder($id_barang){
		$this->db->select('count(id_bidding) as jml_bidder');
		$this->db->where('id_barang', $id_barang);
		$this->db->group_by('id_barang');
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function getBiddingRow(){
		$this->db->select('*,bidding.slug as slug_bidding');
		$this->db->order_by('bidding.id_bidding','DESC');
		$this->db->join('kategori','kategori.id_kategori=bidding.id_kategori');
		$query = $this->db->get($this->table);
		return $query;
	}

	public function getBiddingPagination($start,$limit){
		$this->db->select('*,bidding.slug as slug_bidding');
		$this->db->order_by('bidding.id_bidding','DESC');
		$this->db->join('kategori','kategori.id_kategori=bidding.id_kategori');
		$this->db->limit($limit,$start);
		$query = $this->db->get($this->table);
		return $query;
	}


	public function getBiddingById($id_bidding){
		$this->db->where('id_bidding',$id_bidding);
		$query = $this->db->get($this->table);
		return $query->row();
	}
	public function getBiddingByBarang($id_barang){
		$this->db->where('id_barang',$id_barang);
		$this->db->join('user','user.id_user=bidding.id_user');
		$this->db->order_by('jml_bidding','DESC');
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getBiddingByKategori($id_kategori){
		$this->db->where('id_kategori',$id_kategori);
		$this->db->where('status','aktif');
		$this->db->order_by('rand()');
		$this->db->limit(3,0);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getBiddingByKeyword($arr_keyword){
		foreach ($arr_keyword as $keyword) {
			$this->db->or_where("meta_keyword like '%$keyword%' ");
		}
		$this->db->where('status','aktif');
		$this->db->order_by('rand()');
		$query = $this->db->get($this->table)->result();
		return $query;
	}
	
	public function getBiddingByCatSlugPagination($slug,$start,$limit){
		$this->db->select('*,bidding.slug as slug_bidding');
		$this->db->where('kategori.slug',$slug);
		$this->db->join('kategori','kategori.id_kategori=bidding.id_kategori');
		$this->db->limit($limit,$start);
		$query = $this->db->get($this->table);
		return $query;
	}
	public function getBiddingByCatSlugRow($slug){
		$this->db->select('*,bidding.slug as slug_bidding');
		$this->db->where('kategori.slug',$slug);
		$this->db->join('kategori','kategori.id_kategori=bidding.id_kategori');
		$query = $this->db->get($this->table);
		return $query;
	}


	public function insertBidding($data){
		$this->db->insert($this->table,$data);
	}
	public function updateBidding($id_bidding,$data){
		$this->db->where('id_bidding',$id_bidding);
		$this->db->update($this->table,$data);
	}
	public function deleteBidding($id_bidding){
		if ($this->db->delete($this->table,array('id_bidding'=>$id_bidding))) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
 ?>