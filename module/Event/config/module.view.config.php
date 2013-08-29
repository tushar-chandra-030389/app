<?php

return array(
	'view_manager' => array(
        'template_map' => array(
            'event/layout'         =>    __DIR__ . '/../view/layout/layout.phtml',
            'event/index/index'    =>    __DIR__ . '/../view/event/index/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
