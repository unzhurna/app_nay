<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_user_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	function grid()
	{
		$this->load->database();
		$this->load->library("datatables");
		$this->datatables->select('A.id,B.nm_group,A.username,A.name,A.status',FALSE);
		$this->datatables->from('admin_user A');
		$this->datatables->join('group_user B', 'A.id_group = B.id_group', 'inner');
		$this->datatables->add_column('action','<a class="btn btn-xs btn-teal tooltips"  title="Edit" href="'.base_url().'admin_user/edit/index/$1"><i class="fa fa-edit"></i></a> <a href="'.base_url().'admin_user/delete/$1" onclick="return confirmModal(\'Anda akan menghapus..??\',\''.base_url().'admin_user/delete/$1\')" class="btn btn-xs btn-bricky tooltips" title="Hapus"><i class="fa fa-times fa fa-white"></i></a>','A.id');
		return $this->datatables->generate();
	}
	
	function insert($data='')
	{
		$this->load->database();
		if($this->db->insert('admin_user',$data))
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}
	
	function update($id='',$data='')
	{
		$this->load->database();
		$this->db->where('id',$id);
		if($this->db->update('admin_user',$data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_data($id="")
	{
		$this->load->database();
		$this->db->where('id',$id);
		$result=$this->db->get('admin_user');
		if($result->num_rows()>=1)
		{
			return $result->row_array();
		}
		return FALSE;
	}
	function delete($id="")
	{
		$this->load->database();
		$this->db->where('id',$id);
		if($this->db->delete('admin_user'))
		{
			return TRUE;
		}
		return FALSE;
	}
	function get_username($username="",$id="")
	{
		$this->load->database();
		$this->db->where('username',$username);
		$this->db->where('id !=',$id);
		$result=$this->db->get('admin_user');
		
		if($result->num_rows()>=1)
		{
			return $result->row_array();
		}
		return FALSE;
	}
	
	function combo_group_user()
	{
		$this->load->database();
		$this->db->select('id_group,nm_group')
				->from('group_user');
		$result=$this->db->get();
		$data[''] ='--Pilih Grup User--' ;
		foreach($result->result_array() as $row)
		{
			$data[$row['id_group']] =$row['nm_group'] ;
		}
		return $data;
	}
	
	function get_email($email="",$id="")
	{
		$this->load->database();
		$this->db->where('email',$email);
		$this->db->where('id !=',$id);
		$result=$this->db->get('admin_user');
		
		if($result->num_rows()>=1)
		{
			return $result->row_array();
		}
		return FALSE;
	}	
}