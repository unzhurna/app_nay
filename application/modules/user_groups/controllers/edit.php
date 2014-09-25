<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Edit extends CI_Controller{
	function __Construct(){
		parent::__Construct();
		$this->load->library('form_validation');
	}
	function index($id=FALSE)
	{
		$this->breadcrumbs->push('<i class="clip-users"></i> Manajemen User','#');
		$this->breadcrumbs->push('Grup User', base_url().'group_user');
		$this->breadcrumbs->push('Edit Grup User', base_url().'group_user/edit/index/'.$id);
		
		$this->load->model('Group_user_m');
		$xdata=$this->Group_user_m->get_data($id);
		if($xdata)
		{
			
			$xdata['hak_akses']=explode("|",$xdata['hak_akses']);
			$xdata['post_url']=base_url().'group_user/edit/post';
			
			$data['title']='Edit Grup User';
			$data['content']=$this->load->view('form_view',$xdata,true);
			$data['script']=$this->load->view('form_js',$xdata,true);
			$data['act_menu']='group_user';
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
			 'field'   => 'nm_group',
			 'label'   => '*',
			 'rules'   => 'required'
		  ),array(
			 'field'   => 'id_group',
			 'label'   => '*',
			 'rules'   => 'required'
		  )
		);
		
		$this->form_validation->set_error_delimiters('<span class="help-block" style="color:#A94442">', '</span>');
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$this->index($this->input->post( "id_group", TRUE ));
		}
		else
		{
			$chek_menu=$this->input->post("chek_menu", TRUE);
			if($chek_menu)
			{
				$chek_menu= implode("|",$chek_menu);
			}
			
			$data = array(
			   'nm_group' => $this->input->post( "nm_group", TRUE ) ,
			   'hak_akses' =>$chek_menu
			);
			$this->load->model('Group_user_m');
			$result=$this->Group_user_m->update($this->input->post( "id_group", TRUE ),$data);
			if($result===TRUE)
			{
				$this->session->set_flashdata('success', "Data berhasil disimpan");
				redirect('group_user');	
			}
			else
			{
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('group_user/edit/'.$this->input->post( "id_group", TRUE ));	
			}
			
		}
	}
}