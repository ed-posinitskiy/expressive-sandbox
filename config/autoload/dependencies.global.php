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
    ],
    'factories'  => [
        'Zend\\Expressive\\Application'      => 'Zend\\Expressive\\Container\\ApplicationFactory',
        'App\\Middleware\\AcceptNegotiation' => 'App\\Middleware\\Factory\\AcceptNegotiationFactory',
    ]
];