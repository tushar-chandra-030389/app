<?php

namespace Event\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

use Application\Controller\Helpers\MessageConstants AS MC;

class CreateGroupRestController extends AbstractRestfulController
{
    public function getList()
    {
        var_dump($_COOKIE);exit;
    }

    public function get($id)
    {
        # code...
    }

    public function create($data)
    {
        if ($this->getServiceLocator()->get('request')->isPost())
        {
            $helperAddEvent = $this->getServiceLocator()->get('Event\Controller\Helpers\Add');
            //var_dump($helperAddEvent->validate());
            //var_dump($this->getServiceLocator()->get('request')->getPost());exit;
            /*if ($helperAddEvent->validate())
            {
                $result = $helperAddEvent->();
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
            }*/
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