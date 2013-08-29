<?php
/*

 * PATH : Application/config/module.route.config.php
    
*/

return array(
    'router' => array(
        'routes' => array(
            'application' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        'controller'    => 'Application\Controller\Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'application_index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/index[/:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller'    => 'Application\Controller\Index',
                                'action'        => 'index',
                            ),
                        ),
                    ),
                ),
            ),
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Home',
                        'action' => 'index',
                    ),
                ),
            ),
            'home-alt' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/home',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Home',
                        'action' => 'index',
                    ),
                ),
            ),
            'about' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/about',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Home',
                        'action' => 'about',
                    ),
                ),
            ),
        ),
    )
);
