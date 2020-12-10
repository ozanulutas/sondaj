<?php namespace App\Controllers\Admin;

use App\Models\SosyalMedyaModel;
use App\Controllers\BaseController;

class SosyalMedya extends BaseController
{
	private $rules = [
		'link' => [
			'rules' => 'required|max_length[255]',
			'errors' => [
				'required' => 'Link alanını boş bırakamazsınız.',
				'max_length' => 'Link alanına en fazla 255 karakter yazabilirsiniz.',
			]
		],
		'platform' => [
			'rules' => 'required|max_length[50]|in_list[facebook, twitter, youtube, instagram]',
			'errors' => [
				'required' => 'Platform alanını boş bırakamazsınız.',
				'max_length' => 'Platform alanına en fazla 50 karakter yazabilirsiniz.',
				'in_list' => 'Listede bulunmayan platform seçemezsiniz.'
			]
		],
	];


	public function create()
	{
		helper(['form']);

		if($this->request->getMethod() == 'post') {

			if(! $this->validate($this->rules)) {
				$data['validation'] = $this->validator;
				session()->setFlashdata('error', $data['validation']);

			} else {
				$model = new SosyalMedyaModel();				
				$model->save($_POST);
	
				session()->setFlashdata('success', 'Sosyal medya başarıyla eklendi.');
			}
		}
		return redirect()->to('/admin/Iletisim/edit');
	}


	public function edit()
	{		
		helper(['form']);


		if($this->request->getMethod() == 'post') {

			if(! $this->validate($this->rules)) {
				$data['validation'] = $this->validator;
				session()->setFlashdata('error', $data['validation']);
				
			} 
			else {
				
				$model = new SosyalMedyaModel();
				$model->save($_POST);
				
				session()->setFlashdata('success', 'Sosyal medya bilgileriniz başarıyla güncellendi.');
			}
		}

		return redirect()->to('/admin/Iletisim/edit');
	}


	public function delete($id)
	{
		$model = new SosyalMedyaModel();
		$sm = $model->find($id);
		
		if($sm) {
			$model->delete($id);

			session()->setFlashdata('success', 'Sosyla medya başarıyla silindi.');
		}

		return redirect()->to('/admin/Iletisim/edit');
	}

	//--------------------------------------------------------------------

}
