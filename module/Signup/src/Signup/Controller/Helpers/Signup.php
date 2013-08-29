<?php
/*

 * PATH : Signup/src/Signup/Controller/Helpers/Signup.php
	
*/

namespace Signup\Controller\Helpers;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Crypt\Key\Derivation\Pbkdf2;
use Zend\Crypt\Key\Derivation\SaltedS2k;
use Zend\Math\Rand;

use Application\Controller\Helpers\MessageConstants AS MC;
use Application\Model\Mapper\User AS UserMapper;


class Signup implements  ServiceLocatorAwareInterface{
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
		$formSignup = $this->services->get('Signup\Form\SignupForm'); //Get signup form
		$filterSignup = $this->services->get('Signup\Form\Filter\SignupForm'); // Get Form Filter
		$formSignup->form->setInputFilter($filterSignup->inputFilter);
		$formSignup->form->setData($this->services->get('request')->getPost());
        $formSignup->form->isValid();
        //var_dump($formSignup->form->isValid());exit;
        //echo "<pre>";var_dump($filterSignup->inputFilter->getMessages());exit;
		if($formSignup->form->isValid() === TRUE) {
			if($formSignup->form->getData()['pass'] === $formSignup->form->getData()['repass']) {
				return TRUE; /* Return */
			}
		} 
		return $filterSignup->inputFilter->getMessages();
	}
	
	public function addUser() {
		$userTable = $this->services->get('Application\Model\UserTable');
		$formSignup = $this->services->get('Signup\Form\SignupForm'); //Get signup form
		$data = $formSignup->form->getInputFilter()->getValues();
		
		$userTable = $this->services->get('Application\Model\UserTable');
		$result = $userTable->integrityCheck($data['em'], $data['un']);

		/*$result = $this->emailExists($data['em']);*/
		//var_dump($result);exit;
		
		if($result === NULL){
			return MC::DB_ERROR; /* Return */
		} elseif($result !== array()) {
			return MC::EMAIL_EXISTS; /* Return */
		} 
		 
		
		$mapperUser = $this->services->get('Application\Model\Mapper\User');
        $mapperUser->first_name = $data['fn'];
        $mapperUser->last_name = $data['ln'];
        $mapperUser->username = $data['un'];
        $mapperUser->email = $data['em'];
        $mapperUser->gender = $data['sex'];
        //$mapperUser->pass = $
		
		$mapperUser->created_at = $this->services->get('Date\Now\AsiaKolkata')->format('Y/m/d H:i:s');
		$mapperUser->modified_at = $mapperUser->created_at;
		
		$mapperUser->status = '101'; //User Inactive needs to add other information
        $mapperUser->profileid = '000';
		
		$mapperUser->salt = $this->getServiceLocator()->get('Authenticate')->getSalt($data);
		$mapperUser->hash =  $this->getServiceLocator()->get('Authenticate')->getHash($mapperUser->salt, $data['pass']);
		//var_dump(sprintf("%s : %s",$mapperUser->salt, $mapperUser->hash));exit;
		//var_dump($mapperUser);exit;
		
		$result = $userTable->addUser($mapperUser);
		
		if($result != NULL) {
			return $result->getGeneratedValue(); /* Return */
		}
		return MC::DB_ERROR; /* Return */
	}
	
	public function emailExists($email) {
		$userTable = $this->services->get('Application\Model\UserTable');
		return $userTable->getUserByEmail($email);
	}
}
