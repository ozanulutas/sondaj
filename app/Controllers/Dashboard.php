<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [
			'jumboBaslik' => 'Hakkımızda'
		];
		return view('dashboard', $data);
	}

	//--------------------------------------------------------------------

}
