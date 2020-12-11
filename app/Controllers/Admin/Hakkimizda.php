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
				],
				'resim' => [
					'rules' => 'is_image[resim]|max_size[resim,1024]',
					'errors' => [
						'is_image' => 'Sadece sadece resim dosyaları desteklenmektedir.',
						'max_size' => 'En fazla 1 mb dosya boyutu desteklenmektedir.',
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

			if(empty($_POST['resim'])) unset($rules['resim']);
			if(empty($_POST['parallax'])) unset($rules['parallax']);

			if(! $this->validate($rules)) {
				$data['validation'] = $this->validator;

			} 
			else {
				
				$model = new HakkimizdaModel();
				
				$resim = $this->request->getFile('resim');
				$parallax = $this->request->getFile('parallax');
				
				// echo "<div style='margin:10rem'>";
				// echo "<pre>";
				// print_r($resim);
				// echo "</pre>";
				// echo "</div>";
				if($resim) {
					if($resim->getName()) {
						$_POST['resim'] = $this->resimUpload($resim);
						$this->resimManipule($_POST['resim'], 345, 345);
						$this->eskiResimSil($data['hakkimizda']->resim);
					}
				}

				if($parallax) {					
					if($parallax->getName()) {
						$_POST['parallax'] = $this->resimUpload($parallax);
						$this->eskiResimSil($data['hakkimizda']->parallax);
					}
				}

				$model->save($_POST);
				
				session()->setFlashdata('success', 'Hakkımızda bilgileriniz başarıyla güncellendi.');
				return redirect()->to('edit');
			}
		}

		return view('hakkimizda/admin/edit', $data);
	}


	public function resimKaldir($resim)
	{
		$model = new HakkimizdaModel();	
		$hizmet = $model->get()->getRow();	

		$this->eskiResimSil($hizmet->$resim);
		$model->set($resim, NULL)->update();

		session()->setFlashdata('success', 'Resim başarıyla kaldırıldı.');
		return redirect()->to('/admin/hakkimizda/edit');
		
	}

	//--------------------------------------------------------------------

}
