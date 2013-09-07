<?php

return array(
	'view_manager' => array(
        'template_map' => array(
            'event/layout'         =>    __DIR__ . '/../view/layout/layout.phtml',
            'event/index/index'    =>    __DIR__ . '/../view/event/index/index.phtml',
            'event/index/create'   =>    __DIR__ . '/../view/event/index/create.phtml',
            'event/forms/single'   =>    __DIR__ . '/../view/event/forms/single-event-form.phtml',
            'event/forms/multiple'     =>     __DIR__ . '/../view/event/forms/multiple-event-form.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
