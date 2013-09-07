<?php

namespace Event\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

use Application\Controller\Helpers\MessageConstants AS MC;

class IndexController extends AbstractActionController
{
	public function indexAction()
    {
		echo " In Event Home Page";
	}

    public function createAction()
    {
        $eventSingleForm = $this->getServiceLocator()->get('Event\Form\EventSingleForm');
        $eventSingleForm->form->setAttribute('action',$this->url()->fromRoute('event-rest'));

        $eventMultipleForm = $this->getServiceLocator()->get('Event\Form\EventMultipleForm');
        $eventMultipleForm->form->setAttribute('action', $this->url()->fromRoute('event-multiple'));

        $view = new ViewModel(array());
        $view->setTemplate('event/index/create');
            $viewEventSingleForm = new ViewModel(array('eventSingleForm' => $eventSingleForm->form, 'groupId' => "0"));
            $viewEventSingleForm->setTemplate('event/forms/single');

            $viewEventMultipleForm = new ViewModel(array('eventMultipleForm' => $eventMultipleForm->form,
                'groupId'  => "1"));
            $viewEventMultipleForm->setTemplate('event/forms/multiple');

        $view->addChild($viewEventSingleForm, 'viewEventSingleForm');
        $view->addChild($viewEventMultipleForm, 'viewEventMultipleForm');
        return $view;
    }
}