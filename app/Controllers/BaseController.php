<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

use App\Models\SosyalMedyaModel;
use App\Models\AciklamaModel;
use App\Models\HizmetModel;
use App\Models\IletisimModel;


class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	protected $global = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		
		$model = new IletisimModel();
		$this->global['iletisim'] = $model->get()->getRow();

		$model = new HizmetModel();
		$this->global['hizmetMenu'] = $model->get()->getResult();

		$model = new AciklamaModel();
		$this->global['footerAciklama'] = $model->where('sayfa', 'footer')->get()->getRow();

		$model = new SosyalMedyaModel();
		$this->global['sosyalMedya'] = $model->get()->getResult();
	}


	protected function resimUpload($resim)
	{
		if($resim->isValid() && !$resim->hasMoved()) {
			$resim->move('.' . IMAGE_PATH);
			return $resim->getName();
		}
	}


	protected function eskiResimSil($resim)
	{
		if($resim) {
			$eskiResim = IMAGE_PATH . $resim;
			$eskiResim = substr($eskiResim, 1);
			if(file_exists($eskiResim))
			unlink($eskiResim);
		}
	}

}
