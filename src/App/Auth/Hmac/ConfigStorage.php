<?php
/**
 * File contains Class ConfigStorage
 *
 * @since  08.09.2015
 * @author Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */

namespace App\Auth\Hmac;

use App\Auth\Identity;
use App\Auth\TokenStorageInterface;
use RuntimeException;

/**
 * Class ConfigStorage
 *
 * @category Propartner
 * @package  App\TokenAuth\Hmac
 * @author   Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */
class ConfigStorage implements TokenStorageInterface
{
    /**
     * @var array
     */
    protected $identities = [];

    /**
     * ConfigStorage constructor.
     *
     * @param array $identities
     */
    public function __construct(array $identities)
    {
        $this->identities = $identities;
    }

    /**
     * @param string $token
     *
     * @return bool
     */
    public function has($token)
    {
        return array_key_exists($token, $this->identities);
    }

    /**
     * @param string $token
     *
     * @return Identity
     */
    public function get($token)
    {
        if (!$this->has($token)) {
            throw new RuntimeException(
                sprintf('Identity with token [%s] doesn\'t exist', $token)
            );
        }

        $name = $this->identities[$token];

        return new Identity($token, $name);
    }

}
