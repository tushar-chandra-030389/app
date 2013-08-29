<?php
/*

 * PATH : Dashboard/config/module.route.config.php
	
*/

return array(
	'router' => array(
        'routes' => array(
            'dashboard' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/dashboard',
                    'defaults' => array(
                        'controller'    => 'Dashboard\Controller\Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'dashboard_index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/index[/:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
	                            'controller'    => 'Dashboard\Controller\Index',
	                        	'action'        => 'index',
                            ),
                        ),
                    ),
                    
                ),
            ),
            'role_select' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/role/select/:fcm/:lvl/:cm',
                    'constraints' => array(
                                'fcm' => '[0-9]+',
                                'lvl' => '[01234]{1,1}',
                                'cm'  => '[0-9]+'
                            ),
                    'defaults' => array(
                        'controller'    => 'Dashboard\Controller\Index',
                        'action'        => 'select',
                    ),
                )
			)
        ),
    )
);
