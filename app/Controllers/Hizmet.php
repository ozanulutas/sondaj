<?php namespace App\Controllers;

use App\Models\HizmetModel;
use App\Models\AciklamaModel;
use App\Models\HizmetlerModel;

class Hizmet extends BaseController
{
	public function index()
	{
		$data['jumboBaslik'] = 'Hizmetlerimiz';
		$data['global'] = $this->global;
		
		$model = new HizmetlerModel();
		$data['hizmetler'] = $model->get()->getResult();

		$model = new HizmetModel();
		$data['hizmet'] = $model->get()->getRow();

		$model = new AciklamaModel();
		$data['jumboAciklama'] = $model->where('sayfa', 'Hizmetler')->get()->getRow()->aciklama;

		$data['jumboParallax'] = $data['hizmet']->parallax;

		return view('hizmet/index', $data);
    }
    

    public function show($id)
	{	
		$data['global'] = $this->global;
			
		$model = new HizmetlerModel();
		$data['hizmet'] = $model->where('id', $id)->get()->getRow();	

		$data['jumboBaslik'] = $data['hizmet']->baslik;
		$data['jumboAciklama'] = $data['hizmet']->aciklama;

		return view('hizmet/show', $data);
	}

	//--------------------------------------------------------------------

}
