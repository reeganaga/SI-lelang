<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends MY_Controller {

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
        $this->load->model('Kota_model');
		$this->load->library('template_back');
        $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
    }

	public function index()
	{	
		$arr_pengiriman = $this->Kota_model->getKota();
		$this->template_back->display(
			array(
				'content'=>'back/pengiriman/content',
				'stylesheet'=>'back/pengiriman/custom_css',
				'javascript'=>'back/pengiriman/custom_js'
			),
			array(
				'arr_pengiriman'=>$arr_pengiriman
			)
		);	
	}

	public function tambah(){

		$config = array(
		        array(
		                'field' => 'nama_kota',
		                'label' => 'Nama Kota',
		                'rules' => 'required|callback_namakota_check',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'tarif',
		                'label' => 'Tarif',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        )
		);
		$this->form_validation->set_rules($config);			

		if ($this->form_validation->run()==false) {
			//jika gagal
			$this->index();
		}else{
			//jika berhasil
			$data = array(
				'nama_kota'=>$this->input->post('nama_kota'),
				'tarif'=>$this->input->post('tarif')
			);
			$this->Kota_model->insertKota($data);
			$this->session->set_flashdata('msg_success','Kota berhasil ditambahkan');
			redirect('admin/pengiriman');
		}
	}

	public function ubah(){
		$id_kota = $this->input->post('id');

		$data = array(
			'nama_kota'=>$this->input->post('nama_kota'),
			'tarif'=>$this->input->post('tarif')
		);
		$this->Kota_model->updateKota($id_kota,$data);
		$this->session->set_flashdata('msg_success','Kota '.$this->input->post('nama_kota').' berhasil diubah');
		redirect('admin/pengiriman');
	}

	public function hapus($id_kota){
		$this->Kota_model->deleteKota($id_kota);
		$this->session->set_flashdata('msg_success','id Kota = '.$id_kota.' berhasil dihapus');
		redirect('admin/pengiriman');
	}

	public function namakota_check($str){
		$cek_data=array(
			'nama_kota'=>$this->input->post('nama_kota')
		);
        $hasil = $this->Kota_model->cek_kota($cek_data);

		if ($hasil->num_rows() >= 1) {
			$this->form_validation->set_message('namakota_check', ' {field} : '.set_value('nama_kota').' Sudah digunakan');
            return FALSE;
		}else{
			return TRUE;
		}
	}

}
