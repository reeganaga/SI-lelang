<?php 

/**
* 
*/
class User_model extends CI_Model
{
	public $table='user';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_user($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getUser(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getUserNoAdmin(){
		$this->db->where('level!=','admin');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getUserById($id_user){
		$this->db->where('id_user',$id_user);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function insertUser($data){
		$this->db->insert($this->table,$data);
	}
	public function updateUser($id_user,$data){
		$this->db->where('id_user',$id_user);
		$this->db->update($this->table,$data);
	}
	public function deleteUser($id_user){
		if ($this->db->delete($this->table,array('id_user'=>$id_user))) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
 ?>