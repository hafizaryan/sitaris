<?php

namespace App\Controllers;

/**
 * Class UserController
 *
 * Controller ini mengelola fitur-fitur terkait Tolak.
 */
class TolakController extends  BaseController
{

	public function index()
	{
		echo view('/tolak');
	}
}
