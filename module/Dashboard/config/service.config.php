<?php
/*

 * PATH : Dashboard/config/service.config.php
	
*/
	
return array(
	'invokables' => array(
	 		
	 ),
	'factories' => array(
		'Dashboard\Controller\Helpers\Dashboard' =>  function($sm) {
			return new Dashboard\Controller\Helpers\Dashboard($sm);
		},
	),   
);