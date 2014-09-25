<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Group_user extends CI_Controller{
	function __Construct(){
		parent::__Construct();
		$this->breadcrumbs->push('<i class="clip-users"></i> Manajemen User','#');
		$this->breadcrumbs->push('Grup User', base_url().'group_user');
	}
	
	function index()
	{
		$xdata['source']=base_url().'group_user/grid';
		$xdata['content']=$this->load->view('grid_view',$xdata,true);
		$data['script']=$this->load->view('grid_js',$xdata,true);
		$data['act_menu']='group_user';
		$data['parent_menu']='user_manager';
		$data['title']='Grup User';
		$this->load->view('template_view',$data);
	}
	
	function grid()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		
		$this->load->model('Group_user_m');
		echo $this->Group_user_m->grid();
	}
	function delete($id=FALSE)
	{
		$this->load->model('Group_user_m');
		if($this->Group_user_m->delete($id))
		{
			$this->session->set_flashdata('success', "Data berhasil dihapus");
		}
		else
		{
			$this->session->set_flashdata('error', 'Data gagal dihapus');
		}
		
		redirect('group_user');	
	}
}