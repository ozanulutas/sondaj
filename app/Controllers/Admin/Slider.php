<?php namespace App\Controllers\Admin;

use App\Models\SliderModel;
use App\Controllers\BaseController;

class Slider extends BaseController
{
	private $rules = [
		'baslik' => [
			'rules' => 'max_length[35]',
			'errors' => [
				'max_length' => 'Başlık alanına en fazla 35 karakter yazabilirsiniz.'
			]
		],
		'metin' => [
			'rules' => 'max_length[255]',
			'errors' => [
				'max_length' => 'Metin alanına en fazla 255 karakter yazabilirsiniz.'
			]
		],
		'resim' => [
			'rules' => 'uploaded[resim]|is_image[resim]|max_size[resim,2048]',
			'errors' => [
				'uploaded' => 'Bir resim seçmelisiniz.',
				'is_image' => 'Resim dosyası seçmelisiniz.',
				'max_size' => 'En fazla 2 mb dosya boyutu desteklenmektedir.',
			]
		]
	];


	public function index()
	{
		$data['dashBaslik'] = 'Slide\'lar';

		$model = new SliderModel();
		$data['sliderlar'] = $model->get()->getResult();

		return view('slider/index', $data);
    }


	public function create()
	{
		helper(['form']);

		$data = [];		
		$data['dashBaslik'] = 'Slide Ekle';

		if($this->request->getMethod() == 'post') {

			if(! $this->validate($this->rules)) {
				$data['validation'] = $this->validator;

			} else {
				$model = new SliderModel();

				$resim = $this->request->getFile('resim');
				$_POST['resim'] = $this->resimUpload($resim);
				
				$model->save($_POST);
	
				session()->setFlashdata('success', 'Slide başarıyla eklendi.');
				return redirect()->to('index');
			}
		}

		return view('slider/create', $data);
	}


	public function edit($id)
	{
		helper(['form']);

		$data = [];
		$data['dashBaslik'] = 'Slide Düzenle';

		$model = new SliderModel();
		$data['slider'] = $model->where('id', $id)->get()->getRow();

		if($data['slider']->resim) {
			unset($this->rules['resim']);
		}


		if($this->request->getMethod() == 'post') {

			if(! $this->validate($this->rules)) {
				$data['validation'] = $this->validator;

			} 
			else {
				
				$model = new SliderModel();

				$resim = $this->request->getFile('resim');

				if($resim->getName()) {
					$_POST['resim'] = $this->resimUpload($resim);
					$this->eskiResimSil($data['slider']->resim);
				}
				else {
					$_POST['resim'] = $data['slider']->resim;
				}

				$model->save($_POST);
	
				session()->setFlashdata('success', 'Slide başarıyla güncellendi.');
				return redirect()->to('/admin/slider');
				
			}
		}

		return view('slider/edit', $data);
	}


	public function delete($id)
	{
		$model = new SliderModel();
		$slider = $model->find($id);
		echo "<pre>";
		print_r($slider);
		echo "</pre>";
		if($slider) {
			if($slider['resim']) {
				$resim = IMAGE_PATH . $slider['resim'];
				$resim = substr($resim, 1);
				unlink($resim);
			}

			$model->delete($id);

			session()->setFlashdata('success', 'Slide başarıyla silindi.');
		}

		return redirect()->to('/admin/slider');
	}


	// private function resimUpload($resim)
	// {
	// 	if($resim->isValid() && !$resim->hasMoved()) {
	// 		$resim->move('.' . IMAGE_PATH);
	// 		return $resim->getName();
	// 	}
	// }

	//--------------------------------------------------------------------

}
