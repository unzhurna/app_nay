<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Group_user_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	function grid()
	{
		$this->load->database();
		$this->load->library("datatables");
		$this->datatables->select('id_group,nm_group,hak_akses',FALSE);
		$this->datatables->from('group_user');
		$this->datatables->add_column('action','<a class="btn btn-xs btn-teal tooltips"  title="Edit" href="'.base_url().'group_user/edit/index/$1"><i class="fa fa-edit"></i></a> <a href="'.base_url().'group_user/delete/$1" onclick="return confirmModal(\'Anda akan menghapus..??\',\''.base_url().'group_user/delete/$1\')" class="btn btn-xs btn-bricky tooltips" title="Hapus"><i class="fa fa-times fa fa-white"></i></a>','id_group');
		return $this->datatables->generate();
	}
	
	function insert($data='')
	{
		$this->load->database();
		if($this->db->insert('group_user',$data))
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
		$this->db->where('id_group',$id);
		if($this->db->update('group_user',$data))
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
		$this->db->where('id_group',$id);
		$result=$this->db->get('group_user');
		if($result->num_rows()>=1)
		{
			return $result->row_array();
		}
		return FALSE;
	}
	function delete($id="")
	{
		$this->load->database();
		$this->db->where('id_group',$id);
		if($this->db->delete('group_user'))
		{
			return TRUE;
		}
		return FALSE;
	}
}