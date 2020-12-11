<?php namespace App\Controllers;

use App\Models\HizmetlerModel;
use App\Models\SliderModel;
use App\Models\AciklamaModel;

class Home extends BaseController
{
	public function index()
	{
		$data['jumboBaslik'] = 'Ana Sayfa';
		$data['global'] = $this->global;

		$model = new HizmetlerModel();
		$data['hizmetler'] = $model->get()->getResult();

		$model = new AciklamaModel();
		$data['aciklama'] = $model->where('sayfa', 'Ana Sayfa')->get()->getRow()->aciklama;

		$model = new SliderModel();
		$data['sliderlar'] = $model->get()->getResult();

		

		return view('anasayfa/index', $data);
	}

	//--------------------------------------------------------------------

}
