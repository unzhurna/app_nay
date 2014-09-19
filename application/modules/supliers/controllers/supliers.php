<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supliers extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('supliers_model');
	}	
	
	function index()
	{
		$item['supliers'] = $this->supliers_model->grid();
		$data['content'] = $this->load->view('datagrid', $item, TRUE);
		$data['script'] = $this->load->view('script', '', TRUE);
		$this->load->view('template', $data);
	}
	
	function form($id = FALSE)
	{
		
	}
	
}
