<?php

namespace Profile\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

class OrganiserRestController extends AbstractRestFulController
{

	public function getList()
	{
	    # code...
	}

	public function get($id)
	{
	    # code...
	}

	public function create($data)
	{
		if ($this->getServiceLocator()->get('request')->isPost()) 
		{
			//var_dump($this->getServiceLocator()->get('request')->getPost());exit;
			$helperOrganiserAdd = $this->getServiceLocator()->get('Profile\Controller\Helpers\Organiser');
			//var_dump($helperOrganiserAdd->validate());
			//var_dump($helperOrganiserAdd->addOrganiser());exit;
			//$helperOrganiserAdd->validate();
			if ($helperOrganiserAdd->validate()) 
			{
				$result = $helperOrganiserAdd->addOrganiser();
				if ($result) 
				{
					echo "1";
				}
				else 
				{
					echo "2";
				}
			} 
			else 
			{
				echo "False";
			}
			exit;
		}
	}

	public function update($id, $data)
	{
	    # code...
	}

	public function delete($id)
	{
	    # code...
	}

}