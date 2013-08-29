<?php
/*

 * PATH : Signup/src/Signup/Controller/IndexController.php
	
*/

namespace Signup\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Controller\Helpers\MessageConstants AS MC;
//use Signup\Controller\Helpers\Signup AS HelperSignup;

class IndexController extends AbstractActionController
{
	public function indexAction()
    {
    	$formSignup = $this->getServiceLocator()->get('Signup\Form\SignupForm'); // Get Form
		$formSignup->form->setAttribute('action',$this->url()->fromRoute('signup')); // Assign submit route to form
		$viewData = array("error" => array(), "msg" => array());
		if($this->getServiceLocator()->get('request')->isPost()) { // Form is submitted ie. has post data
            //var_dump($this->getServiceLocator()->get('request')->getPost());exit;
			$helperSignup = $this->getServiceLocator()->get('Signup\Controller\Helpers\Signup');
            //var_dump($helperSignup->validate());exit;
            $resultValidation = $helperSignup->validate();
			if($resultValidation === TRUE) {
				$result = $helperSignup->addUser();
				//var_dump($result);exit;
				if($result === MC::EMAIL_EXISTS) {
					/* Failure */
					$viewData["msg"][MC::EMAIL_EXISTS] = "blah";
				} else if($result === MC::DB_ERROR){
					/* Failure */
				} else {
					/* Success */
					echo "Signup Success";exit;
				}
			} else {
				$viewData['error']['validation'] = $resultValidation;
			}
		} else {
			$formSignup->form->setData(array());
		}
		
		$view = new ViewModel(array()); 
    	$view->setTemplate('signup/index/index');
		
			$viewSignupForm = new ViewModel(array('formSignup' => $formSignup->form, 'viewData' =>$viewData));
			$viewSignupForm->setTemplate('signup/index/signup-form');
		
		$view->addChild($viewSignupForm, 'viewSignupForm');
		return $view;
    }
}
