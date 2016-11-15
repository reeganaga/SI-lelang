<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Password extends MY_Controller {

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
		$this->load->model('User_model');
        $this->has_permission('member');
		$this->id_user = $this->session->userdata('id_user');
	}

	public function index()
	{
		$this->template_front->display(
			array(
				'content'=>'front/password/content',
				'javascript'=>'front/password/custom_js'
			),
			array(
				'title'=>'Ubah Password'
			)
		);
	}

	public function proses_password(){
		// konfigurasi file validasion untuk proses pesan

		$config = array(
		        array(
		                'field' => 'password_lama',
		                'label' => 'Password Lama',
		                'rules' => 'required|callback_password_check',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'password_baru',
		                'label' => 'Password baru',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'password_baru2',
		                'label' => 'Ulangi Password',
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
			$data=array(
				'password'=>md5($this->input->post('password_baru')),
				);
			$this->User_model->updateUser($this->id_user,$data);
			$this->session->set_flashdata('msg_success','password berhasil diubah');
			redirect('member/password');
		}
	}

	public function password_check($str){
		$cek_data=array(
			'password'=>md5($this->input->post('password_lama')),
			'id_user'=>$this->id_user
		);
        $hasil = $this->User_model->cek_user($cek_data);

		if ($hasil->num_rows() == 0) {
			// echo "salah ";
			// echo md5($this->input->post('password_lama'));
			$this->form_validation->set_message('password_check', ' {field} Salah');
            return FALSE;
		}else{
			// echo "benar";
			return TRUE;
		}
	}
}
