<?php
/**
 * @since  07.09.2015
 * @author Ed Posinitskiy <eddiespb@gmail.com>
 */

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Json\Json;
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
            $content = $request->getBody()->getContents();
            try {
                $decoded = Json::decode($content, Json::TYPE_ARRAY);
                $request = $request->withParsedBody($decoded);
            } catch (\Exception $e) {
                // @TODO: log if needed
            }
        }

        return $out($request, $response);
    }
}
