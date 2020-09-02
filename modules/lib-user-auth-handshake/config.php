<?php

return [
    '__name' => 'lib-user-auth-handshake',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/lib-user-auth-handshake.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-user-auth-handshake' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-user' => NULL
            ],
            [
                'lib-model' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'LibUserAuthHandshake\\Library' => [
                'type' => 'file',
                'base' => 'modules/lib-user-auth-handshake/library'
            ],
            'LibUserAuthHandshake\\Model' => [
                'type' => 'file',
                'base' => 'modules/lib-user-auth-handshake/model'
            ]
        ],
        'files' => []
    ]
];