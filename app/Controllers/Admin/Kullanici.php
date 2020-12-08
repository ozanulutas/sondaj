<?php namespace App\Controllers\Admin;

use App\Models\KullaniciModel;
use App\Controllers\BaseController;

class Kullanici extends BaseController
{
	public function edit()
	{
		helper(['form']);

		$data['dashBaslik'] = 'Hesap Ayarları';

		$model = new KullaniciModel();


		if($this->request->getMethod() == 'post') {

			$rules = [
				'kullanici_adi' => 'required',
				'email' => 'required',
			];

			$errors = [
				'kullanici_adi' => [
                    'required' => 'Kullanıcı adı alanı boş bırakılamaz.'
				],
				'email' => [
                    'required' => 'Email alanı boş bırakılamaz.'
				]
			];

			if($this->request->getPost('sifre') != '') {
				$rules['sifre'] = 'required';
				$rules['sifre_tekrar'] = 'matches[sifre]';
				$errors['sifre']['required'] = 'Şifre alanı boş bırakılamaz.';
				$errors['sifre_tekrar']['matches'] = 'Şifreler uyuşmuyor.';
			}

			if(! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;

			} else {
				// $model = new KullaniciModel();
				$newData = [
					'id' => session()->get('id'),
					'kullanici_adi' => $this->request->getPost('kullanici_adi'),
					'email' => $this->request->getPost('email'),
				];

				if($this->request->getPost('sifre') != '') {
					$newData['sifre'] = $this->request->getPost('sifre');
				}	
				
				$model->save($newData);
	
				session()->setFlashdata('success', 'Profiliniz başarıyla güncellendi.');

				return redirect()->to('edit');
			}
		}

		$data['kullanici'] = $model->where('id', session()->get('id'))->first();

		return view('kullanici/edit', $data);
	}

	//--------------------------------------------------------------------

}
