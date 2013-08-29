<?php

return array(
	'router' => array(
        'routes' => array(
            'event' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/event',
                    'defaults' => array(
                        'controller'    => 'Event\Controller\Index',
                        'action'        => 'index',
                    ),
                ),
            )
        )
    )
);
