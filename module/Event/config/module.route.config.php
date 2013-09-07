<?php

return array(
	'router' => array(
        'routes' => array(
            'event' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/event',
                    'defaults' => array(
                        'controller'    => 'Event\Controller\Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'create' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/create',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller'    => 'Event\Controller\Index',
                                'action'        => 'create',
                            ),
                        ),
                    ),

                ),
            ),
            'event-rest' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/event',
                    'constraints' => array(
                        /*'sportId' => '[0-9]*]'*/
                    ),
                    'defaults' => array(
                        'controller'    => 'Event\Controller\CreateRest'
                    ),
                )
            ),
            'event-multiple' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/eventgroup',
                    'constraints' => array(
                        /*'sportId' => '[0-9]*]'*/
                    ),
                    'defaults' => array(
                        'controller'    => 'Event\Controller\CreateGroupRest'
                    ),
                )
            ),
        )
    )
);
