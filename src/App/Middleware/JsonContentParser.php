<?php
/**
 * @since  07.09.2015
 * @author Ed Posinitskiy <eddiespb@gmail.com>
 */

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Stratigility\MiddlewareInterface;

/**
 * Class JsonContentParser
 *
 * @package App\Middleware
 * @author  Ed Posinitskiy <eddiespb@gmail.com>
 */
class JsonContentParser implements MiddlewareInterface
{
    const JSON_HEADER = 'application/json';

    public function __invoke(Request $request, Response $response, callable $out = null)
    {
        $acceptHeader = $request->hasHeader('Accept') ? $request->getHeaderLine('Accept') : null;

        if ($acceptHeader && false !== strpos($acceptHeader, static::JSON_HEADER)) {
            $request = $request->withParsedBody(json_decode($request->getBody()->getContents(), true));
        }

        return $out($request, $response);
    }
}
