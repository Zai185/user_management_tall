<?php
return  [


    'dashboard' => [
        'feature' => '',
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
                'icon' => 'user'
            ],
            [
                'href' => '/users/create',
                'title' => 'add user',
                'icon' => 'plus-circle'
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
                'icon' => 'user-circle'
            ],
            [
                'href' => '/roles/create',
                'title' => 'add role',
                'icon' => 'plus-circle'
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
                'icon' => 'item'
            ],
            [
                'href' => '/products/create',
                'title' => 'add product',
                'icon' => 'plus-circle'
            ],
        ]
    ],
];
