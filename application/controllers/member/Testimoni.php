<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testimoni extends MY_Controller {

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

	function __construct(){
		parent::__construct();
		$this->load->library('template_front');
		$this->load->model('Testimoni_model');
        $this->has_permission('member');
		$this->id_user = $this->session->userdata('id_user');
	}

	public function index()
	{
		
		if ($arr_testimoni = $this->Testimoni_model->getTestimoniByUser($this->id_user)) {
			foreach ($arr_testimoni as $testimoni) {
				$isi_testimoni = $testimoni->isi_testimoni;
			}
		}else{
			$isi_testimoni ="";
		}
		$this->template_front->display(
			array(
				'content'=>'front/testimoni/content'
			),
			array(
				'isi_testimoni'=>$isi_testimoni
			)
		);
	}

	public function proses_testimoni(){
		// konfigurasi file validasion untuk proses pesan

		$config = array(
		        array(
		                'field' => 'isi_testimoni',
		                'label' => 'Testimoni',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        )
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			// jika form tidak diisi
			$this->index();
		}else{
			// jika valid dan diisi maka diproses

			$query_testimoni = $this->Testimoni_model->cek_testimoni(array('id_user'=>$this->id_user));
			
			$data=array(
				'isi_testimoni'=>$this->input->post('isi_testimoni'),
				'status'=>'non-aktif',
				'id_user'=>$this->id_user
				);
			if ($query_testimoni->num_rows()==0) {
				//jika belum pernah mengisi testimoni
				$this->Testimoni_model->insertTestimoni($data);
			}else{
				//jika sudah pernah mengisi testimoni
				$this->Testimoni_model->updateTestimoni($this->id_user,$data);
			}
			
			$this->session->set_flashdata('msg_success','Testimoni berhasil disimpan');
			redirect('member/testimoni');
		}
	}
}
