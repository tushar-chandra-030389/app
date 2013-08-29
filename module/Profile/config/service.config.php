<?php
/*

 * PATH : Profile/config/service.config.php
	
*/
	
return array(
	'invokables' => array(
	 	'Profile\Form\Filter\SportsForm'     => 'Profile\Form\Filter\SportsForm',
        'Profile\Form\Filter\FootballForm'   => 'Profile\Form\Filter\FootballForm',
        'Profile\Form\Filter\BasketballForm' => 'Profile\Form\Filter\BasketballForm',
        'Profile\Form\Filter\OrganiserIndividualForm'  => 'Profile\Form\Filter\OrganiserIndividualForm',
        'Profile\Form\Filter\OrganiserGroupForm'  => 'Profile\Form\Filter\OrganiserGroupForm',
	 ),
	'factories' => array(
		/*'Profile\Controller\Helpers\Profile' =>  function($sm) {
			return new Profile\Controller\Helpers\Profile($sm);
		},*/
        'Profile\Form\SportsForm' =>  function($sm) {
            $obj = new Profile\Form\SportsForm();
            return $obj;
        },        
        'Profile\Form\FootballForm' =>  function($sm) {
            $obj = new Profile\Form\FootballForm();
            return $obj;
        },
        'Profile\Form\BasketballForm' =>  function($sm) {
            $obj = new Profile\Form\BasketballForm();
            return $obj;
        },
        'Profile\Form\OrganiserIndividualForm'  =>  function($sm)  {
            $obj = new Profile\Form\OrganiserIndividualForm();
            return $obj;
        },
        'Profile\Form\OrganiserGroupForm'  =>  function($sm)  {
            $obj = new Profile\Form\OrganiserGroupForm();
            return $obj;
        },
        'Profile\Controller\Helpers\Player' =>  function($sm) {
            $obj = new Profile\Controller\Helpers\Player($sm);
            return $obj;
        },
        'Profile\Controller\Helpers\Organiser' =>  function($sm) {
            $obj = new Profile\Controller\Helpers\Organiser($sm);
            return $obj;
        },
	),   
);