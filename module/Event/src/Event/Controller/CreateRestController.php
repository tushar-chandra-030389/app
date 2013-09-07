<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shafox
 * Date: 3/9/13
 * Time: 4:28 PM
 * To change this template use File | Settings | File Templates.
 */
    namespace Event\Controller;

    use Zend\Mvc\Controller\AbstractRestfulController;
    use Zend\View\Model\ViewModel;
    use Zend\Json\Json;

    use Application\Controller\Helpers\MessageConstants AS MC;

    class CreateRestController extends AbstractRestfulController
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
                /*var_dump($helperAddEvent->validate());
                var_dump($this->getServiceLocator()->get('request')->getPost());exit;*/
                if ($helperAddEvent->validate())
                {
                    $result = $helperAddEvent->addSingleEvent();

                    if ($result)
                    {
                        echo "looks fine.";
                        //$a  = $result->getLastGeneratedValue();
                        var_dump($result->getGeneratedValue());
                    }
                    else
                    {
                        echo "cant insert or other issues";
                    }
                }
                else
                {
                    echo "Validation Fails";
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