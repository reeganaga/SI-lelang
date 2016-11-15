<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MY_Controller {

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
        $this->load->model('Slider_model');
		$this->load->library('template_back');
        $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
    }

	public function index()
	{	
		$arr_slider = $this->Slider_model->getSlider();
		$this->template_back->display(
			array(
				'content'=>'back/slider/content',
				'javascript'=>'back/slider/custom_js',
				// 'javascript'=>'back/banner_promo/custom_js'
			),
			array(
				'arr_slider'=>$arr_slider
			)
		);					
	}

	public function tambah()
	{	
		$this->template_back->display(
			array(
				'content'=>'back/hto/add',
				'javascript'=>'back/hto/custom_js',
				'stylesheet'=>'back/hto/custom_css'
				// 'javascript'=>'back/banner_promo/custom_js'
			)
		);				
	}	

	public function editSlider(){
		$arr_slider = $this->Slider_model->getSlider();
		$this->template_back->display(
			array(
				'content'=>'back/hto/edit',
				'javascript'=>'back/hto/custom_js',
				'stylesheet'=>'back/hto/custom_css'
				// 'javascript'=>'back/banner_promo/custom_js'
			),
			array(
				'arr_slider'=>$arr_slider
			)
		);		
	}

	public function deleteGaleri($id_master_slider){
		$arr_slider = $this->Slider_model->getSliderById($id_master_slider);	
		foreach ($arr_slider as $row) {
			//hapus gambar
			unlink('./assets/uploads/slider/'.$row->gambar);
			$this->Slider_model->deleteSlider($id_master_slider);
			redirect('admin/slider');
		}
	}	

	public function editSliderProses(){

         	$id=$this->input->post('id');

			if ($_FILES['gambar']['name']) {
         		$this->upload();
         		$gambar=$this->upload->data('file_name');
         	}else{
         		$gambar=$this->input->post('gambar_temp');;
         	}

			$data= array(
			"alt_gambar"=>$this->input->post('alt_gambar'),
			"deskripsi"=>$this->input->post('deskripsi'),
			"gambar"=>$gambar
			);
			if ($this->Slider_model->updateSlider($id,$data)) {
            	$this->session->set_flashdata('msg_error','data gagal disimpan');
			}else{
            	$this->session->set_flashdata('msg_success','data berhasil disimpan');
			}			
			redirect('admin/slider');
		
	}

	public function tambah_proses(){
		$this->upload();
			$data= array(
			"deskripsi"=>$this->input->post('deskripsi'),
			"alt_gambar"=>$this->input->post('alt_gambar'),
			"gambar"=>$this->upload->data('file_name')
			);
		$this->Slider_model->insertSlider($data);
		$this->session->set_flashdata('msg_success','Data berhasil ditamabah');
		redirect('admin/slider');
	}

	public function upload(){
		$config['upload_path']          = './assets/uploads/slider/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']        = TRUE;
        $config['max_size']             = 500;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        
		$arr_slider = $this->Slider_model->getSlider();
		if ($arr_slider) {
			//jika data isi
			if ($this->upload->do_upload('gambar')) {
            	unlink($config['upload_path'].$this->input->post('gambar_temp'));				
			}else{
                $this->session->set_flashdata('msg_error',$this->upload->display_errors());
				redirect('admin/slider');
			}
		}else{
                if ( ! $this->upload->do_upload('gambar'))
                {
                    $this->session->set_flashdata('msg_error',$this->upload->display_errors());
					redirect('admin/slider');
                }		
		}
	}

}
