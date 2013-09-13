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
        $helperDetails = $this->getServiceLocator()->get('Profile\Controller\Helpers\Profile');
        $profileDetails = $helperDetails->profileDetails($this->getServiceLocator()->get('Authenticate')->getSession('id'));

        $view = new viewModel(array("profileDetails" => json_encode($profileDetails)));
        $view->setTemplate('profile/index/index');
        return $view;
	}
}