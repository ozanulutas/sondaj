<?php namespace App\Controllers;

use App\Models\HizmetModel;
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
		$data['jumboAciklama'] = $model->where('sayfa', 'Hakkımızda')->get()->getRow()->aciklama;

		return view('anasayfa/index', $data);
	}

	//--------------------------------------------------------------------

}
