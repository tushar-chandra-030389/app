<?php

return array(
	'controllers' => array(
        'invokables' => array(
        	'Event\Controller\Index'    =>  'Event\Controller\IndexController',
            'Event\Controller\CreateRest'    =>    'Event\Controller\CreateRestController',
            'Event\Controller\CreateGroupRest'    =>    'Event\Controller\CreateGroupRestController',
        ),
    )    
);
