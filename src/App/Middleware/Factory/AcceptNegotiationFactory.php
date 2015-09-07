<?php
/**
 * @since  07.09.2015
 * @author Ed Posinitskiy <eddiespb@gmail.com>
 */

namespace App\Middleware\Factory;

use App\Middleware\AcceptNegotiation;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class AcceptNegotitation
 *
 * @package App\Middleware\Factory
 * @author  Ed Posinitskiy <eddiespb@gmail.com>
 */
class AcceptNegotiationFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $whitelist = [];
        $config    = $serviceLocator->has('config') ? $serviceLocator->get('config') : [];

        if (isset($config['accept-negotiation']) && is_array($config['accept-negotiation'])) {
            $whitelist = $config['accept-negotiation'];
        }

        return new AcceptNegotiation($whitelist);
    }
}
