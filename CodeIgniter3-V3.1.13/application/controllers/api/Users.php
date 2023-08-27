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
		var_dump($users);
	}
}
