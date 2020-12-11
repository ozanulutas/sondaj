<?php namespace App\Controllers\Admin;

use App\Models\AciklamaModel;
use App\Controllers\BaseController;

class Aciklama extends BaseController
{
	public function edit()
	{
		helper(['form']);
		
		$data['dashBaslik'] = 'Sayfa Başlık Açıklamaları';

		$model = new AciklamaModel();
		$data['aciklamalar'] = $model->get()->getResult();	

		return view('aciklama/edit', $data);
	}
	

	public function update()
	{
		if($this->request->getMethod() == 'post') {
			$model = new AciklamaModel();
			
			for($i = 0; $i < count($_POST['aciklama']); $i++) {
				
				$model->set('aciklama', $_POST['aciklama'][$i]);
				$model->where('id', $i + 1);
				$model->update();
			}

			session()->setFlashdata('success', 'Sayfa açıklamalarınız başarıyla güncellendi.');
		}
		return redirect()->to('edit');
    }

	//--------------------------------------------------------------------

}
