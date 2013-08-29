<?php
/*

 * PATH : Signin/config/module.route.config.php
	
*/

return array(
	'router' => array(
        'routes' => array(
            'signin' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/signin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Signup\Controller',
                        'controller'    => 'Signin\Controller\Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'signin_index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/index[/:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
	                            'controller'    => 'Signin\Controller\Index',
	                        	'action'        => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    )
);
