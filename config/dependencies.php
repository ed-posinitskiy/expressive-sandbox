<?php
/**
 * @since  04.09.2015
 * @author Ed Posinitskiy <eddiespb@gmail.com>
 */

use Zend\Config\Factory;

return Factory::fromFiles(glob(__DIR__ . '/autoload/dependencies.{global,local}.php', GLOB_BRACE));