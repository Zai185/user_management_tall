<?php
return  [
    'navmenus' => [

        'dashboard' => [
            'feature' => 'dashboard',
            'icon' => 'home',
            'links' => [
                [
                    'href' => '/',
                    'title' => 'home page',
                    'icon' => 'home'
                ]
            ]
        ],

        'users' => [
            'feature' => 'users',
            'icon' => 'user',
            'links' => [
                [
                    'href' => '/users',
                    'title' => 'user list',
                    'icon' => 'user',
                    'middleware' => ['users', 'view']
                ],
                [
                    'href' => '/users/create',
                    'title' => 'add user',
                    'icon' => 'plus-circle',
                    'middleware' => ['users', 'create']
                ],
            ]
        ],

        'roles' => [
            'feature' => 'roles',
            'icon' => 'user-circle',
            'links' => [
                [
                    'href' => '/roles',
                    'title' => 'role list',
                    'icon' => 'user-circle',
                    'middleware' => ['roles', 'view']
                ],
                [
                    'href' => '/roles/create',
                    'title' => 'add role',
                    'icon' => 'plus-circle',
                    'middleware' => ['roles', 'create']
                ],
            ]
        ],

        'products' => [
            'feature' => 'products',
            'icon' => 'item',
            'links' => [
                [
                    'href' => '/products',
                    'title' => 'product list',
                    'icon' => 'item',
                    'middleware' => ['products', 'view']
                ],
                [
                    'href' => '/products/create',
                    'title' => 'add product',
                    'icon' => 'plus-circle',
                    'middleware' => ['products', 'create']
                ],
                [
                    'href' => '/brands',
                    'title' => 'brand list',
                    'icon' => 'item',
                    'middleware' => ['brands', 'view']
                ],
                [
                    'href' => '/brands/create',
                    'title' => 'add brand',
                    'icon' => 'plus-circle',
                    'middleware' => ['brands', 'create']
                ],
                [
                    'href' => '/categories',
                    'title' => 'category list',
                    'icon' => 'tag',
                    'middleware' => ['categories', 'view']
                ],
                [
                    'href' => '/categories/create',
                    'title' => 'add category',
                    'icon' => 'plus-circle',
                    'middleware' => ['categories', 'create']
                ],
                [
                    'href' => '/units',
                    'title' => 'unit list',
                    'icon' => 'tag',
                    'middleware' => ['units', 'view']
                ],
                [
                    'href' => '/units/create',
                    'title' => 'add unit',
                    'icon' => 'plus-circle',
                    'middleware' => ['units', 'create']
                ],
            ]
        ],
    ],
    'icons' => [
        'home',
        'item',
        'plus-circle',
        'tag',
        'trash',
        'user-circle',
        'user'
    ]
];
