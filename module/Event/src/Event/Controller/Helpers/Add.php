<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shafox
 * Date: 3/9/13
 * Time: 5:06 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Event\Controller\Helpers;

use Zend\Db\Adapter\Driver\Mysqli\Result;
use Zend\Filter\Null;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Driver\ResultInterface;

class Add implements  ServiceLocatorAwareInterface{
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

    public function validateSingle(&$data)
    {
        $this->inputFilter = $this->services->get('Event\Form\Filter\EventSingleForm');
        $this->inputFilter->inputFilter->setData($data);
        return $this->inputFilter->inputFilter->isValid();
    }

    public function validateMultiple(&$data)
    {
        $this->inputFilter = $this->services->get('Event\Form\Filter\EventMultipleForm');
        $this->inputFilter->inputFilter->setData($data);
        return $this->inputFilter->inputFilter->isValid();
    }

    public function validate()
    {
        $data = $this->services->get('request')->getPost();
        if($data['type'] === "S" ) {
            return $this->validateSingle($data);
        } elseif ($data['type'] === "M") {
            return $this->validateMultiple($data);
        }
        return FALSE;
    }

    public function addSingleEvent()
    {
        $eventTable = $this->services->get('Model:EventTable');
        $eventMapper = $this->services->get('Mapper:Event');

        $eventGroupTable = $this->services->get('Model:EventGroupTable');
        $eventGroupMapper = $this->services->get('Mapper:EventGroup');

        $data =$this->inputFilter->inputFilter->getValues();
        //var_dump($data);exit;
        if ($data['groupId'] === "0") {
            $eventGroupMapper->name = $data["name"];
            $eventGroupMapper->contact_num = $data["cn"];
            $eventGroupMapper->email = $data["em"] ? $data["em"] :
                $this->getServiceLocator()->get('Authenticate')->getSession('em');
            $eventGroupMapper->venue = $data["venue"];
            $eventGroupMapper->lat = $data["lat"];
            $eventGroupMapper->lon = $data["lon"];
            $eventGroupMapper->type = $data["type"];
            $eventGroupMapper->added_by = $this->getServiceLocator()->get('Authenticate')->getSession('id');
            $eventGroupMapper->organiser_id = $this->getServiceLocator()->get('Authenticate')->getSession('id');
            $eventGroupMapper->status = "200";
            $eventGroupMapper->created_at = $this->services->get('Date\Now\AsiaKolkata')->format('Y/m/d H:i:s');
            $eventGroupMapper->modified_at = $eventGroupMapper->created_at;
            //var_dump($eventGroupMapper);exit;
            $addGroupResult = $eventGroupTable->addEventGroup($eventGroupMapper);
            if($addGroupResult)
            {
                $eventMapper->organiser_id = $this->getServiceLocator()->get('Authenticate')->getSession('id');
                $eventMapper->event_group_id = $addGroupResult ->getGeneratedValue();
                $eventMapper->added_by = $this->getServiceLocator()->get('Authenticate')->getSession('id');
                $eventMapper->sports_id = "F" ? "1" : "2";
                $eventMapper->gender = "M" ? "M" : "F";
                $eventMapper->name = $data['name'];
                $eventMapper->start_date = $data['sd'];
                $eventMapper->end_date = $data['ed'];
                $eventMapper->location_city = $data['location'];
                $eventMapper->venue = $data['venue'];
                $eventMapper->lat = $data['lat'];
                $eventMapper->lon = $data['lon'];
                $eventMapper->email_primary = $data['emp'];
                $eventMapper->email_secondary = $data['ems'];
                $eventMapper->contact_num_primary = $data['cnp'];
                $eventMapper->contact_num_secondary = $data['cns'];
                $eventMapper->description = $data['desc'];
                $eventMapper->entry_fee = $data['ef'];
                $eventMapper->age = $data['age'];
                $eventMapper->prize = $data['prize'];
                $eventMapper->documents = $data['docs'];
                $eventMapper->team_size = $data['ts'];
                $eventMapper->team_num = $data['tn'];
                $eventMapper->type = $data['type'];
                $eventMapper->sponsors = $data['sponsors'];
                $eventMapper->sponsors_type = $data['sponsorstype'];
                $eventMapper->status = "200";
                $eventMapper->created_at = $this->services->get('Date\Now\AsiaKolkata')->format('Y/m/d H:i:s');
                $eventMapper->modified_at = $eventMapper->created_at;

                $result = $eventTable->addEvent($eventMapper);
                return $result;
            }
        }
    }

    public function addMultipleEvent()
    {
        $eventTable = $this->services->get('Model:EventTable');
        $eventMapper = $this->services->get('Mapper:Event');
        $eventGroupTable = $this->services->get('Model:EventGroup');
        $eventGroupMapper = $this->services->get('Mapper:EventGroup');
        $data = $this->inputFilter->inputFilter->getValues();

        var_dump($data);exit;
    }
}