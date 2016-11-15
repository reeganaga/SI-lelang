<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends  CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        // $this->load->model('TermNCondition_model');
		if ($this->session->userdata('logged_in')=="") {
			redirect('auth');
		}
        // $this->load->helper('custom');
    }

    public function has_permission( $level = '' ){
        if($this->get_level() != $level){
            redirect(base_url(), 'refresh');
        }
    }

    public function get_level(){
        // return ( empty($this->session->userdata('level'))) ? LEVEL_PUBLIC : $this->session->userdata('level');
        return ( ! $this->session->userdata('level')) ? LEVEL_PUBLIC : $this->session->userdata('level');
    }
}