<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		//$this->load->model('supliers_model');
	}	
	
	function index()
	{
		$xdata['source']=base_url().'table/grid';
		$data['content']=$this->load->view('datagrid',$xdata,TRUE);
		$data['script']=$this->load->view('script','',TRUE);
		$this->load->view('template',$data);
	}
	
	function grid()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		$this->load->model('table_model');
		echo $this->table_model->grid();
	}
	
}