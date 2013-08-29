<?php
/*

 * PATH : Signup/config/module.view.config.php
	
*/

return array(
	'view_manager' => array(
        'template_map' => array(
            'signup/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'signup/index/index' => __DIR__ . '/../view/signup/index/index.phtml',
            'signup/index/signup-form' => __DIR__ . '/../view/signup/index/signup-form.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
