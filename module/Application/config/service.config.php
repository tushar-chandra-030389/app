<?php
/*

 * PATH : Application/config/service.config.php
	
*/

return array(
        'invokables' => array(
        	'ForwardContainer' => 'Application\Controller\Helpers\ForwardContainer',
        	'RolesContainer' => 'Application\Controller\Helpers\RolesContainer',
        	

            /*Mapper for the Database.*/
            
            'Application\Model\Mapper\User' => 'Application\Model\Mapper\User',
            'Mapper:User' => 'Application\Model\Mapper\User',
            'Mapper:UserSports' => 'Application\Model\Mapper\UserSports',
            'Mapper:Football' => 'Application\Model\Mapper\Football',
            'Mapper:Basketball' => 'Application\Model\Mapper\Basketball',
            'Mapper:Organiser'  =>  'Application\Model\Mapper\Organiser',
        ),
        'factories' => array(
        	'Zend\Session\SessionManager' => function ($sm) {
                $config = $sm->get('config');
                if (isset($config['session'])) {
                    $session = $config['session'];

                    $sessionConfig = null;
                    if (isset($session['config'])) {
                        $class = isset($session['config']['class'])  ? $session['config']['class'] : 'Zend\Session\Config\SessionConfig';
                        $options = isset($session['config']['options']) ? $session['config']['options'] : array();
                        $sessionConfig = new $class();
                        $sessionConfig->setOptions($options);
                    }

                    $sessionStorage = null;
                    if (isset($session['storage'])) {
                        $class = $session['storage'];
                        $sessionStorage = new $class();
                    }

                    $sessionSaveHandler = null;
                    if (isset($session['save_handler'])) {
                        // class should be fetched from service manager since it will require constructor arguments
                        $sessionSaveHandler = $sm->get($session['save_handler']);
                    }

                    $sessionManager = new Zend\Session\SessionManager($sessionConfig, $sessionStorage, $sessionSaveHandler);

                    if (isset($session['validator'])) {
                        $chain = $sessionManager->getValidatorChain();
                        foreach ($session['validator'] as $validator) {
                            $validator = new $validator();
                            $chain->attach('session.validate', array($validator, 'isValid'));

                        }
                    }
                } else {
                    $sessionManager = new SessionManager();
                }
                Zend\Session\Container::setDefaultManager($sessionManager);
                return $sessionManager;
            },
		   
            /* Models Start */
                'Application\Model\UserTable' =>  function($sm) {
                    return $sm->get('Model:UserTable');
                },
                'Model:UserTable' =>  function($sm) {
                    $table = new Application\Model\UserTable($sm->get('GetAdapter'));
                    return $table;
                },
                'Model:UserSportsTable' =>  function($sm) {
                    $table = new Application\Model\UserSportsTable($sm->get('GetAdapter'));
                    return $table;
                },
                'Model:FootballTable' =>  function($sm) {
                    $table = new Application\Model\FootballTable($sm->get('GetAdapter'));
                    return $table;
                },
                'Model:BasketballTable' =>  function($sm) {
                    $table = new Application\Model\BasketballTable($sm->get('GetAdapter'));
                    return $table;
                },
                'Model:OrganiserTable' =>  function($sm) {
                    $table = new Application\Model\OrganiserTable($sm->get('GetAdapter'));
                    return $table;
                },
                'GetAdapter' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    return $dbAdapter;
                },
            /* Models End */
            
            'Date\Now\AsiaKolkata' => function($sm) {
                return new \DateTime("now", new \DateTimeZone("Asia/Kolkata"));
            },
            'Authenticate' => function($sm) {
                return new Application\Controller\Helpers\Authenticate($sm);
            }

        ),
        'shared' => array(
            'Application\Model\Mapper\User' => false,
            'Mapper:UserSports' => false,
            'Date\Now\AsiaKolkata' => false,
            'ForwardContainer' => false
        ),
    );