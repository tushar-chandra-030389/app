<?php
/*

 * PATH : Profile/config/module.config.php
	
*/

return array(
	'controllers' => array(
        'invokables' => array(
        	'Profile\Controller\Index' 			=> 'Profile\Controller\IndexController',
        	'Profile\Controller\Organiser'		=> 'Profile\Controller\OrganiserController',
        	'Profile\Controller\OrganiserRest'  => 'Profile\Controller\OrganiserRestController',
        	'Profile\Controller\Player'			=> 'Profile\Controller\PlayerController',
        	'Profile\Controller\PlayerRest' 	=> 'Profile\Controller\PlayerRestController',
        ),
    )    
);
