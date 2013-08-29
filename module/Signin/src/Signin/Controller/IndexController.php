<?php
/*

 * PATH : Signin/src/Signin/Controller/IndexController.php
	
*/

namespace Signin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Controller\Helpers\MessageConstants AS MC;
use Signin\Controller\Helpers\Signin AS HelperSignin;

class IndexController extends AbstractActionController
{
	public function indexAction()
    {
    	$authenticate = $this->getServiceLocator()->get('Authenticate');
		if($authenticate->authenticate() === MC::AUTHENTICATION_SUCCESS) {
			$this->redirect()->toRoute('dashboard');
			
		}
		
    	$formSignin = $this->getServiceLocator()->get('Signin\Form\SigninForm'); // Get Form
		$formSignin->form->setAttribute('action',$this->url()->fromRoute('signin')); // Assign submit route to form
		
		if($this->getServiceLocator()->get('request')->isPost()) { // Form is submitted ie. has post data
			$helperSignin = $this->getServiceLocator()->get('Signin\Controller\Helpers\Signin');
			//var_dump($helperSignin->validate());exit;
			if($helperSignin->validate() === TRUE) {
				$result = $helperSignin->authenticate();
				//var_dump($result);exit;
				if($result === MC::SIGNIN_AUTHENTICATE_SUCCESS) {
					/* Success */
					$authResult = $authenticate->authorize($formSignin->form->getData()['em']);
					//var_dump($authResult);exit; 

					if($authResult === MC::AUTHORIZATION_FAILED) {
						/* Auth Failed */
					} else if($authResult === MC::DB_ERROR) {
						/* Auth DB Error */
					} else if($authResult === MC::AUTHORIZATION_SUCCESS) {
						/* Auth Success */
						if($authenticate->getSession('st') === '101') {
							/* Add Company */
							//$this->redirect()->toRoute('company_add');
							echo "string";exit;
						} else {							
							/* Redirect to dashboard */
							echo "Redirect to profile";exit;
						}
					}
				} else if($result === MC::INVALID_CREDENTIALS) {
					/* Invalid Credentials */
					$formSignin->form->setData(array('em' => $formSignin->form->getData()['em'], 'pass' => '')); // Empty password field
				} else if($result === MC::DB_ERROR) {
					/* DB Error */
				}
				
			}
		} else {
			$formSignin->form->setData(array());
		}
		
		{ /* Views */
			$view = new ViewModel(array()); 
	    	$view->setTemplate('signin/index/index');
			
				$viewSigninForm = new ViewModel(array('formSignin' => $formSignin->form));
				$viewSigninForm->setTemplate('signin/index/signin-form');
			
			$view->addChild($viewSigninForm, 'viewSigninForm');
			return $view;
		}
    }
}
