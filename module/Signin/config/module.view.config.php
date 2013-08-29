<?php
/*

 * PATH : Signin/config/module.view.config.php
	
*/

return array(
	'view_manager' => array(
        'template_map' => array(
            'signin/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'signin/index/index' => __DIR__ . '/../view/signin/index/index.phtml',
            'signin/index/signin-form' => __DIR__ . '/../view/signin/index/signin-form.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
