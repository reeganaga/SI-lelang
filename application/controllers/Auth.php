<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
        // $this->load->model('About_model');
		$this->load->model('Login_model','',TRUE);
	}

	public function index(){
		$this->load->view('login/login_view');
		// $this->load->view('')
	}

	public function cek_login(){
		$data = array(
				'username'=> $this->input->post('username',TRUE),
				'password'=> md5($this->input->post('password',TRUE))
			);
		// echo "username = ".$data['username'];
			// echo "<br>password = ".$data['password'];
		$hasil = $this->Login_model->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Login';
				$sess_data['id_user'] = $sess->id_user;
				$sess_data['username'] = $sess->username;
				$sess_data['nama_lengkap'] = $sess->nama_lengkap;
				$sess_data['email'] = $sess->email;
				$sess_data['alamat'] = $sess->alamat;
				$sess_data['no_hp'] = $sess->no_hp;
				$sess_data['gambar'] = $sess->gambar;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='member') {
				redirect('member/dashboard');

			}elseif ($this->session->userdata('level')=='admin') {
				redirect('admin/dashboard');
			}
		}else{
			// echo "<script>alert('Gagal Login:cek username atau password');history.go(-1);</script>";
			$this->session->set_flashdata('msg_error','Gagal Login : Username atau password salah');
			redirect('auth');
		}
	}
	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('auth','refresh');
	}	
}
?>