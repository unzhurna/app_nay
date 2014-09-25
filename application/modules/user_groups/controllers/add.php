<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add extends CI_Controller{
	function __Construct(){
		parent::__Construct();
		$this->load->library('form_validation');
		$this->breadcrumbs->push('<i class="clip-users"></i> Manajemen User','#');
		$this->breadcrumbs->push('Grup User', base_url().'group_user');
		$this->breadcrumbs->push('Tambah Grup User', base_url().'group_user/add');
	}
	function index()
	{
		
		$xdata['post_url']=base_url().'group_user/add/post';
		$data['title']='Tambah Grup User';
		$data['content']=$this->load->view('form_view',$xdata,true);
		$data['script']=$this->load->view('form_js','',true);
		$data['act_menu']='group_user';
		$data['parent_menu']='user_manager';
		$this->load->view('template_view',$data);
	}
	
	function post()
	{
		
		$config = array(
			array(
			 'field'   => 'nm_group',
			 'label'   => '*',
			 'rules'   => 'required'
		  )
		);
		
		$this->form_validation->set_error_delimiters('<span class="help-block" style="color:#A94442">', '</span>');
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$chek_menu=$this->input->post( "chek_menu", TRUE );
			if($chek_menu)
			{
				$chek_menu= implode("|",$chek_menu);
			}
		
			$data = array(
			   'nm_group' => $this->input->post( "nm_group", TRUE ) ,
			   'hak_akses' =>$chek_menu
			);
			$this->load->model('Group_user_m');
			$result=$this->Group_user_m->insert($data);
			if($result!==FALSE)
			{
				$this->session->set_flashdata('success', "Data berhasil disimpan");
				redirect('group_user');	
			}
			else
			{
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('group_user/add');	
			}
			
		}
	}
}