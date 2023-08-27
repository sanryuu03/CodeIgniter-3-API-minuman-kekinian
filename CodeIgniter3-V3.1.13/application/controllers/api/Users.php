<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . "libraries/Format.php";
// require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Users extends RestController
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Users_Model', 'users');
	}

	public function index_get()
	{
		$users = $this->users->getUsers();

		if (!$users) {
			$this->response([
				'error' => true,
				'message' => 'No users were found'
			], RestController::HTTP_NOT_FOUND);
		}

		$this->response([
			'error' => false,
			'message' => 'success',
			'berisi' => $users
		], RestController::HTTP_OK);
	}

	public function index_delete()
	{
		$id = $this->delete('id');
		if (!$id) {
			$this->response([
				'error' => true,
				'message' => 'provide an id'
			], RestController::HTTP_BAD_REQUEST);
		}

		$checkUser = $this->users->findUser($id);
		if (!$checkUser) {
			$this->response([
				'error' => true,
				'message' => 'No users were found'
			], RestController::HTTP_NOT_FOUND);
		}

		$this->db->trans_begin();
		try {
			$this->users->deleteUser($id);
			$this->db->trans_commit();
			$this->response([
				'error' => false,
				'message' => 'success',
				'berisi' => 'user deleted'
			], RestController::HTTP_OK);
		} catch (\Exception $e) {
			//throw $th;
			$this->db->trans_rollback();
			$this->response([
				'error' => true,
				'message' => $e->getMessage()
			], RestController::HTTP_BAD_REQUEST);
		}
	}

	public function index_post()
	{
		$data = [
			'uuid' => $this->post('uuid'),
			'name' => $this->post('name'),
			'email' => $this->post('email'),
			'password' => $this->post('password'),
			'post_by' => $this->post('post_by'),
			'edited_by' => $this->post('edited_by'),
			'custom_unix_createdAt' => $this->post('custom_unix_createdAt'),
			'custom_unix_updatedAt' => $this->post('custom_unix_updatedAt')
		];

		$this->db->trans_begin();
		try {
			$post = $this->users->createUser($data);
			$this->db->trans_commit();
			$this->response([
				'error' => false,
				'message' => 'success',
				'berisi' => $post
			], RestController::HTTP_CREATED);
		} catch (\Exception $e) {
			$this->db->trans_rollback();
			$this->response([
				'error' => true,
				'message' => $e->getMessage()
			], RestController::HTTP_BAD_REQUEST);
		}
	}

	public function index_put()
	{
		$id = $this->put('id');
		if (!$id) {
			$this->response([
				'error' => true,
				'message' => 'provide an id'
			], RestController::HTTP_BAD_REQUEST);
		}

		$checkUser = $this->users->findUser($id);
		if (!$checkUser) {
			$this->response([
				'error' => true,
				'message' => 'No users were found'
			], RestController::HTTP_NOT_FOUND);
		}

		$data = [
			'uuid' => $this->put('uuid'),
			'name' => $this->put('name'),
			'email' => $this->put('email'),
			'password' => $this->put('password'),
			'post_by' => $this->put('post_by'),
			'edited_by' => $this->put('edited_by'),
			'custom_unix_createdAt' => $this->put('custom_unix_createdAt'),
			'custom_unix_updatedAt' => $this->put('custom_unix_updatedAt')
		];

		$this->db->trans_begin();
		try {
			$post = $this->users->updateUser($data, $id);
			$this->db->trans_commit();
			$this->response([
				'error' => false,
				'message' => 'success',
				'berisi' => $post
			], RestController::HTTP_OK);
		} catch (\Exception $e) {
			$this->db->trans_rollback();
			$this->response([
				'error' => true,
				'message' => $e->getMessage()
			], RestController::HTTP_BAD_REQUEST);
		}
	}
}
