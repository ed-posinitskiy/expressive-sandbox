<?php
/**
 * File contains Class ConfigStorageFactory
 *
 * @since  08.09.2015
 * @author Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */

namespace App\Auth\Factory\Hmac;

use App\Auth\Hmac\ConfigStorage;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ConfigStorageFactory
 *
 * @category Propartner
 * @package  App\TokenAuth\Factory\Hmac
 * @author   Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */
class ConfigStorageFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $identities = [];
        $config    = $serviceLocator->has('config') ? $serviceLocator->get('config') : [];

        if (isset($config['auth']['token_identities']) && is_array($config['auth']['token_identities'])) {
            $identities = $config['auth']['token_identities'];
        }

        return new ConfigStorage($identities);
    }
}
