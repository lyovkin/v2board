<?php

/*
 * 
 * Routing config
 */
return [
    'router' => [
        'index' => [
            'controller' => 'IndexController',
            'params' => 'id',
            'uri' => '/'
        ],
        'test' => [
            'controller' => 'TestController',
            'params' => 'id',
            'uri' => '/test'
        ],
        'sell' => [
            'controller' => 'SellController',
            'params' => 'id',
            'uri' => '/sell'
        ],
        'user' => [
            'controller' => 'UserController',
            'uri' => '/user'
        ]
    ]
];
