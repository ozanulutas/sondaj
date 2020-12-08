<?php namespace App\Controllers\Admin;

use App\Models\HakkimizdaModel;
use App\Controllers\BaseController;

class Hakkimizda extends BaseController
{
	public function edit()
	{
		helper(['form']);
		
		$data['dashBaslik'] = 'Hakkımızda';

		$model = new HakkimizdaModel();
		$data['hakkimizda'] = $model->get()->getRow();	


		if($this->request->getMethod() == 'post') {

			$rules = [
				'baslik' => [
					'rules' => 'required|max_length[100]',
					'errors' => [
						'required' => 'Başlık alanını boş bırakamazınız.',
						'max_length' => 'Başlık alanına en fazla 100 karakter yazabilirsiniz.'
					]
				],
				'metin' => [
					'rules' => 'required|max_length[6000]',
					'errors' => [
						'required' => 'Metin alanını boş bırakamazınız.',
						'max_length' => 'Metin alanına en fazla 6000 karakter yazabilirsiniz.'
					]
				]
			];

			if(! $this->validate($rules)) {
				$data['validation'] = $this->validator;

			} 
			else {
				
				$model = new HakkimizdaModel();
				$model->save($_POST);
				
				session()->setFlashdata('success', 'Hakkımızda bilgileriniz başarıyla güncellendi.');
				return redirect()->to('edit');
			}
		}

		return view('hakkimizda/admin/edit', $data);
	}

	//--------------------------------------------------------------------

}
