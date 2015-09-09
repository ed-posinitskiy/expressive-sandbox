<?php
/**
 * @since  04.09.2015
 * @author Ed Posinitskiy <eddiespb@gmail.com>
 */

return [
    'routes'              => [
        [
            'path'            => '/',
            'name'            => 'home',
            'middleware'      => 'mw.home',
            'allowed_methods' => ['GET']
        ],
        [
            'path'            => '/test',
            'name'            => 'test',
            'middleware'      => 'mw.test',
            'allowed_methods' => ['POST']
        ],
    ],
    'middleware_pipeline' => [
        'pre_routing' => [
            [
                'middleware' => 'mw.accept-negotiation'
            ],
            [
                'middleware' => 'mw.json-content-parser'
            ],
            [
                'middleware' => 'mw.auth'
            ]
        ]
    ],
    'accept-negotiation'  => [
        'application/json'
    ],
    'auth' => [
        'token_identities' => [
            'test' => 'Test Identity'
        ]
    ],
];