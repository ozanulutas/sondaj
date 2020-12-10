<?php namespace App\Controllers;

use App\Models\AciklamaModel;
use App\Models\HakkimizdaModel;

class Hakkimizda extends BaseController
{
	public function index()
	{
		$data['jumboBaslik'] = 'Hakkımızda';
		$data['global'] = $this->global;

		$model = new HakkimizdaModel();
		$data['hakkimizda'] = $model->get()->getRow();	

		$model = new AciklamaModel();
		$data['jumboAciklama'] = $model->where('sayfa', 'Hakkımızda')->get()->getRow()->aciklama;
		
		return view('hakkimizda/index', $data);
	}

	//--------------------------------------------------------------------

}
