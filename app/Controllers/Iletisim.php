<?php namespace App\Controllers;

use App\Models\AciklamaModel;

// use App\Models\IletisimModel;

class Iletisim extends BaseController
{
	public function index()
	{
		$data['jumboBaslik'] = 'İletişim';
		$data['global'] = $this->global;

		$model = new AciklamaModel();
		$data['jumboAciklama'] = $model->where('sayfa', 'İletişim')->get()->getRow()->aciklama;

		/*
		if($this->request->getMethod() == 'post') {

			$message = $_POST['mesaj'];
			$email = \Config\Services::email();

			$email->setFrom('oznulutas@gmail.com', 'your Title Here');
			$email->setTo('oznulutas@gmail.com');
			$email->setSubject('Your Subject here | tutsmake.com');
			$email->setMessage($message);//your message here
		  
			// $email->setCC('another@emailHere');//CC
			// $email->setBCC('thirdEmail@emialHere');// and BCC
			// $filename = '/img/yourPhoto.jpg'; //you can use the App patch 
			// $email->attach($filename);
			 
			$email->send();
		}
		*/

		return view('iletisim/index', $data);
	}

	//--------------------------------------------------------------------

}
