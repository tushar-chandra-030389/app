<?php
/*

 * PATH : Application/src/Application/Controller/IndexController.php
	
*/


namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container AS SessionContainer;

class IndexController extends AbstractActionController {
	/*
	 THIS IS FOR TEST PURPOSE
	 */
	public function indexAction() {
		echo "<pre>";var_dump($_SESSION);
		$container = new SessionContainer('user');
		$container->offsetSet("name","Tushar") ;
		echo "<pre>";var_dump($_SESSION);
		var_dump($container->offsetExists('name'));
    	$view = new ViewModel(array('testData' => array(0=>"Zero", 1=> "One") ));
    	$view->setTemplate('application/index/index');
		return $view;
    }

	/*
	 THIS IS FOR TEST PURPOSE
	 */
	public function fooAction() {
		echo "<pre>";var_dump($_SESSION);
		$container = new SessionContainer('user');
		var_dump($container->getManager()->getId());
		$container->getManager()->regenerateId(true);
		var_dump($container->getManager()->getId());
		$bar = $this->forward()->dispatch('Application\Controller\Index', array('action' => 'bar'));
		var_dump($bar);
		exit;
	}
	
	public function barAction() {
		return 100;
	}

	public function sessionAction() {
		echo '<pre>';
		var_dump($_SESSION);
		exit;
	}
}