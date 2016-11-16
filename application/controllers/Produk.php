<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
        $this->load->model('Bidding_model');
		$this->load->library('template_front');
	}
	public function index($start=null)
	{

		if ($start==null) {
			$start=0;
		}
		$limit=12;
		$total_rows=$this->Barang_model->getBarangRow()->num_rows();
		$config['base_url'] = site_url().'produk/page';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();

		// $this->load->view('front/home/');
		$arr_barang=$this->Barang_model->getBarangPagination($start,$limit)->result();
		$arr_kategori=$this->Kategori_model->getKategori();		
		$this->template_front->display(
			array('content'=>'front/produk/all_product',
				'javascript'=>'front/produk/custom_js'),
			array('pagination'=>$pagination,'arr_barang'=>$arr_barang,'arr_kategori'=>$arr_kategori,'title'=>'Produk','metatag'=>getSeo())
		);
	}

	public function kategori($slug,$start=null){

		if ($start==null) {
			$start=0;
		}
		$limit=12;
		$total_rows=$this->Barang_model->getBarangByCatSlugRow($slug)->num_rows();
		$config['base_url'] = site_url().'kategori/'.$slug;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();

		// $this->load->view('front/home/');
		$arr_barang=$this->Barang_model->getBarangByCatSlugPagination($slug,$start,$limit)->result();
		$arr_kategori=$this->Kategori_model->getKategori();		
		$arr_kategori_row=$this->Kategori_model->getKategoriBySlug($slug);		
		$this->template_front->display(
			array('content'=>'front/produk/all_product_kategori',
				'javascript'=>'front/produk/custom_js'),
			array('pagination'=>$pagination,'arr_barang'=>$arr_barang,'arr_kategori'=>$arr_kategori,'metatag'=>$arr_kategori_row,'slug'=>$slug)
		);
	}
	public function slug($slug)
	{
		// $this->load->view('front/home/');
		// megnambil data barang
		$arr_barang=$this->Barang_model->getBarangBySlug($slug);
		foreach ($arr_barang as $barang) {
			$id_kategori = $barang->id_kategori;
			$arr_kategori = $this->Kategori_model->getKategoriById($barang->id_kategori);
		}
		// split keyword menjadi array untuk disearch menggunakan like
		// mengambil data barang berdasarkan keyword
		// $arr_rekomendasi = $this->Barang_model->getBarangByKeyword($arr_keyword);
		// echo $this->db->last_query();
		// print_r($arr_rekomendasi);
		// exit();
		// mengambil data barang terkait berdasrkan kategori yang sama
		$arr_terkait = $this->Barang_model->getBarangByKategori($id_kategori);
		$arr_kategori = $this->Kategori_model->getKategori();		
		$arr_bidder = $this->Bidding_model->getBiddingByBarang($barang->id_barang);
		$this->template_front->display(
			array('content'=>'front/produk/content',
				'javascript'=>'front/produk/custom_js'),
			array('arr_barang'=>$arr_barang,'arr_kategori'=>$arr_kategori,'title'=>$barang->nama_barang,'arr_terkait'=>$arr_terkait,'arr_bidder'=>$arr_bidder)
		);
	}

	public function bidding(){
		$config = array(
		        array(
		                'field' => 'jml_bidding',
		                'label' => 'Jumlah Bidding',
		                'rules' => 'required|callback_jmlbidding_check',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'id_barang',
		                'label' => 'Id Barang',
		                'rules' => 'required|callback_barang_check',
		        ),

		);
		$this->form_validation->set_rules($config);	

		if ($this->form_validation->run() == TRUE) {
			$id_barang = $this->input->post('id_barang');
			$jml_bidding = $this->input->post('jml_bidding');
			$id_user = $this->session->userdata('id_user');

			$data = array(
				'id_barang'=>$this->input->post('id_barang'),
				'id_user'=>$this->session->userdata('id_user'),
				'tgl_bidding'=>date('Y-m-d H:i:s'),
				'jml_bidding'=>$this->input->post('jml_bidding'),
			);
			//cek apakah pernah bidding atau belum ?
			$check_bidding = $this->Bidding_model->cek_bidding(array('id_barang'=>$id_barang,'id_user'=>$id_user));
			if ($check_bidding->num_rows()==1) {
				//update ke tabel bidding
				$data_bidding = $check_bidding->row();
				$insert_bidding = $this->Bidding_model->updateBidding($data_bidding->id_bidding,$data);
			}else{
				// insert ke tabel bidding
				$insert_bidding = $this->Bidding_model->insertBidding($data);
			}
			
			//mengubah data expired barang
			$now = date_create(date("Y-m-d 00:00:00"));
			$next_day = date_add($now, date_interval_create_from_date_string('2 days'));
			$tgl_expired = date_format($next_day, 'Y-m-d H:i:s');

			$update_barang = $this->Barang_model->updateBarang($this->input->post('id_barang'),array('tgl_expired'=>$tgl_expired,'harga_deal'=>$jml_bidding,'status'=>'bidding'));
			$this->session->set_flashdata('msg_success', 'Anda telah berhasil bidding');
			redirect('item/'.$this->input->post('slug_barang'));
		} else {
			# code...
			$this->slug($this->input->post('slug_barang'));
		}
	}

	public function search(){
		$string = $_GET['s'];
		// echo $string;
		$this->db->select('*,barang.slug as slug_barang');
		$this->db->join('kategori','kategori.id_kategori=barang.id_kategori');
		$this->db->where('status','aktif');
		$this->db->like('nama_barang',$string);
		$arr_barang = $this->db->get('barang')->result();
		// $data=$this->db
		// ->join('kategori','kategori.id_kategori.barang.id_kategori')
		// ->get('barang')->result();
		$arr_kategori=$this->Kategori_model->getKategori();		
		$this->template_front->display(
			array('content'=>'front/produk/all_product_search',
				'javascript'=>'front/produk/custom_js'),
			array('arr_barang'=>$arr_barang,'arr_kategori'=>$arr_kategori,'metatag'=>$arr_barang,'search'=>$string)
		);
		// print_r($query);
		// exit();
	}

	public function barang_check($str){
		$cek_data=array('id_barang'=>$this->input->post('id_barang'));
		$now = date('Y-m-d H:i:s');
        $hasil = $this->db->where(array('tgl_expired >= '=>$now))->or_where(array('tgl_expired'=>'0000-00-00 00:00:00'))->get('barang');

		if ($hasil->num_rows() >= 1) {
			return TRUE;
		}else{
			$this->form_validation->set_message('barang_check', ' {field} : Kode barang '.set_value('id_barang').' tidak dapat dilakukan bidding');
            return FALSE;
		}
	}
	public function jmlbidding_check($str){
		$id_barang = $this->input->post('id_barang');
		$cek_data=array('harga_deal'=>'0','id_barang'=>$id_barang);

		$now = date('Y-m-d H:i:s');
		$cek_barang = $this->db->where($cek_data)->get('barang');

		if ($cek_barang->num_rows()==1) {
			//barang belum pernah di bid
			$jml_bidding = $this->input->post('jml_bidding');
        	$hasil = $this->db->where(array('harga < '=>$jml_bidding,'id_barang'=>$id_barang))->get('barang');
			if ($hasil->num_rows() >= 1) {
				return TRUE;
			}else{
				$this->form_validation->set_message('jmlbidding_check', ' {field} :'.set_value('jml_barang').' Harus lebih besar dari harga awal');
	            return FALSE;
			}
		}else{
			//barang pernah di bid
			$jml_bidding = $this->input->post('jml_bidding');
        	$hasil = $this->db->where(array('harga_deal < '=>$jml_bidding,'id_barang'=>$id_barang))->get('barang');
			if ($hasil->num_rows() >= 1) {
				return TRUE;
			}else{
				$this->form_validation->set_message('jmlbidding_check', ' {field} :'.set_value('jml_barang').' Harus lebih besar');
	            return FALSE;
			}
		}

	}
}
