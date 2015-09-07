<?php

use Zend\Expressive\Application;
use Zend\ServiceManager\ServiceLocatorInterface;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

/** @var ServiceLocatorInterface $container */
$container = include 'config/services.php';
/** @var Application $app */
$app       = $container->get('Zend\\Expressive\\Application');

$app->run();