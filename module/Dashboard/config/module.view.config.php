<?php
/*

 * PATH : Dashboard/config/module.view.config.php
	
*/

return array(
	'view_manager' => array(
        'template_map' => array(
            'dashboard/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'dashboard/index/index' => __DIR__ . '/../view/dashboard/index/index.phtml',
            
			'dashboard/index/select-json' => __DIR__ . '/../view/dashboard/index/select-json.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
