<?php

return array(
	'invokables' => array(
        'Event\Form\Filter\EventSingleForm'    =>    'Event\Form\Filter\EventSingleForm',
        'Event\Form\Filter\EventMultipleForm'    =>    'Event\Form\Filter\EventMultipleForm'
	 ),
	'factories' => array(
        'Event\Form\EventSingleForm' =>  function($sm) {
            $obj = new Event\Form\EventSingleForm();
            return $obj;
        },
        'Event\Form\EventMultipleForm' =>  function($sm) {
            $obj = new Event\Form\EventMultipleForm();
            return $obj;
        },
        'Event\Controller\Helpers\Add' =>  function($sm) {
            $obj = new Event\Controller\Helpers\Add($sm);
            return $obj;
        },
    ),
);