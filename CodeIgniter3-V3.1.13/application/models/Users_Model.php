<?php
class Users_Model extends CI_Model
{
	public function getUsers()
	{
		return $this->db->get('users')->result_array();
	}

	public function findUser($id)
	{
		$findUser = $this->db->get_where('users', ['id' => $id])->row();
		return $findUser;
	}

	public function deleteUser($id)
	{
		$this->db->delete('users', ['id' => $id]);
		return $this->db->affected_rows();
	}

	public function createUser($data)
	{
		$this->db->insert('users', $data);
		return $this->db->affected_rows();
	}

	public function updateUser($data, $id)
	{
		$this->db->update('users', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}
}
