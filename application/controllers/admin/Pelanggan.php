<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends MY_Controller {

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
		$arr_pelanggan = $this->User_model->getUserNoAdmin();
		$this->template_back->display(
			array(
				'content'=>'back/pelanggan/content',
				'stylesheet'=>'back/pelanggan/custom_css',
				'javascript'=>'back/pelanggan/custom_js'
			),
			array(
				'arr_pelanggan'=>$arr_pelanggan
			)
		);	
	}

	public function detail($id_user){
		$arr_pelanggan = $this->User_model->getUserById($id_user);

		$this->template_back->display(
			array(
				'content'=>'back/pelanggan/content_detail'
			),
			array(
				'arr_pelanggan'=>$arr_pelanggan
			)
		);

	}

	public function ubah(){
		$id_user=$this->input->post('id_user');
		// konfigurasi validasi gambar
		$config = array(
		        array(
		                'field' => 'nama_lengkap',
		                'label' => 'Nama Lengkap',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'username',
		                'label' => 'username',
		                'rules' => 'required|callback_username_check',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'email',
		                'label' => 'email',
		                'rules' => 'required|callback_email_check',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'alamat',
		                'label' => 'alamat',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'no_hp',
		                'label' => 'No Hp',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		);
		$this->form_validation->set_rules($config);		
		if ($this->form_validation->run()==false) {
			//jika tidak valid
			$this->detail($id_user);
		}else{
			//jika valid maka proses update
			$tgl_lahir = $this->input->post('tahun')."-".$this->input->post('bulan')."-".$this->input->post('tanggal');
			$data=array(
				'nama_lengkap'=>$this->input->post('nama_lengkap'),
				'username'=>$this->input->post('username'),
				'email'=>$this->input->post('email'),
				'alamat'=>$this->input->post('alamat'),
				'no_hp'=>$this->input->post('no_hp'),
				'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
				'tgl_lahir'=>$tgl_lahir
			);
			$this->User_model->updateUser($id_user,$data);
			$this->session->set_flashdata('msg_success','Data Pelanggan berhasil diubah');
			redirect('admin/pelanggan/detail/'.$id_user);
		}
	}

	public function ubah_password(){
		// konfigurasi file validasion untuk proses pesan
		$id_user=$this->input->post('id_user');
		$config = array(
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
			$this->User_model->updateUser($id_user,$data);
			$this->session->set_flashdata('msg_success','password berhasil diubah');
			redirect('admin/pelanggan/detail/'.$id_user);
		}		
	}

	public function hapus($id_user){
		$arr_user = $this->User_model->getUserById($id_user);
		foreach ($arr_user as $user) {
			$gambar = $user->gambar;
		}
		// $this->User_model->deleteUser($id_user);
		// echo $error_message;
		if ($this->User_model->deleteUser($id_user)==FALSE) {
		//jika gagal hapus data
			$this->session->set_flashdata('msg_error','Pelanggan gagal dihapus karena masih digunakan di tabel transaksi, dan testimoni');
		}else{
			unlink('./assets/uploads/users/'.$gambar);
			$this->session->set_flashdata('msg_success','Data Pelanggan telah dihapus');
		}
		redirect('admin/pelanggan');
	}

	public function username_check($str){
		$cek_data=array(
			'username'=>$this->input->post('username'),
			'id_user !='=>$this->input->post('id_user')
		);
        $hasil = $this->User_model->cek_user($cek_data);

		if ($hasil->num_rows() >= 1) {
			$this->form_validation->set_message('username_check', ' {field} : '.set_value('username').' Sudah digunakan');
            return FALSE;
		}else{
			return TRUE;
		}
	}
	public function email_check($str){
		$cek_data=array(
			'email'=>$this->input->post('email'),
			'id_user !='=>$this->input->post('id_user')
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
