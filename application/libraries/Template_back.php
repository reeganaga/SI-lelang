<?php
class Template_back {
protected $_ci;
  function __construct()
  {
    $this->_ci =&get_instance();
  }
  function display($template,$data=null)
  {
    // konten dinamis
    // $data=array(
    //   'harga'=>'60000'
    //   );
    $data['_content']=$this->_ci->load->view(
    $template['content'],$data, true);
    if (isset($template['stylesheet'])) {
      # code...
      $data['_stylesheet']=$this->_ci->load->view(
      $template['stylesheet'],$data, true);
    }
    if (isset($template['javascript'])) {
      # code...
      $data['_javascript']=$this->_ci->load->view(
      $template['javascript'],$data, true);
    }

    // konten tetap
    $data['_header']=$this->_ci->load->view(
    'back/template/header',$data, true);
    $data['_menu']=$this->_ci->load->view(
    'back/template/menu',$data, true);
    $this->_ci->load->view('/back/template/base.php',$data);
  }
}