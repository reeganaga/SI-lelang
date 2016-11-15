<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Merchandise extends MY_Controller {

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
		$this->load->model('Keranjang_model');
		$this->load->model('OrnamenAtas_model');
		$this->load->model('OrnamenKonten_model');
		$this->load->model('OrnamenBawah_model');
		$this->load->helper('text');
        $this->has_permission('member');
		$this->id_user = $this->session->userdata('id_user');
	}

	public function index()
	{
		// $this->template_front->display(
		// 	array('content'=>'front/merchandise/content')
		// );
		$this->mobile();
	}

	public function mobile(){
		$arr_ornamen_atas = $this->OrnamenAtas_model->getOrnamenAtas();
		$arr_ornamen_konten = $this->OrnamenKonten_model->getOrnamenKonten();
		$arr_ornamen_bawah = $this->OrnamenBawah_model->getOrnamenBawah();

		$this->template_front->display(
			array(
				'content'=>'front/merchandise/content_mobile',
				'javascript'=>'front/merchandise/custom_js_mobile',
				'stylesheet'=>'front/merchandise/custom_css_mobile'
			),
			array(
				'arr_ornamen_atas'=>$arr_ornamen_atas,
				'arr_ornamen_konten'=>$arr_ornamen_konten,
				'arr_ornamen_bawah'=>$arr_ornamen_bawah
			)
		);
	}

	public function desktop(){
		$arr_ornamen_atas = $this->OrnamenAtas_model->getOrnamenAtas();
		$arr_ornamen_konten = $this->OrnamenKonten_model->getOrnamenKonten();
		$arr_ornamen_bawah = $this->OrnamenBawah_model->getOrnamenBawah();

		$this->template_front->display(
			array(
				'content'=>'front/merchandise/content_desktop',
				'javascript'=>'front/merchandise/custom_js_desktop',
				'stylesheet'=>'front/merchandise/custom_css_desktop'
			),
			array(
				'arr_ornamen_atas'=>$arr_ornamen_atas,
				'arr_ornamen_konten'=>$arr_ornamen_konten,
				'arr_ornamen_bawah'=>$arr_ornamen_bawah
			)
		);
	}

	public function keranjang(){

		//konfigutasi file upload
		$config['upload_path']          = './assets/uploads/orders/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['encrypt_name']        = TRUE;
        $config['max_size']             = 900;
		$this->load->library('upload', $config);
		
		$lokasi_upload=$config['upload_path'];

		// konfigurasi validasi gambar
		if (empty($_FILES['gambar']['name']))
		{
		    $this->form_validation->set_rules('gambar', 'Foto', 'required', array('required' => '%s Perlu diisi'));
		}
		$config = array(
		        array(
		                'field' => 'ucapan',
		                'label' => 'Ucapan',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		        		'field'=>'tema',
		        		'label'=>'Tema',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		        		'field'=>'ornamen_atas',
		        		'label'=>'Ornamen Atas',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu dipilih.')
		        ),
		        array(
		        		'field'=>'ornamen_bawah',
		        		'label'=>'Ornamen Bawah',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu dipilih.')
		        )
		);
		$this->form_validation->set_rules($config);

		// exception untuk validasi form
		if ($this->form_validation->run() == FALSE) {
			if ($this->input->post('device')=='mobile') {
				$this->mobile();
			}else{
				$this->desktop();
			}
		}else{
			// sudah melewati validasi
				// proses upload foto
			if ($this->upload->do_upload('gambar')) {
				# code...
				// jika berhasil upload foto maka selanjutnya insert data ke database
				$data=array(
					'ucapan'=>$this->input->post('ucapan'),
					'tema'=>$this->input->post('tema'),
					'tambahan'=>$this->input->post('tambahan'),
					'ornamen_atas'=>$this->input->post('ornamen_atas'),
					'ornamen1'=>$this->input->post('ornamen1'),
					'ornamen2'=>$this->input->post('ornamen2'),
					'ornamen3'=>$this->input->post('ornamen3'),
					'ornamen4'=>$this->input->post('ornamen4'),
					'ornamen5'=>$this->input->post('ornamen5'),
					'ornamen6'=>$this->input->post('ornamen6'),
					'ornamen_bawah'=>$this->input->post('ornamen_bawah'),
					'gambar'=>$this->upload->data('file_name'),
					'id_user'=>$this->id_user
				);
				
				$this->Keranjang_model->insertKeranjang($data);
				$this->session->set_flashdata('msg_success',"Data Berhasil dimasukkan keranjang");
					redirect('member/keranjang');
			}else{
				// jika gagal upload foto maka diredirect ke halaman merchandise
				$this->session->set_flashdata('msg_error_upload',$this->upload->display_errors());
				if ($this->input->post('device')=='mobile') {
					$this->mobile();
				}else{
					$this->index();
				}
				// redirect('member/merchandise');
			}
				
			
			
		}
	}

}
