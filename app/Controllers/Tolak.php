<?php

namespace App\Controllers;

/**
 * Class UserController
 *
 * Controller ini mengelola fitur-fitur terkait Tolak.
 */
class TolakController extends  BaseController
{

	// Fungsi menampilkan tampilan 404
	public function index()
	{
		echo view('/tolak');
	}
}