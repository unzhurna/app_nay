<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		//$this->load->model('supliers_model');
	}	
	
	function index()
	{
		$item['source']= base_url().'dosen/grid';
		$data['content']= $this->load->view('datagrid', $item, TRUE);
		$data['script']= $this->load->view('script', '', TRUE);
		$this->load->view('template',$data);
	}
	
	function grid()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		$this->load->model('dosen_model');
		echo $this->dosen_model->grid();
	}
	
}