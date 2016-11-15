<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends MY_Controller {

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
        $this->load->model('User_model');
		$this->load->library('template_back');
        $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
    }

	public function index()
	{	
		$arr_user = $this->User_model->getUserById($this->id_user);
		$this->template_back->display(
			array(
				'content'=>'back/pengaturan/content',
				'javascript'=>'back/pengaturan/custom_js'
			),
			array(
				'arr_user'=>$arr_user,
				'arr_seo'=>getSeo()
			)
		);	
	}

	public function ubah(){
		$id_kota = $this->input->post('id');

		// konfigurasi validasi form
		$config = array(
		        array(
		        		'field'=>'nama_lengkap',
		        		'label'=>'Nama Lengkap',
		        		'rules'=>'required',
		        ),
		        array(
		                'field' => 'email',
		                'label' => 'Email',
		                'rules' => 'required|callback_email_check'
		        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run()==FALSE) {
			//jika tidak valid
			$this->index();
		}else{
			//jika valid
			// $gambar = $this->upload();
			$data = array(
				'nama_lengkap'=>$this->input->post('nama_lengkap'),
				'email'=>$this->input->post('email'),
				'alamat'=>$this->input->post('alamat'),
				'no_hp'=>$this->input->post('no_hp'),
				// 'gambar'=>$gambar,
			);
			$this->User_model->updateUser($this->id_user,$data);
			$this->session->set_flashdata('msg_success','Data Admin berhasil diubah');
			redirect('admin/pengaturan');
		}
	}

	public function ubah_password(){
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
		                'field' => 'password2',
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
			redirect('admin/pengaturan');
		}
	}

	public function add_seo(){
		$data = array(
			'meta_title'=>$this->input->post('meta_title'),
			'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
			'meta_keyword'=>$this->input->post('meta_keyword'),
		);
		$this->db->insert('default_seo',$data);
		$this->session->set_flashdata('msg_success','Data SEO berhasil diubah');
		redirect('admin/pengaturan');
	}

	public function edit_seo(){
		$data = array(
			'meta_title'=>$this->input->post('meta_title'),
			'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
			'meta_keyword'=>$this->input->post('meta_keyword'),
		);
		$this->db->update('default_seo',$data);
		$this->session->set_flashdata('msg_success','Data SEO berhasil diubah');
		redirect('admin/pengaturan');
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
	public function email_check($str){
		$cek_data=array(
			'email'=>$this->input->post('email'),
			'id_user !='=>$this->id_user
		);
        $hasil = $this->User_model->cek_user($cek_data);

		if ($hasil->num_rows() >= 1) {
			$this->form_validation->set_message('email_check', ' {field} : '.set_value('email').' Sudah digunakan');
            return FALSE;
		}else{
			return TRUE;
		}
	}	


}
