<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
	}
	
	function index()
	{
		$this->load->view('login_page');
	}
	
	function login()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><i class="fa fa-warning"></i> ', '</div>');
		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$result = $this->auth_model->check();
		
			if($result)
			{
				$this->session->set_userdata($result);
				$this->session->set_flashdata('alert', '<div class="alert alert-info"><i class="fa fa-check-circle"></i> Welcome! You have successfuly login</div>');
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('alert', '<div class="alert alert-danger"><i class="fa fa-warning"></i> Invalid username or password</div>');
				redirect('auth');
			}		
		}
		
	}
	
	function profile()
	{		
		$item = (array) $this->auth_model->profile();
		
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$this->form_validation->set_rules('username', 'username', 'required');		
		$this->form_validation->set_rules('password', 'password', 'min_length[6]');
		$this->form_validation->set_rules('passconf', 'confirmation', 'matches[password]');
				
		if ($this->form_validation->run() == FALSE)
		{
			$data['content'] = $this->load->view('form', $item, TRUE);
			$this->load->view('template', $data);
		}
		else
		{	
			$save['id']	= $this->session->userdata('id');
			$save['nama'] = $this->input->post('nama');
			$save['username'] = $this->input->post('username');
			if($this->input->post('password'))
			{
				$save['password'] = md5($this->input->post('password'));
			}
			else
			{
				$save['password'] = $item['password'];	
			}
					
			$this->auth_model->update_profile($save);
			redirect('/', 'refresh');
		}	
	}
	
	function logout()
	{
		$this->session->set_flashdata('alert', '<div class="alert alert-info"><i class="fa fa-check-circle"></i> You have successfuly logout</div>');
		$this->session->unset_userdata('id');
		redirect('auth');
	}	

}
