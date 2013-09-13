<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shafox
 * Date: 11/9/13
 * Time: 12:52 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container AS SessionContainer;
use Application\Controller\Helpers\MessageConstants AS MC;

class LogoutController extends AbstractActionController
{
    public function indexAction()
    {
        $authenticate = $this->getServiceLocator()->get('Authenticate');
        //var_dump($authenticate);exit;
        if($authenticate->authenticate() === MC::AUTHENTICATION_SUCCESS)
        {
            $container = new SessionContainer('user');
            $container->getManager()->getStorage()->clear('user');
            return $this->redirect()->toRoute('home');
        }
        else
        {
            echo "Neyt";
        }
    }
}