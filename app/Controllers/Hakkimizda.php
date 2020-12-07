<?php namespace App\Controllers;

class Hakkimizda extends BaseController
{
	public function index()
	{
		$data = [
			'jumboBaslik' => 'Hakkımızda'
		];
		return view('hakkimizda', $data);
	}

	//--------------------------------------------------------------------

}
