<?php namespace App\Controllers\Admin;

use App\Models\HizmetModel;
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
		$data['dashBaslik'] = 'Hizmetler';

		$model = new HizmetModel();
		$data['hizmetler'] = $model->get()->getResult();

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
				$model = new HizmetModel();

				$resim = $this->request->getFile('resim');
				$_POST['resim'] = $this->resimUpload($resim);
				
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

		$model = new HizmetModel();
		$data['hizmet'] = $model->where('id', $id)->get()->getRow();

		if($data['hizmet']->resim) {
			unset($this->rules['resim']);
		}


		if($this->request->getMethod() == 'post') {

			if(! $this->validate($this->rules)) {
				$data['validation'] = $this->validator;

			} 
			else {
				$model = new HizmetModel();

				$resim = $this->request->getFile('resim');

				if($resim->getName()) {
					$_POST['resim'] = $this->resimUpload($resim);
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
		$model = new HizmetModel();
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

	//--------------------------------------------------------------------

}
