<?php
return [
    'propel' => [
        'database' => [
            'connections' => [
                'default' => [
                    'adapter' => 'mysql',
//                    'dsn' => 'mysql:host=localhost;port=3306;dbname=u0859476_crawler',
//                    'user' => 'u0859476_crawler',
//                    'password' => '8M3x2I4f',
                    'dsn' => 'mysql:host=127.0.0.1;port=8889;dbname=u0859476_crawler',
                    'user' => 'root',
                    'password' => 'root',
                    'settings' => [
                        'charset' => 'utf8'
                    ]
                ]
            ]
        ]
    ]
];

