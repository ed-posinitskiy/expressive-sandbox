<?php
/**
 * File contains Class TokenStorageInterface
 *
 * @since  08.09.2015
 * @author Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */

namespace App\Auth;

/**
 * Interface TokenStorageInterface
 *
 * @category Propartner
 * @package  App\TokenAuth\Hmac
 * @author   Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */
interface TokenStorageInterface
{
    /**
     * @param string $token
     *
     * @return boolean
     */
    public function has($token);

    /**
     * @param string $token
     *
     * @return Identity
     */
    public function get($token);
}