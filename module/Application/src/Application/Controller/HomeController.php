<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container AS SessionContainer;
use Application\Controller\Helpers\MessageConstants AS MC;

class HomeController extends AbstractActionController 
{
	public function indexAction()
	{
        $formSignin = $this->getServiceLocator()->get('Signin\Form\SigninForm'); // Get Form
        $formSignin->form->setAttribute('action',$this->url()->fromRoute('signin')); // Assign submit route to form

        $formSignup = $this->getServiceLocator()->get('Signup\Form\SignupForm'); // Get Form
        $formSignup->form->setAttribute('action',$this->url()->fromRoute('signup')); // Assign submit route to form

		$view = new ViewModel(array());
        $view->setTemplate('home/index');
            $viewSigninForm = new ViewModel(array('formSignin' => $formSignin->form));
            $viewSigninForm->setTemplate('home/signin-form');

            $viewSignupForm = new ViewModel(array('formSignup' => $formSignup->form, 'viewData' =>$viewData));
            $viewSignupForm->setTemplate('home/signup-form');

        $view->addChild($viewSignupForm, 'viewSignupForm');

        $view->addChild($viewSigninForm, 'viewSigninForm');
		return $view;
	}

    public function aboutAction()
    {
        $view = new ViewModel();
        $view->setTemplate('about/index');
        return $view;
    }
}