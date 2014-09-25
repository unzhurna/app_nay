<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_user extends CI_Controller{
	function __Construct(){
		parent::__Construct();
		$this->breadcrumbs->push('<i class="clip-users"></i> Manajemen User','#');
		$this->breadcrumbs->push('Data User', base_url().'admin_user');
	}
	function index()
	{
		
		$xdata['source']=base_url().'admin_user/grid';
		$data['script']=$this->load->view('grid_js',$xdata,true);
		$data['content']=$this->load->view('grid_view',$xdata,true);
		$data['act_menu']='admin_user';
		$data['title']='Data User';
		$data['parent_menu']='user_manager';
		$this->load->view('template_view',$data);
	}
	
	function grid()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		
		$this->load->model('Admin_user_m');
		echo $this->Admin_user_m->grid();
	
	}
	function delete($id=FALSE)
	{
		$this->load->model('Admin_user_m');
		if($this->Admin_user_m->delete($id))
		{
			$this->session->set_flashdata('success', "Data berhasil dihapus");
		}
		else
		{
			$this->session->set_flashdata('error', 'Data gagal dihapus');
		}
		
		redirect('admin_user');	
	}
}