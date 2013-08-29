<?php
/*

 * PATH : Dashboard/src/Dashboard/Controller/Helpers/Dashboard.php
	
*/

namespace Dashboard\Controller\Helpers;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Crypt\Key\Derivation\Pbkdf2;
use Zend\Crypt\Key\Derivation\SaltedS2k;
use Zend\Math\Rand;

use Application\Controller\Helpers\MessageConstants AS MC;


class Dashboard implements  ServiceLocatorAwareInterface{
	protected $services;
	
	private static $count = 1;
	
	public function __construct($sm) {
		 $this->setServiceLocator($sm);
	}
	
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->services = $serviceLocator;
    }
	
	public function getServiceLocator() {
        return $this->services;
    }
	
	public function findRoles() {
		$userType = (int)($this->services->get('Authenticate')->getSession('ty'));
		$resultCmpList = $this->getCompanyList();
		if($resultCmpList === array()) {
			return MC::NO_ACTIVE_ROLES; /* Return */
		} else if($resultCmpList !== MC::DB_ERROR) {
			
			/* Roles found save in RoleContainer */
			$roleContainer = $this->services->get('RolesContainer');
			
			/* If user is lvl0 for company/companies */
			if($userType >= 16) {
				$this->getCompanyForLevel($resultCmpList, 0, $roleContainer);
				$userType = ((int)$userType) & $this->getMaskForType(0);
			}
			
			/* If user is lvl1 for company/companies */
			if($userType >= 8) {
				$this->getCompanyForLevel($resultCmpList, 1, $roleContainer);
				$userType = ((int)$userType) & $this->getMaskForType(1);
			}
			
			/* If user is lvl2 for company/companies */
			if($userType >= 4) {
				
				$this->getCompanyForLevel($resultCmpList, 2, $roleContainer);
				$userType = ((int)$userType) & $this->getMaskForType(2);
			}
			
			/* If user is lvl3 for company/companies */
			if($userType >= 2) {
				$this->getCompanyForLevel($resultCmpList, 3, $roleContainer);
				$userType = ((int)$userType) & $this->getMaskForType(3);
			}
			
			/* If user is lvl4 for company/companies */
			if($userType >= 1) {
				$this->getCompanyForLevel($resultCmpList, 4, $roleContainer);
				$userType = ((int)$userType) & $this->getMaskForType(4);
			}
			
			return $roleContainer; /* Return */
		}
		return MC::DB_ERROR; /* Return */
	}
	
	private function getMaskForType($type) {
		switch ($type) {
			case 0: return bindec('01111'); break;
			case 1: return bindec('10111'); break;
			case 2: return bindec('11011'); break;
			case 3: return bindec('11101'); break;
			case 4: return bindec('11110'); break;
		}
		return NULL;
	}
	
	private function getCompanyList() {
		$addedUserTable = $this->services->get('Application\Model\AddedUsersTable');
		$result = $addedUserTable->getCompanyListForAUser((int)($this->services->get('Authenticate')->getSession('id')));
		if($result === NULL) {
			return MC::DB_ERROR;
		}
		return $result;
	}
	
	private function getCompanyForLevel($companyList, $lvl, &$roleContainer) {
		while($companyList->valid()) {
			$row = $companyList->current();
			if($row->type == $lvl) {
				$roleContainer->addToLevel($lvl, $row);
				$companyList->next();
			} else {
				break;
			}
		}
	}
	
	public function selectRole($forCompany, $level, $company) {
		$addedUserTable = $this->services->get('Application\Model\AddedUsersTable');
		$result = $addedUserTable->getAUByFCmpLvlCmp($forCompany, $level, $company);
		
		if($result === NULL)
			return MC::DB_ERROR;
		else if($result === array())
			return $result;
		
		$data = $result->current();
		
		/* Add Company details to session */
		$companyMapper = $this->services->get('Application\Model\Mapper\Company');
		$companyMapper->exchangeArray($data->forcmp);
		$this->getServiceLocator()->get('Authenticate')->setActiveRole($level, $companyMapper);
		$companyMapper->exchangeArray($data->cmp);
		$this->getServiceLocator()->get('Authenticate')->addUserCompanyInfo($companyMapper);
		
		return $data;
	}
}