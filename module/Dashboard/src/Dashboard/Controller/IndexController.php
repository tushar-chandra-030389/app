<?php
/*

 * PATH : Dashboard/src/Dashboard/Controller/IndexController.php
	
*/


namespace Dashboard\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

use Application\Controller\Helpers\MessageConstants AS MC;

class IndexController extends AbstractActionController
{

	public function indexAction()
    {
        /*echo "<pre>";var_dump($this->getServiceLocator()->get('router'));*/
    	$authenticate = $this->getServiceLocator()->get('Authenticate');
		if($authenticate->authenticate() === MC::AUTHENTICATION_FAILED) {
			echo "Authentication failed redirect to signin";exit;
		} else {
            echo "There There";
        }

        $view = new ViewModel();
        $view->setTemplate('dashboard/index/index');
        return $view;

    }
}
