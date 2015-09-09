<?php
/**
 * File contains Class AuthServiceFactory
 *
 * @since  08.09.2015
 * @author Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */

namespace App\Auth\Factory;

use App\Auth\AuthService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class AuthServiceFactory
 *
 * @category Propartner
 * @package  App\TokenAuth\Factory
 * @author   Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */
class AuthServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $storage = $serviceLocator->get('App\\Auth\\TokenStorageInterface');

        return new AuthService($storage);
    }
}
