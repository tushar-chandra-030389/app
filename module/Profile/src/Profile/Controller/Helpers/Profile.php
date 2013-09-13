<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shafox
 * Date: 11/9/13
 * Time: 6:35 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Profile\Controller\Helpers;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Profile  implements  ServiceLocatorAwareInterface
{
    //protected $services;

    public function __construct($sm)
    {
        $this->setServiceLocator($sm);
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->services = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->services;
    }

    public function profileDetails ($userId){
        $userTable = $this->services->get('Model:UserTable');
        $result = $userTable->getUserById($userId);
        //var_dump($result);exit;
        if($result === FALSE){
            return FALSE;
        } else {
            return $result->current();
        }
    }

    public function profileFootball ($userId) {
        $userTable = $this->services->get('Model:UserTable');
        $footballTable = $this->services->get('Model:FootballTable');
        $result = $footballTable->getUserFootballProfile($userId);
        /*//var_dump($result);exit;
        if($result === NULL) {
            return FALSE;
        } else {
            return $result->current();
        }*/
    }
}