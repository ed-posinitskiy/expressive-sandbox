<?php
/**
 * File contains Class TokenAuthFactory
 *
 * @since  08.09.2015
 * @author Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */

namespace App\Middleware\Factory;

use App\Middleware\TokenAuth;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class TokenAuthFactory
 *
 * @category Propartner
 * @package  App\Middleware\Factory
 * @author   Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */
class TokenAuthFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $authService = $serviceLocator->get('App\\Auth\\AuthService');

        return new TokenAuth($authService);
    }
}
