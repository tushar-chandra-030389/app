<?php

namespace Profile\Controller\Helpers;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Crypt\Key\Derivation\SaltedS2k;
use Zend\Math\Rand;

use Application\Controller\Helpers\MessageConstants AS MC;

use Application\Controller\Helpers\Authenticate AS Auth;

use Application\Model\Mapper\UserSportsMapper AS UserSportsMapper;

class Player implements  ServiceLocatorAwareInterface{
	protected $services;
	private $inputFilter;
	
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
	
	public function validateFootball(&$data)
	{
		$this->inputFilter = $this->services->get('Profile\Form\Filter\FootballForm');
		$this->inputFilter->inputFilter->setData($data);
		return $this->inputFilter->inputFilter->isValid();
	}

	public function validateBasketball(&$data)
	{
		$this->inputFilter = $this->services->get('Profile\Form\Filter\BasketballForm');
		$this->inputFilter->inputFilter->setData($data);
		return $this->inputFilter->inputFilter->isValid();
	}

	public function validate() 
	{
		$data = $this->services->get('request')->getPost();
		if($data['sportId'] === "1" ) {
			return $this->validateFootball($data);
		} elseif ($data['sportId'] === "2") {
			return $this->validateBasketball($data);
		}
		return FALSE;
        
	}

	public function addSports()
	{
		$SportsTable = null;		
		if (is_object($this->inputFilter)) {
			switch (get_class($this->inputFilter)) {
				case 'Profile\Form\Filter\FootballForm':
					$SportsTable = $this->services->get('Model:FootballTable');			
					break;

				case 'Profile\Form\Filter\BasketballForm':
					$SportsTable = $this->services->get('Model:BasketballTable');
					break;
				
				default:
					# code...
					break;
			}
		} else {
			echo "Validate first";exit;
		}

		$data = $this->inputFilter->inputFilter->getValues();
		if ($data['sportId'] === "1") {
			$sportsMapper = $this->services->get('Mapper:Football');
			$sportsMapper->status = "102";
			if ($data['foot'] === "Right") {
				$sportsMapper->foot = 'R';
			} else {
				$sportsMapper->foot = "L";
			}
		} elseif ($data['sportId'] === "2") {
			$sportsMapper = $this->services->get('Mapper:Basketball');
			$sportsMapper->status = "103";
		}
		$uid = $this->getServiceLocator()->get('Authenticate')->getSession('id');
		/*var_dump($session);
		exit;*/
		/*var_dump($data);
		var_dump($userSportsTable);exit;*/
		$sportsMapper->uid = $uid;
		$sportsMapper->format = $data['format'];
		$sportsMapper->position = $data['ps1'];
		
		$sportsMapper->created_at = $this->services->get('Date\Now\AsiaKolkata')->format('Y/m/d H:i:s');
		$sportsMapper->modified_at = $sportsMapper->created_at;
		/*var_dump($sportsMapper);exit;*/

		$updateUserSportsTable = $this->services->get('Model:UserSportsTable');
		$UserSportsMapper = $this->services->get('Mapper:UserSports');

		$UserSportsMapper->uid = $sportsMapper->uid;
		if ($data['sportId'] === "1") {
			$UserSportsMapper->football = "1";
			$UserSportsMapper->status = "102";
		} elseif ($data['sportId'] === "2") {
			$UserSportsMapper->basketball = "1";
			$UserSportsMapper->status = "103";
		} elseif ()
		
		/*$UserSportsMapper->status = ""
		var_dump($result);
		var_dump($UserSportsMapper);
		exit;*/
		$result = $SportsTable->addSport($sportsMapper);
		return $result;
		
	}	
}