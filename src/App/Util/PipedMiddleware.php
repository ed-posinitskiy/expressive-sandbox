<?php
/**
 * File contains Class PipedMiddleware
 *
 * @since  09.09.2015
 * @author Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */

namespace App\Util;

use Zend\Stratigility\MiddlewareInterface;

/**
 * Class PipedMiddleware
 *
 * @category Propartner
 * @package  App\Util
 * @author   Eduard Posinitskii <eduard.posinitskii@veeam.com>
 */
abstract class PipedMiddleware implements MiddlewareInterface
{
    /**
     * @var callable
     */
    protected $pipe;

    /**
     * PipedMiddleware constructor.
     *
     * @param callable $pipe
     */
    public function __construct(callable $pipe)
    {
        $this->pipe = $pipe;
    }

}
