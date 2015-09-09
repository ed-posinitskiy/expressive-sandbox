<?php
/**
 * @since  04.09.2015
 * @author Ed Posinitskiy <eddiespb@gmail.com>
 */

return [
    'services'   => [
        'config' => include __DIR__ . '/../config.php',
    ],
    'invokables' => [
        'mw.home'                                   => 'App\\Middleware\\Home',
        'mw.test'                                   => 'App\\Middleware\\Test',
        'mw.json-content-parser'                    => 'App\\Middleware\\JsonContentParser',
        'Zend\\Expressive\\Router\\RouterInterface' => 'Zend\\Expressive\\Router\\Aura',
    ],
    'aliases'    => [
        'mw.accept-negotiation' => 'App\\Middleware\\AcceptNegotiation',
        'mw.auth'               => 'App\\Middleware\\TokenAuth',
    ],
    'factories'  => [
        // Application
        'Zend\\Expressive\\Application'      => 'Zend\\Expressive\\Container\\ApplicationFactory',

        // Middleware
        'App\\Middleware\\AcceptNegotiation' => 'App\\Middleware\\Factory\\AcceptNegotiationFactory',
        'App\\Middleware\\TokenAuth'         => 'App\\Middleware\\Factory\\TokenAuthFactory',

        // Services
        'App\\Auth\\TokenStorageInterface'   => 'App\\Auth\\Factory\\Hmac\\ConfigStorageFactory',
        'App\\Auth\\AuthService'             => 'App\\Auth\\Factory\\AuthServiceFactory',
    ]
];