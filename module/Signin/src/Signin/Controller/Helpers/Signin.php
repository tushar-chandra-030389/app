<?php
/*

 * PATH : Signin/src/Signin/Controller/Helpers/Signin.php
	
*/

namespace Signin\Controller\Helpers;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Crypt\Key\Derivation\Pbkdf2;
use Zend\Crypt\Key\Derivation\SaltedS2k;
use Zend\Math\Rand;

use Application\Controller\Helpers\MessageConstants AS MC;
use Application\Model\Mapper\User AS UserMapper;


class Signin implements  ServiceLocatorAwareInterface{
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
	
	public function validate() {
		$formSignin = $this->services->get('Signin\Form\SigninForm'); //Get signin form
		$filterSignin = $this->services->get('Signin\Form\Filter\SigninForm'); // Get Form Filter
		$formSignin->form->setInputFilter($filterSignin->inputFilter);
		//$formSignin->form->setData($this->services->get('request')->getPost());
        //$formSignin->form->isValid();
		//echo "<pre>";var_dump($filterSignin->inputFilter->getMessages());exit;
		$formSignin->form->setData($this->services->get('request')->getPost());
		
		return $formSignin->form->isValid(); /* Return */
	}
	
	public function authenticate() {
		$userTable = $this->services->get('Application\Model\UserTable');
		$formSignin = $this->services->get('Signin\Form\SigninForm'); //Get signin form
		$data = $formSignin->form->getData();
		
		$result = $userTable->getUserForAuthentication($data['em']);
		//var_dump($result);exit;
		if($result === array()) {
			return MC::INVALID_CREDENTIALS; /* Return */
		} else if($result === NULL) {
			return MC::DB_ERROR; /* Return */
		} else if(get_class($result) === 'Zend\Db\ResultSet\ResultSet') {
			$row = $result->current();
			
			if($this->getServiceLocator()->get('Authenticate')->getHash($row->salt, $data['pass']) === $row->hash) {
				return MC::SIGNIN_AUTHENTICATE_SUCCESS; /* Return */
			} else {
				return MC::INVALID_CREDENTIALS; /* Return */
			}
		}
	}
}
