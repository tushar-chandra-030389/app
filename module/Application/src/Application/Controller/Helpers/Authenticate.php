<?php
/*

 * PATH : Application/src/Application/Controller/Helpers/Authenticate.php
	
*/

namespace Application\Controller\Helpers; 

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\Container AS SessionContainer;

use Zend\Crypt\Key\Derivation\Pbkdf2;
use Zend\Crypt\Key\Derivation\SaltedS2k;
use Zend\Math\Rand;

use Application\Controller\Helpers\MessageConstants AS MC;
use Application\Model\Mapper\Company AS CompanyMapper;


class Authenticate  implements  ServiceLocatorAwareInterface {
	protected $services;
	
	public function __construct($sm) {
		 $this->setServiceLocator($sm);
	}
	
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->services = $serviceLocator;
    }
	
	public function getServiceLocator() {
        return $this->services;
    }

    public function authorize($email) {
    	$userTable = $this->services->get('Application\Model\UserTable');
    	$result = $userTable->getUserForAuthentication($email);
    	
    	if($result === NULL) {
    		return MC::DB_ERROR; /* Return */
    	} else if($result === array()) {
    		return MC::AUTHORIZATION_FAILED; /* Return */
    	} else if(get_class($result) === 'Zend\Db\ResultSet\ResultSet') {
    		$details = $result->current();
    		$container = new SessionContainer('user');
    		$container->offsetSet('id',$details->id);
    		$container->offsetSet('fn',$details->first_name);
    		$container->offsetSet('ln',$details->last_name);
    		$container->offsetSet('em',$details->email);
    		$container->offsetSet('st',$details->status);
    		$container->offsetSet('token',$container->getManager()->getId());

    		$atDbResult = $this->_addTokenToDB();
    		return MC::AUTHORIZATION_SUCCESS; /* Return */
    	}
    	return MC::AUTHORIZATION_FAILED; /* Return */
    }

    public function authenticate() {
        $container = new SessionContainer('user');
    	if($container->offsetExists('id') && $container->offsetExists('token')) {
            return MC::AUTHENTICATION_SUCCESS;
        } else {
            return MC::AUTHENTICATION_FAILED;
        }
    }


    private function _addTokenToDB() {
    	/* Pending */
    }

    public function getSession($key, $namespace = 'user') {
        $container = new SessionContainer($namespace);
        if($container->offsetExists($key) ) {
            return $container->offsetGet($key);
        }
        return NULL;
    }

    public function setSession($key, $value, $namespace = 'user') {
        $container = new SessionContainer($namespace);
        if($container->offsetExists($key) ) {
            return $container->offsetSet($key, $value);
        }
        return NULL;
    }

    public function unsetSession($namespace = 'user') {
    	$container = new SessionContainer($namespace);
    	$container->getManager()->getStorage()->clear('user');
    }
	

    public function getSalt (&$data) {
        $randStr    =   Rand::getString(16, 'abcdefghijklmnopqrstuvwxyz'.strtoupper($data['fn'].$data['ln']), true);
        $date   =   new \DateTime('now',new \DateTimeZone('Asia/Kolkata'));
        $dateFormatted  =   $date->format('YmdHis');
        $randNum    =   Rand::getInteger((int)substr($dateFormatted, 0,6),(int)substr($dateFormatted, 6));
        return $randStr.str_pad((string)$randNum, 16,Rand::getString(16, 'abcdefghijklmnopqrstuvwxyz0123456789'),STR_PAD_RIGHT);
    }
	
	public function getHash($salt, $password){
        //return (string)Pbkdf2::calc('sha256', $this->signupFormData['password'], $salt, 10000,32);
        //return SaltedS2k::calc('sha256', $this->signupFormData['password'], $salt, 32);
        return crypt($password, $salt);
        //return hash ( 'sha256' , $this->signupFormData['password']);
        //return hash_hmac ( 'sha256' , $salt , $this->signupFormData['password'] ,false );
    }

    public function getRandomPassword(&$data) {
        return 'abcdefgh';
    }
}
