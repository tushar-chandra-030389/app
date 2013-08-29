<?php
/*

 * PATH : Profile/src/Profile/Controller/OrganiserController.php
	
*/

namespace Profile\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

use Application\Controller\Helpers\MessageConstants AS MC;

class OrganiserController extends AbstractActionController
{
	public function indexAction() 
	{
		$view = new ViewModel();
		$view->setTemplate('profile/organiser/index');

		return $view;
	}

	public function createAction() 
	{
		$individualForm = $this->getServiceLocator()->get('Profile\Form\OrganiserIndividualForm');
        $individualForm->form->setAttribute('action',$this->url()->fromRoute('organiser_rest'));

        $groupForm = $this->getServiceLocator()->get('Profile\Form\OrganiserGroupForm');
        $groupForm->form->setAttribute('action',$this->url()->fromRoute('organiser_rest'));

        $view = new ViewModel(array()); 
        $view->setTemplate('profile/organiser/create');
        	$viewGroupForm = new ViewModel(array('groupForm' => $groupForm->form));
			$viewGroupForm->setTemplate('organiser/group');
			$viewIndividualForm = new ViewModel(array('individualForm' => $individualForm->form));
			$viewIndividualForm->setTemplate('organiser/individual');
        $view->addChild($viewGroupForm, 'viewGroupForm');
        $view->addChild($viewIndividualForm, 'viewIndividualForm');
        return $view;
	}

}