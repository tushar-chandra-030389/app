<?php
/*

 * PATH : Profile/src/Profile/Controller/IndexController.php
	
*/

namespace Profile\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

use Application\Controller\Helpers\MessageConstants AS MC;

class IndexController extends AbstractActionController
{
	public function indexAction() {
		echo " In Profile Home Page";
	}
}