<?php
/**
 * File contains Class AuthService
 *
 * @since  08.09.2015
 * @author Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */

namespace App\Auth;

/**
 * Class AuthService
 *
 * @category Propartner
 * @package  App\TokenAuth
 * @author   Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */
class AuthService
{
    /**
     * @var TokenStorageInterface
     */
    protected $storage;

    /**
     * @var Identity
     */
    protected $identity;

    /**
     * AuthService constructor.
     *
     * @param TokenStorageInterface $storage
     */
    public function __construct(TokenStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @return bool
     */
    public function hasIdentity()
    {
        return isset($this->identity);
    }

    /**
     * @return Identity
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param $token
     *
     * @return bool
     */
    public function authorize($token)
    {
        if (!$this->storage->has($token)) {
            return false;
        }

        $this->identity = $this->storage->get($token);

        return true;
    }

    /**
     * @return TokenStorageInterface
     */
    public function getStorage()
    {
        return $this->storage;
    }

}
