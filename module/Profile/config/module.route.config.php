<?php
/*

 * PATH : Profile/config/module.route.config.php
	
*/

return array(
	'router' => array(
        'routes' => array(
            'profile' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/profile',
                    'defaults' => array(
                        'controller'    => 'Profile\Controller\Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'profile_organiser' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/organiser[/:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
	                            'controller'    => 'Profile\Controller\Organiser',
	                        	'action'        => 'index',
                            ),
                        ),
                    ),
                    'profile_player' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/player[/:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller'    => 'Profile\Controller\Player',
                                'action'        => 'index',
                            ),
                        ),
                    ),
                    'create' => array(
                        'type'  =>  'Segment',
                        'options'   => array(
                            'route' =>  '/create[/:sportsname]',
                            'constraints'   =>  array(
                                'controller'    =>  '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'        => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults'  =>  array(
                                'controller'    => 'Profile\Controller\Player',
                                'action'        => 'create',
                            ),
                        ),
                    ),
                ),
            ),
            'profile_rest' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/profile[/:sportId]',
                    'constraints' => array(
                                'sportId' => '[0-9]*]'
                            ),
                    'defaults' => array(
                        'controller'    => 'Profile\Controller\PlayerRest'
                    ),
                )
            ),
            'organiser_rest' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/profile[/:organiserId]',
                    'constraints' => array(
                                'organiserId' => '[0-9]*]'
                            ),
                    'defaults' => array(
                        'controller'    => 'Profile\Controller\OrganiserRest'
                    ),
                )
            ),
        ),
    )
);
