<?php namespace App\Controllers;

use App\Models\KullaniciModel;

class Auth extends BaseController
{
	public function login()
	{
		$data['global'] = $this->global;

        if(session()->get('isLoggedIn'))
            return redirect()->to('/admin/hizmet');
        
        helper(['form']);

		if($this->request->getMethod() == 'post') {

			$rules = [
				'kullanici_adi'	=> 'required',
				'sifre' 	=> 'required|validateUser[kullanici_adi,sifre]',
			];

			$errors = [
				'sifre' => [
                    'required' => 'Şire alanı boş bırakılamaz.',
					'validateUser' => 'Kullanıcı adı veya şifre hatalı!'
                ],
                'kullanici_adi' => [
                    'required' => 'Kullanıcı adı alanı boş bırakılamaz.'
				]
			];


			if(! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;

			} else {
				$model = new KullaniciModel();

				$user = $model->where('kullanici_adi', $this->request->getvar('kullanici_adi'))
							  ->first();
                print_r($user);
				$this->setUserSession($user);
				return redirect()->to('/admin/hizmet');
			}
		}
		
		return view('login', $data);
    }


    public function logout()
	{
		session()->destroy();
		return redirect()->to('/');
	}
    

	private function setUserSession($user)
	{
		$data = [
			'id' => $user['id'],
			'email' => $user['email'],
			'isLoggedIn' => true			
		];

		session()->set($data);
		return true;
	}

	//--------------------------------------------------------------------

}
