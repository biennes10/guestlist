<?php

/**
 * menu_app_main
 */

if(!function_exists('menu_app_main')) {
    function menu_app_main() {
        $menu_items = [
            'home' => [
                'name' => 'home',
                'display_name' => 'dashboard',
                'slug' => 'menuitem_home',
                'site_url' => 'home',
                'permissions' => []
            ],
            'logout' => [
                'name' => 'logout',
                'display_name' => 'logout',
                'slug' => 'menuitem_logout',
                'site_url' => 'logout',
                'permissions' => []
            ]
        ];

        $menu = [];

        foreach($menu_items as $item) {
            if(has_permissions($item['permissions'])) {
                $menu[$item['name']] = $item;
            }
        }

        return $menu;
    }
}
