<?php

namespace Profile\Controller\Helpers;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Application\Controller\Helpers\MessageConstants AS MC;

class Organiser implements  ServiceLocatorAwareInterface{
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
	
	public function validateIndividual(&$data)
	{
		$this->inputFilter = $this->services->get('Profile\Form\Filter\OrganiserIndividualForm');
		$this->inputFilter->inputFilter->setData($data);
		return $this->inputFilter->inputFilter->isValid();
	}

	public function validateGroup(&$data)
	{
		$this->inputFilter = $this->services->get('Profile\Form\Filter\OrganiserGroupForm');
		$this->inputFilter->inputFilter->setData($data);
		return $this->inputFilter->inputFilter->isValid();
	}

	public function validate() 
	{
		$data = $this->services->get('request')->getPost();
		if($data['type'] === "I" ) {
			return $this->validateIndividual($data);
		} elseif ($data['type'] === "G") {
			return $this->validateGroup($data);
		}
		return FALSE;
        
	}

	public function addOrganiser()
	{
		$organiserTable = $this->services->get('Model:OrganiserTable');
		$organiserMapper = $this->services->get('Mapper:Organiser');

		$data =$this->inputFilter->inputFilter->getValues();
		//var_dump($data);
		$organiserMapper->added_by = $this->getServiceLocator()->get('Authenticate')->getSession('id');
		$organiserMapper->name = $data['name'];
		$organiserMapper->type = $data['type'];
		$organiserMapper->contact_num = $data['cn'];
		$organiserMapper->email = $data['em'];
		$organiserMapper->address = $data['address'];
		$organiserMapper->lat = $data['lat'];
		$organiserMapper->lon = $data['lon'];
		$organiserMapper->created_at = $this->services->get('Date\Now\AsiaKolkata')->format('Y/m/d H:i:s');
		$organiserMapper->modified_at = $organiserMapper->created_at;
		$organiserMapper->status = "150";


		$result = $organiserTable->addOrganiser($organiserMapper);
		return $result;

	}
}