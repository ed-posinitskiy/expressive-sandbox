<?php
/**
 * @since  07.09.2015
 * @author Ed Posinitskiy <eddiespb@gmail.com>
 */

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Stratigility\MiddlewareInterface;

/**
 * Class ContentNegotiation
 *
 * @TODO: Negotiate via Negotiation library (@see: https://github.com/willdurand/StackNegotiation)
 *
 * @package App\Middleware
 * @author  Ed Posinitskiy <eddiespb@gmail.com>
 */
class AcceptNegotiation implements MiddlewareInterface
{
    protected $whitelist = [];

    /**
     * AcceptNegotiation constructor.
     *
     * @param array $whitelist
     */
    public function __construct(array $whitelist)
    {
        $this->whitelist = $whitelist;
    }

    public function __invoke(Request $request, Response $response, callable $out = null)
    {
        $acceptHeader = $request->hasHeader('Accept') ? $request->getHeaderLine('Accept') : null;

        if (empty($this->whitelist)) {
            return $out($request, $response);
        }

        if (empty($acceptHeader)) {
            return $this->errorResponse();
        }

        if (!in_array($acceptHeader, $this->whitelist)) {
            return $this->errorResponse();
        }

        return $out($request, $response);
    }

    private function errorResponse($phrase = 'Unable to resolve Accept header to a representation')
    {
        return new JsonResponse($phrase, 406);
    }
}
