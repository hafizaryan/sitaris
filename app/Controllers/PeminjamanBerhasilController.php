<?php

namespace App\Controllers;

/**
 * Class UserController
 *
 * Controller ini mengelola fitur-fitur terkait Peminjaman berhasil.
 */
class PeminjamanBerhasilController extends  BaseController
{
	public function index()
	{
		echo view('/peminjaman_berhasil');
	}
}
