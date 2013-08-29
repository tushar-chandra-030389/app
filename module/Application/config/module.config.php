<?php
/*

 * PATH : Application/config/module.config.php
	
*/

return array(
	'controllers' => array(
        'invokables' => array(
        	'Application\Controller\Index' => 'Application\Controller\IndexController',
        	'Application\Controller\Home' => 'Application\Controller\HomeController',
        ),
    )    
);
