<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'jumboBaslik' => 'Ana Sayfa'
		];

		return view('anasayfa', $data);
	}

	//--------------------------------------------------------------------

}
