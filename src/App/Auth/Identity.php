<?php
/**
 * File contains Class Identity
 *
 * @since  08.09.2015
 * @author Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */

namespace App\Auth;

/**
 * Class Identity
 *
 * @category Propartner
 * @package  App\TokenAuth\Hmac
 * @author   Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */
class Identity
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $name;

    /**
     * Identity constructor.
     *
     * @param string $token
     * @param string $name
     */
    public function __construct($token, $name)
    {
        $this->token = $token;
        $this->name  = $name;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}
