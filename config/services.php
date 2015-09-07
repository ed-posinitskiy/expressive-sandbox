<?php
/**
 * @since  04.09.2015
 * @author Ed Posinitskiy <eddiespb@gmail.com>
 */

use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

return new ServiceManager(new Config(include __DIR__ . '/dependencies.php'));