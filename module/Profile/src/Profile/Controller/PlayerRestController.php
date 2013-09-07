<?php

namespace Profile\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

class PlayerRestController extends AbstractRestFulController
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
			$helperAddSports = $this->getServiceLocator()->get('Profile\Controller\Helpers\Player');

			//var_dump($helperAddSports->validate());exit;
			//var_dump($this->getServiceLocator()->get('request')->getPost());exit;
			//$helperAddSports->validate();
			if ($helperAddSports->validate()) 
			{
				$result = $helperAddSports->addSports();
				if ($result === TRUE)
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