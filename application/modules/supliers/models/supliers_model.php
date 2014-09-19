<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supliers_model extends CI_Model {
    	
  	function grid()
	{
		$query = $this->db->get('supliers');
		return $query->result(); 
	}
	
}
