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

	function __construct(){
		parent::__construct();
		$this->load->library('template_front');
		$this->load->model('User_model');
		$this->load->helper('text');
        $this->has_permission('member');
		$this->id_user = $this->session->userdata('id_user');
	}

	public function index()
	{
		$arr_user=$this->User_model->getUserById($this->id_user);
		$this->template_front->display(
			array('content'=>'front/pengaturan/content'),
			array('arr_user'=>$arr_user,'title'=>'Pengaturan')
		);
	}

	public function simpan(){

		//konfigutasi file upload
		$config['upload_path']          = './assets/uploads/users/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']        = TRUE;
        $config['max_size']             = 500;
		$this->load->library('upload', $config);

		$lokasi_upload=$config['upload_path'];
		// konfigurasi validasi form
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
		                'field' => 'email',
		                'label' => 'Email',
		                'rules' => 'required|callback_email_check'
		        )
		);
		$this->form_validation->set_rules($config);
		//ambil data dari database
		$arr_user=$this->User_model->getUserById($this->id_user);

		if ($this->form_validation->run() == FALSE) {
			$this->template_front->display(
				array('content'=>'front/pengaturan/content'),
				array('arr_user'=>$arr_user)
			);
		}else{
			// sudah melewati validasi
		
			foreach ($arr_user as $user) {
				$gambar=$user->gambar;
			}
			// exception jika gambarnya kosong
			// if ($gambar=="") {
			// 	// jika kosong maka diupload tanpa hapus gambar sebelumnya
			// 	$this->upload->do_upload('gambar');
			// 	$this->session->set_flashdata('msg_error_upload',$this->upload->display_errors());
			// 	$gambar=$this->upload->data('file_name');
			// }else{
			// 	// jika telah terisi ditentukan apakah diupdate apa tidak, 
			// 	if ($this->upload->do_upload('gambar')) {
			// 		// jika berhasil upload maka gmbar lama dihapus
	  //               unlink($lokasi_upload.$this->input->post('gambar_temp'));
			// 		$gambar=$this->upload->data('file_name');
			// 	}else{
			// 		// jika tidak diupload maka gambar masih tetap
			// 		$gambar=$this->input->post('gambar_temp');
			// 	}
			// 	$this->session->set_flashdata('msg_error_upload',$this->upload->display_errors());
			// }
			// $this->do_resize();
			$data=array(
				'username'=>$this->input->post('username'),
				'email'=>$this->input->post('email'),
				'nama_lengkap'=>$this->input->post('nama_lengkap'),
				'alamat'=>$this->input->post('alamat'),
				'no_hp'=>$this->input->post('no_hp'),
				// 'gambar'=>$gambar
			);
			
			$this->User_model->updateUser($this->id_user,$data);
			$this->session->set_flashdata('msg_success',"Data Berhasil diperbarui");
				redirect('member/pengaturan');
		}
	}

	public function username_check($str){
		$cek_data=array(
			'username'=>$this->input->post('username'),
			'id_user !='=>$this->id_user
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
	public function do_resize()
	{
	    $filename = $this->upload->data('file_name');
	    $source_path = './assets/uploads/users/' . $filename;
	    echo $source_path;
	    $target_path = './assets/uploads/users/';
	    $config_manip = array(
	        'image_library' => 'gd2',
	        'source_image' => $source_path,
	        'new_image' => $target_path,
	        'maintain_ratio' => TRUE,
	        'create_thumb' => TRUE,
	        'thumb_marker' => '_thumb',
	        'width' => 150,
	        'height' => 150
	    );
	    $this->load->library('image_lib', $config_manip);
	    if (!$this->image_lib->resize()) {
	        echo $this->image_lib->display_errors();
	    }
	    // clear //
	    $this->image_lib->clear();
	}
}
