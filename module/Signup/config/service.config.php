<?php
/*

 * PATH : Signup/config/service.config.php
	
*/

return array(
	'invokables' => array(
	 		'Signup\Form\Filter\SignupForm' => 'Signup\Form\Filter\SignupForm',
	 ),
	'factories' => array(
		'Signup\Form\SignupForm' =>  function($sm) {
			$obj = new Signup\Form\SignupForm();
		    return $obj;
		},
		/*
		'Signup\Form\Filter\SignupForm' =>  function($sm) {
						$obj = new Signup\Form\Filter\SignupForm();
						return $obj;
				},*/
		'Signup\Controller\Helpers\Signup' =>  function($sm) {
			$obj = new Signup\Controller\Helpers\Signup($sm);
		    return $obj;
		},
		
	),   
);