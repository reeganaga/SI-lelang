<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
class Seo extends CI_controller {

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
	var $id_user;
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
		$this->load->library('template_back');
        // $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
    }

	public function index()
	{

	}

	public  function sitemap()
    {
    	// $sitemap_kategori=$this->Kategori_model->getKategori();
    	$sitemap=$this->db->query("SELECT 'kategori' as type , slug FROM kategori UNION SELECT 'item' as type,slug as slug_barang FROM barang")->result();


        $data['data'] = $sitemap;//select urls from DB to Array
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$data);
    }
}
