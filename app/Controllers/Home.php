<?php namespace App\Controllers;

use App\Models\HizmetModel;
use App\Models\SliderModel;
use App\Models\AciklamaModel;

class Home extends BaseController
{
	public function index()
	{
		$data['jumboBaslik'] = 'Ana Sayfa';
		$data['iletisim'] = $this->iletisim;

		$model = new HizmetModel();
		$data['hizmetler'] = $model->get()->getResult();

		$model = new AciklamaModel();
		$data['aciklama'] = $model->where('sayfa', 'Ana Sayfa')->get()->getRow()->aciklama;

		$model = new SliderModel();
		$data['sliderlar'] = $model->get()->getResult();

		return view('anasayfa/index', $data);
	}

	//--------------------------------------------------------------------

}
