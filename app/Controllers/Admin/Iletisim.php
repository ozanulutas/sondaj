<?php namespace App\Controllers\Admin;

use App\Models\IletisimModel;
use App\Controllers\BaseController;

class Iletisim extends BaseController
{
	public function edit()
	{		
		helper(['form']);
		
		$data['dashBaslik'] = 'İletişim';

		$model = new IletisimModel();
		$data['iletisim'] = $model->get()->getRow();

		$data['sosyalMedyalar'] = $this->global['sosyalMedya'];


		if($this->request->getMethod() == 'post') {

			$rules = [
				'baslik' => [
					'rules' => 'required|max_length[100]',
					'errors' => [
						'required' => 'Başlık alanını boş bırakamazınız.',
						'max_length' => 'Başlık alanına en fazla 100 karakter yazabilirsiniz.'
					]
				],
				'email' => [
					'rules' => 'required|max_length[50]|valid_email',
					'errors' => [
						'required' => 'Email alanını boş bırakamazınız.',
						'max_length' => 'Email alanına en fazla 50 karakter yazabilirsiniz.',
						'valid_email' => 'Geçersiz bir email adresi girdiniz.'
					]
				],
				'telefon' => [
					'rules' => 'required|max_length[25]',
					'errors' => [
						'required' => 'Telefon alanını boş bırakamazınız.',
						'max_length' => 'Telefon alanına en fazla 25 karakter yazabilirsiniz.'
					]
				],
				'adres' => [
					'rules' => 'required|max_length[255]',
					'errors' => [
						'required' => 'Adres alanını boş bırakamazınız.',
						'max_length' => 'Adres alanına en fazla 255 karakter yazabilirsiniz.'
					]
				],
				'parallax' => [
					'rules' => 'is_image[parallax]|max_size[parallax,1024]',
					'errors' => [
						'is_image' => 'Parallax için sadece resim dosyaları desteklenmektedir.',
						'max_size' => 'Parallax resmi için en fazla 1 mb dosya boyutu desteklenmektedir.',
					]
				]
			];

			if(empty($_POST['parallax'])) unset($rules['parallax']);

			if(! $this->validate($rules)) {
				$data['validation'] = $this->validator;

			} 
			else {
				
				$model = new IletisimModel();

				$parallax = $this->request->getFile('parallax');
				if($parallax) {					
					if($parallax->getName()) {
						$_POST['parallax'] = $this->resimUpload($parallax);
						$this->eskiResimSil($data['iletisim']->parallax);
					}
				}

				$model->save($_POST);
				
				session()->setFlashdata('success', 'İletişim bilgileriniz başarıyla güncellendi.');
				return redirect()->to('edit');
			}
		}

		return view('iletisim/admin/edit', $data);
	}


	public function resimKaldir($resim)
	{
		$model = new IletisimModel();	
		$iletisim = $model->get()->getRow();	

		$this->eskiResimSil($iletisim->$resim);
		$model->set($resim, NULL)->update();

		session()->setFlashdata('success', 'Resim başarıyla kaldırıldı.');
		return redirect()->to('/admin/Iletisim/edit');
		
	}

	//--------------------------------------------------------------------

}
