<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table_model extends CI_Model {
    	
  	function grid()
	{
		$this->load->database();
		$this->load->library("datatables");
		
		$this->datatables->select('*');
		$this->datatables->from('negara');
		$this->datatables->where('id !=',0);
		$this->datatables->add_column('action', anchor('', 'test', 'class="btn btn-mini"').anchor('', 'sdsdsdsd', 'class="btn btn-mini"'), 'id');
		//$this->datatables->add_column('action','<a class="btn btn-xs btn-teal tooltips"  title="Edit" href="'.base_url().'category/edit/index/$1"><i class="fa fa-edit"></i></a> <a href="'.base_url().'category/delete/$1" onclick="return confirmModal(\'Anda akan menghapus..??\',\''.base_url().'category/delete/$1\')" class="btn btn-xs btn-bricky tooltips" title="Hapus"><i class="fa fa-times fa fa-white"></i></a>','id');
		return $this->datatables->generate();
	}
	
}
