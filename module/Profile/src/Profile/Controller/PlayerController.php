<?php
/*

 * PATH : Profile/src/Profile/Controller/PlayerController.php
	
*/

namespace Profile\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

use Application\Controller\Helpers\MessageConstants AS MC;

class PlayerController extends AbstractActionController
{
	public function indexAction()
    {
		echo " In Player Home Page";
	}

    public function createAction()
    {
        $sportsForm = $this->getServiceLocator()->get('Profile\Form\SportsForm');
        $sportsForm->form->setAttribute('action',$this->url()->fromRoute('profile_rest'));

        $footballForm = $this->getServiceLocator()->get('Profile\Form\FootballForm');
        $footballForm->form->setAttribute('action', $this->url()->fromRoute('profile_rest'));

        $basketballForm = $this->getServiceLocator()->get('Profile\Form\BasketballForm');
        $basketballForm->form->setAttribute('action', $this->url()->fromRoute('profile_rest'));

        $view = new ViewModel(array()); 
        $view->setTemplate('profile/player/create');
        
            $viewSportsForm = new ViewModel(array('sportsForm' => $sportsForm->form));
            $viewSportsForm->setTemplate('player/sports-form');

            $viewFootballForm = new ViewModel(array('footballForm' => $footballForm->form));
            $viewFootballForm->setTemplate('player/football-form');

            $viewBasketballForm = new ViewModel(array('basketballForm' => $basketballForm->form));
            $viewBasketballForm->setTemplate('player/basketball-form');
        
        $view->addChild($viewSportsForm, 'viewSportsForm');
        $view->addChild($viewFootballForm, 'viewFootballForm');
        $view->addChild($viewBasketballForm, 'viewBasketballForm');
        return $view;

    }
}