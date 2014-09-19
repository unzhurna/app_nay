<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen_model extends CI_Model {
    	
  	function grid()
	{
		$this->load->database();
		$this->load->library("datatables");
		$this->datatables->select('*');
		$this->datatables->from('negara');
		$this->datatables->where('id !=',0);
		$this->datatables->add_column('action', anchor('', '<i class="icon iconfa-edit"></i>', 'class="btn btn-mini"').anchor('', '<i class="icon iconfa-trash"></i>', 'class="btn btn-mini"'), 'id');
		//$this->datatables->add_column('action','<a class="btn btn-mini"  title="Edit" href="'.base_url().'category/edit/index/$1"><span class="icon iconfa-user"></span></a> <a href="'.base_url().'category/delete/$1" onclick="return confirmModal(\'Anda akan menghapus..??\',\''.base_url().'category/delete/$1\')" class="btn btn-xs btn-bricky tooltips" title="Hapus"><i class="fa fa-times fa fa-white"></i></a>','id');
		return $this->datatables->generate();
	}
	
}
