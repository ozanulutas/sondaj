<?php namespace App\Controllers;

use App\Models\HizmetModel;
use App\Models\AciklamaModel;

class Hizmet extends BaseController
{
	public function index()
	{
		$data['jumboBaslik'] = 'Hizmetlerimiz';
		$data['iletisim'] = $this->iletisim;
		
		$model = new HizmetModel();
		$data['hizmetler'] = $model->get()->getResult();

		$model = new AciklamaModel();
		$data['jumboAciklama'] = $model->where('sayfa', 'Hakkımızda')->get()->getRow()->aciklama;

		return view('hizmet/index', $data);
    }
    

    public function show($id)
	{	
		$data['iletisim'] = $this->iletisim;
			
		$model = new HizmetModel();
		$data['hizmet'] = $model->where('id', $id)->get()->getRow();	

		$data['jumboBaslik'] = $data['hizmet']->baslik;
		$data['jumboAciklama'] = $data['hizmet']->aciklama;

		return view('hizmet/show', $data);
	}

	//--------------------------------------------------------------------

}
