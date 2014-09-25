<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add extends CI_Controller{
	function __Construct(){
		parent::__Construct();
		$this->load->library('form_validation');
		$this->breadcrumbs->push('<i class="clip-users"></i> Manajemen User','#');
		$this->breadcrumbs->push('Data User', base_url().'admin_user');
		$this->breadcrumbs->push('Tambah Data User', base_url().'admin_user/add');
	}
	function index()
	{
		$xdata['status_options']=array(
		  '1'  => 'Active',
		  '0'    => 'No Active'
		);
		
		$this->load->model('Admin_user_m');
		$xdata['opt_group']=$this->Admin_user_m->combo_group_user();
		$xdata['post_url']=base_url().'admin_user/add/post';
		
		$data['title']='Tambah Data User';
		$data['content']=$this->load->view('form_view',$xdata,true);
		$data['script']=$this->load->view('form_js',$xdata,true);
		$data['act_menu']='admin_user';
		$data['parent_menu']='user_manager';
		$this->load->view('template_view',$data);
	}
	
	function post()
	{
		
		$config = array(
			array(
			 'field'   => 'name',
			 'label'   => '*',
			 'rules'   => 'required|min_length[5]'
		  ),
			array(
			 'field'   => 'username',
			 'label'   => '*',
			 'rules'   => 'required|callback_validusername'
		  ),array(
			 'field'   => 'id_group',
			 'label'   => '*',
			 'rules'   => 'required'
		  ),
		 array(
			 'field'   => 'email',
			 'label'   => '*',
			 'rules'   => 'required|valid_email|callback_validemail'
		  ), 		  
		  array(
			 'field'   => 'status',
			 'label'   => '*',
			 'rules'   => ''
		  ),
		  array(
			 'field'   => 'password',
			 'label'   => '*',
			 'rules'   => 'required|min_length[6]'
		  ),
		  array(
			 'field'   => 'password2',
			 'label'   => '*',
			 'rules'   => 'required|matches[password]'
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
			$data = array(
			   'id_group' => $this->input->post( "id_group", TRUE ) ,
			   'name' => $this->input->post( "name", TRUE ) ,
			   'username' => $this->input->post( "username", TRUE ) ,
			   'status' => $this->input->post( "status", TRUE ) ,
			   'password' => md5($this->input->post( "password", TRUE ))
			);
			$this->load->model('Admin_user_m');
			$result=$this->Admin_user_m->insert($data);
			if($result!==FALSE)
			{
				$this->session->set_flashdata('success', "Data berhasil disimpan");
				redirect('admin_user');	
			}
			else
			{
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('admin_user/add');	
			}
			
		}
	}
	
	function validusername($param="")
	{
		$this->load->model('Admin_user_m');
		if($this->Admin_user_m->get_username($param))
		{
			$this->form_validation->set_message('validusername', 'Username sudah terdaftar');
			return FALSE;
			
		}
		else
		{
			return TRUE;
	   }
	}

	function validemail($param="")
	{
		$this->load->model('Admin_user_m');
		if($this->Admin_user_m->get_email($param))
		{
			$this->form_validation->set_message('validemail', 'Email Sudah terdaftar');
			return FALSE;
			
		}
		else
		{
			return TRUE;
	   }
	}
	
}