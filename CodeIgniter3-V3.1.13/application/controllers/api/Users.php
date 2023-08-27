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
}
