<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\Exceptions;

class NoMatch extends \Exception
{
	protected $code = 200;
	protected $message = 'The input did not produce any matches, or the waypoints requested were not found in the resulting match. features will be an empty array.';
}
