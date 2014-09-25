<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('user_model');
	}	
	
	function index()
	{
		$item['source']= base_url().'user/grid';
		$data['menu']='user';
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
		echo $this->user_model->grid();
	}
	
	function post($id = FALSE)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
			
		if($id)
		{
			$item = (array) $this->dosen_model->get_dosen($id);
		}
		else
		{
			$item = array(
				'id'=>$id,
				'ndn'=>'',
				'nama'=>'',
				'id_jurusan'=>''
			);	
		}
		$item['opt_jurusan'] = $this->dosen_model->opt_jurusan();
		
		$this->form_validation->set_rules('ndn', 'NDN', 'required|numeric');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('id_jurusan', 'jurusan', 'required');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['menu']='dosen';
			$data['content'] = $this->load->view('form', $item, TRUE);
			$this->load->view('template', $data);	
		}
		else
		{
			$save['id'] = $id;
			$save['ndn'] = $this->input->post('ndn');
			$save['nama'] = $this->input->post('nama');
			$save['id_jurusan'] = $this->input->post('id_jurusan');
			
			$this->dosen_model->save_dosen($save);
			redirect('dosen');
		}
	}
	
	function delete($id)
	{
		$this->dosen_model->delete_dosen($id);
		redirect('dosen');
	}
	
}