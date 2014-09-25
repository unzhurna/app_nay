<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Edit extends CI_Controller{
	function __Construct(){
		parent::__Construct();
		$this->load->library('form_validation');
	}
	function index($id=FALSE)
	{
		$this->breadcrumbs->push('<i class="clip-users"></i> Manajemen User','#');
		$this->breadcrumbs->push('Data User', base_url().'admin_user');
		$this->breadcrumbs->push('Edit Data User', base_url().'admin_user/edit/index/'.$id);
		
		$this->load->model('Admin_user_m');
		$xdata=$this->Admin_user_m->get_data($id);
		if($xdata)
		{
			$xdata['status_options']=array(
			  '1'  => 'Active',
			  '0'    => 'No Active'
			);
			$xdata['opt_group']=$this->Admin_user_m->combo_group_user();
			$xdata['password']='******';
			$xdata['password2']='******';
			$xdata['post_url']=base_url().'admin_user/edit/post';
			
			$data['title']='Edit Data User';
			$data['content']=$this->load->view('form_view',$xdata,true);
			$data['script']=$this->load->view('form_js',$xdata,true);
			$data['act_menu']='admin_user';
			$data['parent_menu']='user_manager';
			$this->load->view('template_view',$data);
		}
		else
		{
			show_404();
		}
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
		  ),
		  array(
			 'field'   => 'email',
			 'label'   => '*',
			 'rules'   => 'required|valid_email|callback_validemail'
		  ), 	
		  array(
			 'field'   => 'id_group',
			 'label'   => '*',
			 'rules'   => 'required'
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
			$this->index($this->input->post( "id", TRUE ));
		}
		else
		{
			$data = array(
			   'id_group' => $this->input->post( "id_group", TRUE ) ,
			   'name' => $this->input->post( "name", TRUE ) ,
			   'username' => $this->input->post( "username", TRUE ) ,
			   'status' => $this->input->post( "status", TRUE )
			);
			if($this->input->post("password", TRUE )!='******')
			{
				$data['password']=md5($this->input->post( "password", TRUE ));
			}
			$this->load->model('Admin_user_m');
			$result=$this->Admin_user_m->update($this->input->post( "id", TRUE ),$data);
			if($result===TRUE)
			{
				$this->session->set_flashdata('success', "Data berhasil disimpan");
				redirect('admin_user');	
			}
			else
			{
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('admin_user/edit/'.$this->input->post( "id", TRUE ));	
			}
			
		}
	}
	
	function validusername($param="")
	{
		$this->load->model('Admin_user_m');
		if($this->Admin_user_m->get_username($param,$this->input->post('id')))
		{
			$this->form_validation->set_message('validusername', 'username Sudah terdaftar');
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
		if($this->Admin_user_m->get_email($param,$this->input->post('id')))
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