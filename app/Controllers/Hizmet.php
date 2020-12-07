<?php namespace App\Controllers;

class Hizmet extends BaseController
{
	public function index()
	{
		$data = [
			'jumboBaslik' => 'Hizmetlerimiz'
		];

		return view('hizmet/hizmetler', $data);
    }
    

    public function show()
	{
		$data = [
			'jumboBaslik' => 'Hizmet Adı'
		];

		return view('hizmet/hizmet', $data);
	}

	//--------------------------------------------------------------------

}
