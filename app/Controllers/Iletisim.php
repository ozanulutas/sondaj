<?php namespace App\Controllers;

class Iletisim extends BaseController
{
	public function index()
	{
		$data = [
			'jumboBaslik' => 'İletişim'
		];

		return view('iletisim', $data);
	}

	//--------------------------------------------------------------------

}
