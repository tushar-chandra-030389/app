<?php

namespace Event\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

use Application\Controller\Helpers\MessageConstants AS MC;

class IndexController extends AbstractActionController
{
	public function indexAction() {
		echo " In Event Home Page";
	}
}