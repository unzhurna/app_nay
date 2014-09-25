<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polling_model extends CI_Model {
    	
  	function grid()
	{
		$this->load->database();
		$this->load->library('datatables');
		$this->datatables->select('A.id, A.ndn, A.nama, B.kode, B.jurusan')
			->from('mt_dosen A')
			->unset_column('A.id')
			->unset_column('B.kode')
			->join('mt_jurusan B', 'A.id_jurusan = B.id', 'inner')
			->add_column('Actions', $this->get_buttons('$1'), 'A.id');
		return $this->datatables->generate();
	}
	
	function get_buttons($id)
	{
		$html = '<div class="btn-group">';
		$html .= '<a href="'.base_url().'dosen/post/'.$id.'" class="btn" title="Edit"><i class="fa fa-edit"></i></a>';
		$html .= '<a href="'.base_url().'dosen/delete/'.$id.'" onclick="return confirmModal(\'Anda akan menghapus?\',\''.base_url().'dosen/delete/'.$id.'\')" class="btn" title="Hapus"><i class="fa fa-trash-o"></i></a>';
	    $html .= '</div>';
	    return $html;
	}	
	
	function get_dosen($id)
	{
		$this->load->database();
		$query = $this->db->get_where('mt_dosen', array('id'=>$id));
		return $query->row();
	}
	
	function opt_jurusan()
	{
		$result = $this->db->get('mt_jurusan');
		
		$data[''] = '-- Pilih Jurusan --' ;
		foreach($result->result_array() as $row)
		{
			$data[$row['id']] = $row['jurusan'];
		}
		return $data;
	}
	
	function save_dosen($data)
	{
		if($data['id'])
		{
			$this->db->update('mt_dosen', $data, array('id'=>$data['id']));
			$this->session->set_flashdata('alert', 'Success!');
		}
		else
		{
			$this->db->insert('mt_dosen', $data);
			$this->session->set_flashdata('alert', 'Success!');
		}
	}
	
	function delete_dosen($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('mt_dosen');
		$this->session->set_flashdata('alert', 'Success!');
	}	
	
}