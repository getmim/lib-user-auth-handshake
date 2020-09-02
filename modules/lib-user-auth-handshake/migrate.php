<?php

return [
    'LibUserAuthHandshake\\Model\\UserHandshake' => [
        'fields' => [
            'id' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'primary_key' => TRUE,
                    'auto_increment' => TRUE
                ],
                'index' => 1000
            ],
            'user' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'null' => FALSE
                ],
                'index' => 2000
            ],
            'session' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE
                ],
                'index' => 3000
            ],
            'browser' => [
                'type' => 'TEXT',
                'attrs' => [],
                'index' => 4000
            ],
            'token' => [
                'type' => 'VARCHAR',
                'length' => 200,
                'attrs' => [
                    'null' => false,
                    'unique' => true 
                ],
                'index' => 5000
            ],
            'expires' => [
                'type' => 'DATETIME',
                'attrs' => [
                    'null' => false 
                ],
                'index' => 6000
            ],
            'updated' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP',
                    'update' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 10000
            ],
            'created' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 11000
            ]
        ]
    ]
];