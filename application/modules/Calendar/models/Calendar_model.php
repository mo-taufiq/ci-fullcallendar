<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_model {
	public function getAllData($table)
	{
		return $this->db->get($table)->result_array();
	}

	public function query($query)
	{
		return $this->db->query($query)->result_array();
	}

	public function add($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function delete($table, $data)
	{
		return $this->db->delete($table, $data);
	}

	public function update($table, $data, $id)
	{
 		$this->db->where('id', $id);
		return $this->db->update($table, $data);
	}
}