<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_user_details')){
 
   function getSeo(){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
      $query = $ci->db->get('default_seo');
      $result = $query->result();
      return $result;
   }
}
