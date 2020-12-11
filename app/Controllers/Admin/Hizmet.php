<?php namespace App\Controllers\Admin;

use App\Models\HizmetModel;
use App\Models\HizmetlerModel;
use App\Controllers\BaseController;

class Hizmet extends BaseController
{
	private $rules = [
		'baslik' => [
			'rules' => 'required|max_length[100]',
			'errors' => [
				'required' => 'Başlık alanını boş bırakamazınız.',
				'max_length' => 'Başlık alanına en fazla 100 karakter yazabilirsiniz.'
			]
		],
		'aciklama' => [
			'rules' => 'required|max_length[1000]',
			'errors' => [
				'required' => 'Açıklama alanını boş bırakamazınız.',
				'max_length' => 'Açıklama alanına en fazla 1000 karakter yazabilirsiniz.'
			]
		],
		'metin' => [
			'rules' => 'required|max_length[5000]',
			'errors' => [
				'required' => 'Metin alanını boş bırakamazınız.',
				'max_length' => 'Metin alanına en fazla 5000 karakter yazabilirsiniz.'
			]
		],
		'resim' => [
			'rules' => 'uploaded[resim]|is_image[resim]|max_size[resim,1024]',
			'errors' => [
				'uploaded' => 'Bir resim seçmelisiniz.',
				'is_image' => 'Resim dosyası seçmelisiniz.',
				'max_size' => 'En fazla 1mb dosya boyutu desteklenmektedir.',
			]
		],
	];


	public function index()
	{
		helper(['form']);
		$data = [];
		
		$data['dashBaslik'] = 'Hizmetler';

		$model = new HizmetModel();
		$data['hizmet'] = $model->get()->getRow();

		$model = new HizmetlerModel();
		$data['hizmetler'] = $model->get()->getResult();

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
				$model = new HizmetModel();
				
				$resim = $this->request->getFile('resim');
				$parallax = $this->request->getFile('parallax');

				if($resim) {
					if($resim->getName()) {
						$_POST['resim'] = $this->resimUpload($resim);
						$this->resimManipule($_POST['resim'], 345, 345);
						$this->eskiResimSil($data['hizmet']->resim);
					}
				}

				if($parallax) {					
					if($parallax->getName()) {
						$_POST['parallax'] = $this->resimUpload($parallax);
						$this->eskiResimSil($data['hizmet']->parallax);
					}
				}

				$model->save($_POST);
				
				session()->setFlashdata('success', 'Hizmet bilgileriniz başarıyla güncellendi.');
				return redirect()->to('/admin/hizmet/index');
			}		

		}

		return view('hizmet/admin/index', $data);
    }

	public function create()
	{
		helper(['form']);

		$data = [];		
		$data['dashBaslik'] = 'Hizmet Ekle';

		if($this->request->getMethod() == 'post') {

			if(! $this->validate($this->rules)) {
				$data['validation'] = $this->validator;

			} else {
				$model = new HizmetlerModel();

				$resim = $this->request->getFile('resim');
				$_POST['resim'] = $this->resimUpload($resim);
				$this->resimManipule($_POST['resim'], 345, 225);
				
				$model->save($_POST);
	
				session()->setFlashdata('success', 'Hizmet başarıyla eklendi.');
				return redirect()->to('index');
			}
		}

		return view('hizmet/admin/create', $data);
	}


	public function edit($id)
	{
		helper(['form']);

		$data = [];
		$data['dashBaslik'] = 'Hizmet Düzenle';

		$model = new HizmetlerModel();
		$data['hizmet'] = $model->where('id', $id)->get()->getRow();

		if($data['hizmet']->resim) {
			unset($this->rules['resim']);
		}


		if($this->request->getMethod() == 'post') {

			if(! $this->validate($this->rules)) {
				$data['validation'] = $this->validator;

			} 
			else {
				$model = new HizmetlerModel();

				$resim = $this->request->getFile('resim');

				if($resim->getName()) {
					$_POST['resim'] = $this->resimUpload($resim);
					$this->resimManipule($_POST['resim'], 345, 225);
					$this->eskiResimSil($data['hizmet']->resim);
				}
				else {
					$_POST['resim'] = $data['hizmet']->resim;
				}

				$model->save($_POST);
	
				session()->setFlashdata('success', 'Hizmet başarıyla güncellendi.');
				return redirect()->to('/admin/hizmet');
				
			}
		}

		return view('hizmet/admin/edit', $data);
	}


	public function delete($id)
	{
		$model = new HizmetlerModel();
		$hizmet = $model->find($id);
		
		if($hizmet) {
			if($hizmet['resim']) {
				$resim = IMAGE_PATH . $hizmet['resim'];
				$resim = substr($resim, 1);
				unlink($resim);
			}
			$model->delete($id);

			session()->setFlashdata('success', 'Hizmet başarıyla silindi.');
		}

		return redirect()->to('/admin/hizmet');
	}


	public function resimKaldir($resim)
	{
		$model = new HizmetModel();	
		$hizmet = $model->get()->getRow();	

		$this->eskiResimSil($hizmet->$resim);
		$model->set($resim, NULL)->update();

		session()->setFlashdata('success', 'Resim başarıyla kaldırıldı.');
		return redirect()->to('/admin/hizmet');
		
	}

	//--------------------------------------------------------------------

}
