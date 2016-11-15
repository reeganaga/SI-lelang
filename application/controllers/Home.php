<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->model('Kategori_model');
        $this->load->model('Barang_model');
        // $this->load->model('Slider_model');
        // $this->load->model('Testimoni_model');
		$this->load->library('template_front');
	}
	public function index($start=null)
	{
		// $this->load->view('front/home/');
		if ($start==null) {
			$start=0;
		}
		$limit=12;
		$total_rows=$this->Barang_model->getBarangRow()->num_rows();
		$config['base_url'] = site_url().'home';
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


		$arr_kategori=$this->Kategori_model->getKategori();
		$arr_barang=$this->Barang_model->getBarangPagination($start,$limit)->result();
		// $arr_slider=$this->Slider_model->getSlider();
		// print_r($arr_slider);exit();
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		// $testimoni=$this->Testimoni_model->getTestimoniAktif();
		$this->template_front->display(
			array('content'=>'front/home/content','javascript'=>'front/home/custom_js'),
			array('pagination'=>$pagination,'arr_barang'=>$arr_barang,'arr_kategori'=>$arr_kategori,'title'=>'HOME')
		);
	}


}
