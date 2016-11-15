<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

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
        // $this->load->model('Harga_model');
        // $this->load->model('Banner_promo_model');
        $this->load->model('User_model');
		$this->load->library('template_front');
	}
	public function index()
	{
		// $this->load->view('front/home/');
		// $harga=$this->Harga_model->getHarga();
		// $bannerpromo=$this->Banner_promo_model->getBannerPromo();
		$this->template_front->display(
			array('content'=>'front/daftar/content'),
			array('title'=>'Daftar','metatag'=>getSeo())
		);
	}
	public function proses_daftar(){
		// form validation configuration
		$config = array(
		        array(
		                'field' => 'username',
		                'label' => 'Username',
		                'rules' => 'required|callback_username_check'
		        ),
		        array(
		        		'field'=>'nama_lengkap',
		        		'label'=>'Nama Lengkap',
		        		'rules'=>'required',
		        ),
		        array(
		                'field' => 'password',
		                'label' => 'Password',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'You must provide a %s.',
		                ),
		        ),
		        array(
		                'field' => 'password2',
		                'label' => 'Password Confirmation',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'tanggal',
		                'label' => 'Tanggal',
		                'rules' => 'required|callback_email_check'
		        ),
		        array(
		                'field' => 'bulan',
		                'label' => 'Bulan',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'tahun',
		                'label' => 'Tahun',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'jenis_kelamin',
		                'label' => 'Jenis Kelamin',
		                'rules' => 'required'
		        )
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			// validasi error
			$this->template_front->display(
				array('content'=>'front/daftar/content')
			);
		}else{
			// sukses validasi
			$tgl_lahir = $this->input->post('tahun')."-".$this->input->post('bulan')."-".$this->input->post('tanggal');
			$data=array(
				'username'=>$this->input->post('username'),
				'nama_lengkap'=>$this->input->post('nama_lengkap'),
				'email'=>$this->input->post('email'),
				'password'=>md5($this->input->post('password')),
				'level'=>'member',
				'tgl_lahir'=>$tgl_lahir,
				'jenis_kelamin'=>$this->input->post('jenis_kelamin')
            );
            // insert data 
				$this->User_model->insertUser($data);
				$this->template_front->display(
					array('content'=>'front/daftar/sukses')
				);		
            
		}
	}

	public function username_check($str){
		$cek_data=array('username'=>$this->input->post('username'));
        $hasil = $this->User_model->cek_user($cek_data);

		if ($hasil->num_rows() >= 1) {
			$this->form_validation->set_message('username_check', ' {field} : '.set_value('username').' Sudah digunakan');
            return FALSE;
		}else{
			return TRUE;
		}
	}
	public function email_check($str){
		$cek_data=array('email'=>$this->input->post('email'));
        $hasil = $this->User_model->cek_user($cek_data);

		if ($hasil->num_rows() >= 1) {
			$this->form_validation->set_message('email_check', ' {field} : '.set_value('email').' Sudah digunakan');
            return FALSE;
		}else{
			return TRUE;
		}
	}
}
