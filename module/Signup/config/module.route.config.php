<?php
/*

 * PATH : Signup/config/module.route.config.php
	
*/

return array(
	'router' => array(
        'routes' => array(
            'signup' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/signup',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Signup\Controller',
                        'controller'    => 'Signup\Controller\Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'signup_index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/index[/:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
	                            'controller'    => 'Signup\Controller\Index',
	                        	'action'        => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    )
);
