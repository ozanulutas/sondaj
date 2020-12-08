<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

// before ve after metolarının ikisini de kullanmak zorunda değiliz fakat sınıf içinde ikisi de yer lamalıdır.

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // if(! session()->get('isLoggedIn'))
        //     return redirect()->to('/');

        $uri = service('uri');
        if($uri->getSegment(1) == 'admin' && !session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}