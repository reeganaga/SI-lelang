<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {

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
		// if ($this->session->userdata('logged_in')=="") {
		// 	redirect('auth');
		// }
		$this->load->library('template_front');
		$this->load->model('User_model');
        $this->has_permission('member');
		$this->load->helper('text');
	}

	public function index()
	{
		$id_user=$this->session->userdata('id_user');

		$arr_user=$this->User_model->getUserById($id_user);
		$this->template_front->display(
			array('content'=>'front/dashboard/content',
				'javascript'=>'front/dashboard/custom_js',
				'stylesheet'=>'front/dashboard/custom_css',

				),
			array('arr_user'=>$arr_user,'title'=>'Dashboard Member')
		);
	}

}
