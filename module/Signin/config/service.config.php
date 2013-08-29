<?php
/*

 * PATH : Signin/config/service.config.php
	
*/

return array(
	'invokables' => array(
	 		'Signin\Form\Filter\SigninForm' => 'Signin\Form\Filter\SigninForm',
	 		'Signin\Form\SigninForm' => 'Signin\Form\SigninForm'
	 ),
	'factories' => array(
		'Signin\Controller\Helpers\Signin' =>  function($sm) {
			return new Signin\Controller\Helpers\Signin($sm);
		},
		
	),   
);