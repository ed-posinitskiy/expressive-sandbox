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
 * Class Test
 *
 * @package App\Middleware
 * @author  Ed Posinitskiy <eddiespb@gmail.com>
 */
class Test implements MiddlewareInterface
{
    public function __invoke(Request $request, Response $response, callable $out = null)
    {
        $params = $request->getParsedBody();

        $sampleData = is_array($params) && isset($params['incoming']);

        return new JsonResponse(
            [
                'success' => $sampleData,
                'content' => ($sampleData) ? sprintf('Incoming parsed: %s', $params['incoming']) : 'Failed to parse'
            ]
        );
    }
}
