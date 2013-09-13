<?php
/*

 * PATH : Profile/config/module.view.config.php
	
*/

return array(
	'view_manager' => array(
        'template_map' => array(
            'profile/layout'         =>    __DIR__ . '/../view/layout/layout.phtml',
            'profile/index/index'    =>    __DIR__ . '/../view/profile/index/index.phtml',
            'profile/player/create'  =>    __DIR__ . '/../view/profile/player/create.phtml',
            'player/sports-form'     =>    __DIR__ . '/../view/profile/player/sports-form.phtml',
            'player/football-form'   =>    __DIR__ . '/../view/profile/player/football-form.phtml',
            'player/basketball-form' =>    __DIR__ . '/../view/profile/player/basketball-form.phtml',
            'profile/organiser/index'       =>    __DIR__ . '/../view/profile/organiser/index.phtml',
            'profile/organiser/create'       =>    __DIR__ . '/../view/profile/organiser/create.phtml',
            'organiser/individual'   =>    __DIR__ . '/../view/profile/organiser/organiser-individual-form.phtml',
            'organiser/group'   =>    __DIR__ . '/../view/profile/organiser/organiser-group-form.phtml',
            'profile/organiser-rest/get-list'  => __DIR__ . '/../view/profile/organiser/organiser-get-list.phtml',
            'profile/player/football'  =>  __DIR__ . '/../view/profile/player/football-index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
